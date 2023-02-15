<?php

namespace Entity;

use Entity\Page;

class Main
{
    public static function init()
    {
        $generatePage = new Page();
        echo $generatePage->render();
    }
}
