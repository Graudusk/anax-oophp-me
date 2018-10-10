<?php
namespace Anax\View;

/**
 * General functions.
 */

/**
 * Some useful function.
 *
 * @return void
 */
function getImage($src)
{
    if ($src) {
        return asset($src);
    }
    return asset("img/noimage.png");
}
