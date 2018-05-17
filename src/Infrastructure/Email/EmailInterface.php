<?php
namespace App\Infrastructure\Email;

/**
 * EmailInterface
 */
interface EmailInterface {

    public function setSender(string $email, string $name) : EmailInterface;
    public function setSubject(string $subject) : EmailInterface;
    public function setReceivers(array $receivers) : EmailInterface;
    public function setCc(array $cc) : EmailInterface;
    public function setBcc(array $bcc) : EmailInterface;
    public function setContentType(EmailContentType $type) : EmailInterface;
    public function setHtmlContent(string $text) : EmailInterface;
    public function setTextContent(string $text) : EmailInterface;
}
