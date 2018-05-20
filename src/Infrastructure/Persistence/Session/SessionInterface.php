<?php
namespace App\Infrastructure\Persistence\Session;

/**
 * Session Interface
 */
interface SessionInterface
{

    public function start() : void;

    public function renew() : void;

    public function destroy() : void;

    public function read($key) : mixed;

    public function write($key, $value) : void;
}
