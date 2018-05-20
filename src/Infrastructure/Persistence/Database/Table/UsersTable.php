<?php
declare(strict_types = 1);

namespace App\Infrastructure\Persistence\Database\Table;

use Cake\Datasource\ConnectionManager;
use Cake\ORM\Table;

/**
 * Users Table
 */
class UsersTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setPrimaryKey('id');
        $this->setConnection(ConnectionManager::get('default'));
    }
}
