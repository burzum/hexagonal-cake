<?php
namespace App\Infrastructure\Persistence\Session;

use Cake\Http\Session;

class CakeSession implements SessionInterface
{

    public function __construct() {
        $session = new Session();
    }


}
