<?php

/*
 * Get Tempaltes
 */

class Template {

    /**
     * Template directory
     */
    private $templateDir;

    /**
     * Class Constructor
     */
    public function __construct() {
        $this->templateDir = __DIR__ . '/templates';
    }

    /**
     * Get Templates
     */
    public function getTemplates() {
        $htmlFiles = [];
        foreach (glob($this->templateDir . '/*.html') as $htmlFile) {
            $htmlFiles[] = [
                'path' => $htmlFile,
                'name' => ucfirst(pathinfo(basename($htmlFile), PATHINFO_FILENAME))
            ];
        }
        return $htmlFiles;
    }

}
