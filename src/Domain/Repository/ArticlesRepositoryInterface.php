<?php
namespace App\Domain\Repository;

/**
 * Articles Repository Interface
 */
interface ArticlesRepositoryInterface
{
    /**
     *
     */
    public function paginatePublicArticles(array $paginationParams = []);
}
