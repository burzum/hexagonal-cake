<?php
namespace App\Infrastructure\Persistence\Database\Table;

use Cake\Datasource\ConnectionManager;
use Cake\ORM\Table;

/**
 * Articles Table
 */
class ArticlesTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('articles');
        $this->setPrimaryKey('id');
        $this->setConnection(ConnectionManager::get('default'));
    }
}
