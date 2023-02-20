<?php

namespace Entity;

use Smarty;

class Page
{
    /**
     * @var Smarty
     */
    public $smarty;

    /**
     * @var string
     */
    public $html;

    /**
     * Page constructor.
     *
     * Initializes the Smarty template engine with the appropriate template directory.
     */
    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir('src/Resources/views/templates/');
    }

    /**
     * Renders the page by assigning variables to the Smarty instance and rendering templates.
     *
     * @return string The HTML code of the rendered page.
     */
    public function render()
    {
        // Assign variables to the Smarty instance
        $this->smarty->assign('title', 'My Page Title');

        // Render templates and concatenate the resulting HTML code
        $this->html = $this->smarty->display(_TEMPLATE_ . 'header.tpl');
        $this->html .= $this->smarty->display(_TEMPLATE_ . 'body.tpl');
        $this->html .= $this->smarty->display(_TEMPLATE_  . 'footer.tpl');

        return $this->html;
    }
}