<?php
namespace App\Infrastructure\Persistence\Session;

interface SessionInterface
{

    public function destroy() : void;

    public function read($key) : mixed;

    public function write($key, $value) : void;
}
