<?php

namespace Check24Framework;


class ViewModel
{

    private $currentPath = null;
    private $contentArray = [];
    private $layoutArray = [];
// Namen ändern
    public function setTemplate($path)
    {
        $this->currentPath = $path;

    }

    public function setLayoutVariables($variable)
    {
        $this->layoutArray = $variable;

    }

    /**
     * @return array
     */
    public function getLayoutVariables()
    {
        return $this->layoutArray;
    }

    public function setTemplateVariables($variable)
    {

        $this->contentArray = $variable;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->renderTemplate();
    }

    /**
     * @return string
     */
    public function renderTemplate(): string
    {
        extract($this->contentArray);
        ob_start();
        include($this->currentPath);
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    /**
     * @return array
     */
}