<?php
namespace App\Domain\Repository;

use Cake\ORM\Locator\TableLocator;

/**
 * ArticlesRepository
 */
class ArticlesRepository
{
    public function __construct()
    {

    }

    public function paginatePublicArticles()
    {
        $locator = new TableLocator();
        $articles = $locator->get('articles');
        return $articles->find()->all();
    }
}
