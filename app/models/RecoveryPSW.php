<?php

namespace app\models;

use shop\App;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class RecoveryPSW extends AppModel{

      public $attributes = [
        'email' => '',
        'time' => '',
        'hash' => ''
    ];
    public $rules = [
          'required' => [
            ['email']
        ],
        'email' => [
            ['email'],
        ],
    ];

        public static function mailNewPsw($user_email){
// Create the Transport
        $transport = (new Swift_SmtpTransport(App::$app->getProperty('smtp_host'), App::$app->getProperty('smtp_port'), App::$app->getProperty('smtp_protocol')))
            ->setUsername(App::$app->getProperty('smtp_login'))
            ->setPassword(App::$app->getProperty('smtp_password'))
        ;
        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        ob_start();
        require APP . '/views/mail/mail_new_psw.php';
        $body = ob_get_clean();

        $message_client = (new Swift_Message("Восстановление пароля для Вашего аккаунта на сайте " . App::$app->getProperty('shop_name')))
            ->setFrom([App::$app->getProperty('smtp_login') => App::$app->getProperty('shop_name')])
            ->setTo($user_email)
            ->setBody($body, 'text/html')
        ;

        // Send the message
        $result = $mailer->send($message_client);
         unset($_SESSION['hash']);
    }

}
