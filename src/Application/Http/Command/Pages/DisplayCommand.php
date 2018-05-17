<?php
declare(strict_types = 1);

namespace App\Application\Http\Command\Pages;

use App\Application\Http\Command\AbstractCommand;

/**
 * Displays a static page
 */
class DisplayCommand extends AbstractCommand {

    protected $page = '';
    protected $path = 'Pages';

    /**
     * @inheritdoc
     */
    protected function initialize() : void
    {
        $request = $this->container->get('request');

        $path = ($request->getParam('pass'));
        $count = count($path);

        if ($count === 0) {
            throw new \RuntimeException('Page not found');
        }

        if ($count === 1) {
            $this->page = $path[0];
            return;
        }

        $this->page = $path[$count - 1];
        unset($path[$count -1 ]);

        $this->path = 'Pages' . '/' . implode((array)$path, '/');
    }

    /**
     * Gets the page name / template
     *
     * @return string
     */
    public function getPage() : string
    {
        return $this->page;
    }

    /**
     * Gets the path to the page / template folder
     *
     * @return string
     */
    public function getPath() : string
    {
        return $this->path;
    }
}
