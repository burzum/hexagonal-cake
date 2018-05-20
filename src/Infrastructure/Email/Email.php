<?php
declare(strict_types = 1);

namespace App\Infrastructure\Email;

/**
 * Email Data Transfer Object
 *
 * This is a framework agnostic object that describes an email
 */
class Email implements EmailInterface
{
    protected $sender;
    protected $receivers;
    protected $bcc;
    protected $cc;
    protected $subject;
    protected $htmlContent;
    protected $textContent;
    protected $contentType;

    public function setSender(string $email, string $name): EmailInterface
    {
        $this->sender = $email;

        return $this;
    }

    public function setSubject(string $subject): EmailInterface
    {
        $this->subject = $subject;

        return $this;
    }

    public function setReceivers(array $receivers): EmailInterface
    {
        $this->receivers = $receivers;

        return $this;
    }

    public function setCc(array $cc): EmailInterface
    {
        $this->cc = $cc;

        return $this;
    }

    public function setBcc(array $bcc): EmailInterface
    {
        $this->bcc = $bcc;

        return $this;
    }

    public function setContentType(EmailContentType $type): EmailInterface
    {
        $this->contentType = $type;

        return $this;
    }

    public function setHtmlContent(string $html): EmailInterface
    {
        $this->htmlContent = $html;

        return $this;
    }

    public function setTextContent(string $text): EmailInterface
    {
        $this->textContent = $text;

        return $this;
    }

    public function getSender(): string
    {
        return $this->sender;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getReceivers(): array
    {
        return $this->receivers;
    }

    public function getCc(): array
    {
        return $this->cc;
    }

    public function getBcc(): array
    {
        return $this->bcc;
    }

    public function getContentType(): string
    {
        return $this->contentType;
    }

    public function getHtmlContent(): string
    {
        return $this->htmlContent;
    }

    public function getTextContent(): string
    {
        return $this->textContent;
    }
}
