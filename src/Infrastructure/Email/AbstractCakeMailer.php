<?php
namespace App\Infrastructure\Email;

use Cake\Mailer\Mailer;

/**
 * Abstract Cake mailer
 */
abstract class AbstractCakeMailer implements MailerInterface {

    /**
     * Mailer
     */
    protected $mailer;

    public function __construct(Mailer $mailer) {
        $this->mailer = $mailer;
    }

    abstract public function send(EmailInterface $email);

}
