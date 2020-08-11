<?php


namespace fantomx1\PlainFilemapViewer;


use fantomx1\ViewLocatorRenderTrait;

/**
 * Class PlainFilemapViewerWidget
 * @package fantomx1\PlainFilemapViewer
 */
class PlainFilemapViewerWidget
{

    use ViewLocatorRenderTrait;


    /**
     * protected function getViewsDir()
     * {
     * return $this->getDefaultViewsDir();
     * }
     * @return string
     */
    protected function getViewsDir()
    {
        return $this->getDefaultViewsDir("./views");
    }


    /**
     * @param $path
     */
    public function run($path)
    {

        //$path = "../../examples";
        $dir = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path)
        );

        $this->render(
            "files",
            [
                'dir' => $dir
            ]
        );
    }
}
