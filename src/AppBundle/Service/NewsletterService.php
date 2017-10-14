<?php

namespace AppBundle\Service;

use AppBundle\Entity\Newsletter;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * Class NewsletterService
 *
 * @package AppBundle\Service
 */
class NewsletterService
{

    private $em;
    private $mc;

    /**
     * NewsletterService constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em, $mc){
        $this->em = $em;
        $this->mc = $mc;
    }

    /**
     * Registration to newsletter
     *
     * @param $email
     * @return array
     */
    public function subscribe($email){
        $email = $this->emailClean($email);

        // Verify email address first
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

            // Check if this email is already use for newsletter
            if(!$this->isSubscribe($email)){

                // subscribe newsletter
                $newsletter = new Newsletter();
                $newsletter->setEmail($email);
                $this->em->persist($newsletter);
                $this->em->flush();

                $this->sendToMailchimp($email);
                $response = array(
                    'status'    => true,
                    'message'   => 'Votre inscription à notre newletter a bien été prise en compte, toute l\'équipe vous remercie.'
                );

            }else{
                $response = array(
                    'status'    => false,
                    'message'   => 'Cet email recoit déjà les newsletters.'
                );
            }
        }else{
            $response = array(
                'status'    => false,
                'message'   => 'Erreur dans votre email'
            );
        }
        return $response;
    }

    /**
     * Determine if an newsletter entity already exist in the database
     *
     * @param $email
     * @return bool
     */
    private function isSubscribe($email){
        $newsletter = $this->em->getRepository('AppBundle:Newsletter')
            ->findOneBy(array('email' => $this->emailClean($email)));

        return (!$newsletter) ? false : true;
    }

    /**
     * Clear email before checking
     *
     * @param $email
     * @return string
     */
    private function emailClean($email){
        return  trim(strtolower($email));
    }

    /**
     * Send email to Mailchimp
     *
     * @param $email
     */
    private function sendToMailchimp($email)
    {

        $api_key = $this->mc['api_key'];
        $server = $this->mc['server'];
        $list_id = $this->mc['list_id'];
        $auth = base64_encode( 'user:'.$api_key );
        $data = array(
            'apikey'        => $api_key,
            'email_address' => $email,
            'status'        => 'subscribed'
        );
        $json_data = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://'.$server.'api.mailchimp.com/3.0/lists/'.$list_id.'/members/');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
            'Authorization: Basic '.$auth));
        curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

        curl_exec($ch);
    }

}

