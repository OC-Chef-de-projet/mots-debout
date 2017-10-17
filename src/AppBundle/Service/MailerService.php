<?php
/**
 * Created by PhpStorm.
 * User: psa
 * Date: 22/09/17
 * Time: 19:30.
 */

namespace AppBundle\Service;

class MailerService
{
    private $mailer = null;

    private $from = 'info@lignedemire.eu';
    private $fromName = 'Info ETMD';

    public function __construct($mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param $data array "name", "email", and "message" keys
     */
    public function sendMessage($data)
    {
        $header = 'Messsage de la part de '.$data['name'].' ('.$data['email'].')';
        $message = \Swift_Message::newInstance()
            ->setSubject($header)
            ->setFrom([$this->from => $this->fromName])
            ->setTo('ps.augereau@gmail.com')
            ->setBody($data['message'], 'text/html')
            ->addPart(strip_tags($data['message']), 'text/plain');
        $this->mailer->send($message);
    }
}
