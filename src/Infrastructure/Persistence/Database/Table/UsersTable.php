<?php
namespace App\Infrastructure\Persistence\Database\Table;

use Cake\ORM\Table;

class UsersTable extends Table
{

    public function initialize(array $config) 
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setPrimaryKey('id');
    }
}
