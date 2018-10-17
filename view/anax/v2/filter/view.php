<?php
namespace Anax\View;

?>
<p>Originaltexten:</p>
<pre>
<?php
echo wordwrap(htmlentities($text));
?>
</pre>
<p>Originaltexten med filter på:</p>
<pre>
<?php
echo wordwrap(htmlentities($html));

?>
</pre>
<p>Slutresultat:</p>
<!-- <pre> -->
<?php
echo $html;

?>
<!-- </pre> -->
