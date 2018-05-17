<?php
namespace App\Infrastructure\Email;

/**
 * Mailer Interface
 */
interface MailerInterface {

    public function send(EmailInterface $email);

}
