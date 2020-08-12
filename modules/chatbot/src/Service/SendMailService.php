<?php

namespace Chatbot\Service;

use Configuration;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class SendMailService
{
    public function __construct() {
        $this->smtp_host = Configuration::get('SF_TEMPLATE_SMTP_HOST');
        $this->smtp_port = Configuration::get('SF_TEMPLATE_SMTP_PORT');
        $this->smtp_username = Configuration::get('SF_TEMPLATE_SMTP_USERNAME');
        $this->smtp_password = Configuration::get('SF_TEMPLATE_SMTP_PASSWORD');
        $this->smtp_email_from = Configuration::get('SF_TEMPLATE_EMAIL_FROM');
    }

    /**
     * @return Swift_SmtpTransport
     */
    private function transport(): Swift_SmtpTransport
    {
        return (new Swift_SmtpTransport($this->smtp_host, $this->smtp_port))
            ->setUsername($this->smtp_username)
            ->setPassword($this->smtp_password)
            ;
    }

    /**
     * @return Swift_Mailer
     */
    private function mailer(): Swift_Mailer
    {
        return new Swift_Mailer($this->transport());
    }

    /**
     * @param string $subject
     * @param string $to
     * @param $view
     * @param string|null $from
     */
    public function sendMail(string $subject, string $to, $view, string $from = null)
    {
        $message = (new Swift_Message())
            ->setSubject(strtoupper($subject))
            ->setFrom(is_null($from) ? $this->smtp_email_from : $from)
            ->setTo($to)
            ->setBody($view)
        ;
        $this->mailer()->send($message);
    }
}