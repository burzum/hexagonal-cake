<?php
declare(strict_types = 1);

namespace App\Infrastructure\Email;

/**
 * Email Interface
 *
 * This is a data transfer object that describes an email
 *
 * The object can be passed to any method / class that can use it to construct
 * an email the way it likes and send the email. This ensures that the email
 * implementation is agnostic to the framework.
 */
interface EmailInterface {

    // Setters
    public function setSender(string $email, string $name) : EmailInterface;
    public function setSubject(string $subject) : EmailInterface;
    public function setReceivers(array $receivers) : EmailInterface;
    public function setCc(array $cc) : EmailInterface;
    public function setBcc(array $bcc) : EmailInterface;
    public function setContentType(EmailContentType $type) : EmailInterface;
    public function setHtmlContent(string $html) : EmailInterface;
    public function setTextContent(string $text) : EmailInterface;

    // Getters
    public function getSender() : string;
    public function getSubject() : string;
    public function getReceivers() : array;
    public function getCc() : array;
    public function getBcc() : array;
    public function getContentType() : string;
    public function getHtmlContent() : string;
    public function getTextContent() : string;
}
