<?php
declare(strict_types = 1);

namespace App\Domain\Repository;

use Cake\ORM\Locator\TableLocator;

/**
 * ArticlesRepository
 */
class ArticlesRepository
{
    /**
     *
     */
    public function getPublicArticles()
    {
        $locator = new TableLocator();
        $articles = $locator->get('articles');

        return $articles->find()
            ->where([
                'is_published' => true
            ]);
    }
}
