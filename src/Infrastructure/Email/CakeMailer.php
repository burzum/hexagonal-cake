<?php
namespace App\Infrastructure\Email;
use Cake\Mailer\Mailer;

/**
 * Mailer Interface
 */
class CakeMailer implements MailerInterface {

    /**
     * Mailer
     */
    protected $mailer;

    public function __construct(Mailer $mailer) {
        $this->mailer = $mailer;
    }

    public function send(EmailInterface $email) {

    }

}
