<?php
declare(strict_types = 1);

namespace App\Infrastructure\Email;

/**
 * Mailer Interface
 *
 * Use this interface on decorator classes that wrap an implementation of a mailer
 * to make it framework agnostic.
 */
interface MailerInterface
{
    public function send(EmailInterface $email);
}
