<?php

/**
 * Mailer
 *
 * Send messages
 */
class Mailer
{

    /**
     * Send a message
     *
     * @param string $email The email address
     * @param string $message The message
     *
     * @return boolean True if sent, false otherwise
     * @throws Exception
     */
    public function sendMessage(string $email, string $message): bool
    {
        if (empty($email))
        {
            throw new Exception;
        }
        // Use mail() or PHPMailer for example
        sleep(3);

        echo "send '$message' to '$email'";

        return true;
    }
}
