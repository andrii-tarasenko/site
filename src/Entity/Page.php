<?php

namespace Entity;

use Smarty;

class Page
{
    public $smarty;
    public $html;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir('src/Resources/views/templates/');
    }

    public function render()
    {
        $this->smarty->assign('title', 'My Page Title');

        $this->html = $this->smarty->display(_TEMPLATE_ . 'header.tpl');
        $this->html .= $this->smarty->display(_TEMPLATE_ . 'body.tpl');
        $this->html .= $this->smarty->display(_TEMPLATE_  . 'footer.tpl');

        return $this->html;
    }
}
