<?php

/**
 * User
 *
 * A user of the system
 */
class User
{

    /**
     * First name
     * @var string
     */
    public $firstName;
    
    /**
     * Last name
     * @var string
     */
    public $lastName;

    /**
     * Email address
     * @var string
     */
    public $email;
    
    /**
     * Mailer object
     * @var Mailer
     */
    protected $mailer;

    public function __construct(string $email ='', string $firstName = '', string $lastName = '')
    {
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
    
    /**
     * Set the mailer dependency
     *
     * @param Mailer $mailer The Mailer object
     */
    public function setMailer(Mailer $mailer) {
        $this->mailer = $mailer;        
    }    
        
    /**
     * Get the user's full name from their first name and surname
     *
     * @return string The user's full name
     */
    public function getFullName()
    {
        return trim("$this->firstName $this->lastName");
    }

    /**
     * Send the user a message
     *
     * @param string $message The message
     *
     * @return boolean True if sent, false otherwise
     */
    public function notify(string $message)
    {
        return $this->mailer->sendMessage($this->email, $message);
//        return false;
    }    
}
