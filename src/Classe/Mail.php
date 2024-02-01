<?php

namespace App\Classe;

use Mailjet\Client;
use Mailjet\Resources;

class Mail
{
    private $api_key = 'ec24e721987bf895d1e1a09746a4d41b';
    private $api_key_secret = '1159762ca4e381e1bfd9e828105081ea';

    public function send($to_email, $to_name, $subject, $content)
{
    $mj = new Client($this->api_key, $this->api_key_secret, true,['version' => 'v3.1']);
    $body = [
        'Messages' => [
            [
                'From' => [
                    'Email' => "cheminfrancoisarnaud@gmail.com",
                    'Name' => "La Boutique Française"
                ],
                'To' => [
                    [
                        'Email' => $to_email,
                        'Name' => $to_name
                    ]
                ],
                'TemplateID' => 5649065,
                'TemplateLanguage' => true,
                'Subject' => $subject,
                'Variables' => [
                    'content' => $content
                ]
            ]
            ]
        ];
    $response = $mj->post(Resources::$Email, ['body' => $body]);
    $response->success() && dd($response->getData());
}
}