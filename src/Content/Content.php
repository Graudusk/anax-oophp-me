<?php 

namespace Erjh17\Content;

class Content
{
    private $app;
    private $content;
    private $res;
    private $html;

    public function injectApp($app)
    {
        $this->app = $app;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getResult()
    {
        return $this->res;
    }

    public function getHtml()
    {
        return $this->html;
    }

    public function addToPage($path)
    {
        $this->app->page->add("anax/v2/content/$path", ["data" => $this]);
    }

    public function getIndex()
    {
        $title = "Visa allt innehåll | Content";

        $this->app->db->connect();
        $sql = "SELECT * FROM content;";
        $this->res = $this->app->db->executeFetchAll($sql);
        $this->addToPage("show-all");
        return $this->app->page->render([
            "title" => $title
        ]);
    }

    public function getAdmin()
    {
        $title = "Admin | Content";

        $this->app->db->connect();
        $sql = "SELECT * FROM content;";
        $this->res = $this->app->db->executeFetchAll($sql);
        $this->addToPage("admin");
        return $this->app->page->render([
            "title" => $title
        ]);
    }

    public function getCreate()
    {
        $title = "Skapa | Content";
        $this->addToPage("create");
        return $this->app->page->render([
            "title" => $title
        ]);
    }

    public function getCreatePost()
    {
        if (array_key_exists("doCreate", $this->app->request->getPost())) {
            $this->app->db->connect();
            $title = $this->app->request->getPost("contentTitle");

            $sql = "INSERT INTO content (title) VALUES (?);";

            $this->app->db->execute($sql, [$title]);
        }
        $id = $this->app->db->lastInsertId();
        return $this->app->response->redirect("content/edit/$id");
    }

    public function getEdit($id)
    {
        $title = "Redigera | Content";

        $this->app->db->connect();

        $sql = "SELECT * FROM content WHERE id = ?;";
        $this->content = $this->app->db->executeFetch($sql, [$id]);
        $this->addToPage("edit");
        return $this->app->page->render([
            "title" => $title
        ]);
    }

    public function getEditPost($id)
    {
        $this->app->db->connect();

        if (array_key_exists("doDelete", $this->app->request->getPost())) {
            return $this->app->response->redirect("content/delete/$id");
        } elseif (array_key_exists("doEdit", $this->app->request->getPost())) {
            $params = $this->getPosts($this->app->request->getPost(), [
                "contentTitle",
                "contentPath",
                "contentSlug",
                "contentData",
                "contentType",
                "contentFilter",
                "contentPublish",
                "contentId"
            ]);

            if (!$params["contentSlug"]) {
                $params["contentSlug"] = $this->slugify($params["contentTitle"]);
            }

            $sql = "SELECT slug FROM content WHERE id != ?;";
            $this->res = $this->app->db->executeFetchAll($sql, [$id]);
            $slugs = array();
            foreach ($this->getResult() as $value) {
                array_push($slugs, $value->slug);
            }

            $counter = 1;
            $needle = $params["contentSlug"];
            while (in_array($needle, $slugs)) {
                $needle = $params["contentSlug"] . "-$counter";
                $counter++;
            }
            $params["contentSlug"] = $needle;

            if (!$params["contentPath"]) {
                $params["contentPath"] = null;
            }

            $sql = "UPDATE content SET title=?, path=?, slug=?, data=?, type=?, filter=?, published=? WHERE id = ?;";
            $this->app->db->execute($sql, array_values($params));
        }

        return $this->app->response->redirect("content/edit/$id");
    }

    public function getDelete($id)
    {
        $title = "Radera | Content";

        $this->app->db->connect();

        $sql = "SELECT id, title FROM content WHERE id = ?;";
        $this->content = $this->app->db->executeFetch($sql, [$id]);
        $this->addToPage("delete");
        return $this->app->page->render([
            "title" => $title
        ]);
    }

    public function getDeletePost($id)
    {
        if (array_key_exists("doDelete", $this->app->request->getPost())) {
            $this->app->db->connect();
            $sql = "UPDATE content SET deleted=NOW() WHERE id=?;";
            $this->app->db->execute($sql, [$id]);
        }

        return $this->app->response->redirect("content/admin");
    }

    public function getPages()
    {
        $title = "Visa sidor | Content";
        $this->app->db->connect();
        $sql = <<<EOD
SELECT
    *,
    CASE 
        WHEN (deleted <= NOW()) THEN "isDeleted"
        WHEN (published <= NOW()) THEN "isPublished"
        ELSE "notPublished"
    END AS status
FROM content
WHERE type=?
;
EOD;
        $this->res = $this->app->db->executeFetchAll($sql, ["page"]);
        $this->addToPage("pages");
        return $this->app->page->render([
            "title" => $title
        ]);
    }

    public function getPage($path)
    {
        $this->app->db->connect();
        $title = "Visa sida | Content";
        $sql = <<<EOD
SELECT
    *,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS modified_iso8601,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS modified
FROM content
WHERE
    (path = ? OR slug = ?)
    AND type = ?
    AND (deleted IS NULL OR deleted > NOW())
    AND published <= NOW()
;
EOD;

        $this->content = $this->app->db->executeFetch($sql, [$path, $path, "page"]);
        if (!$this->getContent()) {
            header("HTTP/1.0 404 Not Found");
            $title = "404";
            $this->addToPage("404");
        } else {
            $filter = new \Erjh17\TextFilter\Filter();
            $this->html = $filter->parse($this->getContent()->data, explode(",", $this->getContent()->filter));

            $title = $this->getContent()->title . " | Content";
            $this->addToPage("page");
        }
        return $this->app->page->render([
            "title" => $title
        ]);
    }

    public function getBlogs()
    {
        $title = "Visa bloggen | Content";

        $sql = <<<EOD
SELECT
    *,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS published_iso8601,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS published
FROM content
WHERE type=?
ORDER BY published DESC
;
EOD;
        $this->app->db->connect();
        $this->res = $this->app->db->executeFetchAll($sql, ["post"]);
        $this->addToPage("blog");
        return $this->app->page->render([
            "title" => $title
        ]);
    }

    public function getBlog($slug)
    {
        $this->app->db->connect();
        $title = "Visa bloginlägg | Content";
        $sql = <<<EOD
SELECT
    *,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS published_iso8601,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS published
FROM content
WHERE 
    slug = ?
    AND type = ?
    AND (deleted IS NULL OR deleted > NOW())
    AND published <= NOW()
ORDER BY published DESC
;
EOD;
        $this->content = $this->app->db->executeFetch($sql, [$slug, "post"]);

        if (!$this->getContent()) {
            header("HTTP/1.0 404 Not Found");
            $title = "404";
            $this->addToPage("404");
        } else {
            $filter = new \Erjh17\TextFilter\Filter();
            $this->html = $filter->parse($this->getContent()->data, explode(",", $this->getContent()->filter));

            $title = $this->getContent()->title . " | Content";
            $this->addToPage("blogpost");
        }
        return $this->app->page->render([
            "title" => $title
        ]);
    }

    public function getPosts($post, $arr)
    {
        $retArray = array();
        foreach ($arr as $value) {
            if (array_key_exists($value, $post)) {
                $retArray[$value] = $post[$value];
            }
        }
        return $retArray;
    }

    /**
     * Create a slug of a string, to be used as url.
     *
     * @param string $str the string to format as slug.
     * 
     * @return str the formatted slug.
     */
    public function slugify($str)
    {
        $str = mb_strtolower(trim($str));
        $str = str_replace(['å','ä'], 'a', $str);
        $str = str_replace('ö', 'o', $str);
        $str = preg_replace('/[^a-z0-9-]/', '-', $str);
        $str = trim(preg_replace('/-+/', '-', $str), '-');
        return $str;
    }
}
