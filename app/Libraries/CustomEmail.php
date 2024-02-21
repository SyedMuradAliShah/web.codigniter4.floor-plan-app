<?php

namespace App\Libraries;

use App\Libraries\Options; // Loading Options Library

class CustomEmail
{
    private $email;
    private $option;


    public function setProtcols()
    {
        $this->option = new Options(); // Loading Options Library
        $this->option->load(); // Loading Options


        $this->email = \Config\Services::email();

        $config['charset']  = 'utf-8';
        $config['wordWrap'] = true;
        $config['mailType'] = 'html';

        if ($this->option->key->smtp_active == 1) {
            $config['protocol'] = 'smtp';
            $config['SMTPHost'] = $this->option->key->smtp_host;
            $config['SMTPUser'] = $this->option->key->smtp_username;
            $config['SMTPPass'] = $this->option->key->smtp_password;
            $config['SMTPPort'] = $this->option->key->smtp_port;
            $config['SMTPCrypto'] = $this->option->key->smtp_encryption;
        }

        $this->email->initialize($config);
    }

    public function sendMail($to, $subject, $data, $view = 'emails/default', $reply_to = null)
    {
        $this->email->clear();

        $data = array_merge($data, [
            'base_url'                      => base_url(),
            'option'                        => $this->option->key,
            'web_name'                      => $this->option->key->web_name,
            'address'                       => $this->option->key->address,
            'phone_number'                  => $this->option->key->phone,
        ]);

        $body = view($view, $data);

        if (!is_null($reply_to))
            $this->email->setReplyTo($reply_to, $this->option->key->web_name);

        $this->email->setFrom($this->option->key->sender_email, $this->option->key->web_name);
        $this->email->setTo($to);
        $this->email->setSubject($subject);
        $this->email->setMessage($body);
        $this->email->setNewLine("\r\n");

        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }
}
