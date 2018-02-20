<?php

namespace Check24Framework;


class ViewModel
{
    private $currentPath = null;
    private $contentArray = [];

    public function setTemplate($path)
    {
        $this->currentPath = $path;
    }

    public function setTemplateVariable($variable)
    {
        $this->contentArray = $variable;
    }



    public function loadTemplate()
    {
        extract($this->contentArray);
        ob_start();
        include($this->currentPath);
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

}