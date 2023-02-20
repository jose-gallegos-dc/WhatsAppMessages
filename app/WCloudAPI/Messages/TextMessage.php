<?php

namespace App\WCloudApi\Messages;

class TextMessage
{

    public function __construct() { }

    /**
    * Función que arma un array de una mensaje de texto básico
    *
    * @return array Array con la estructura de un mensaje de tipo texto
    * @var string $text Cuerpo de mensaje de texto
    */
    public function textMessageBase(string $text) 
    {
        return [
            'type' => 'text',
            'text' => [
                'body' => $text
            ]
        ];
    }

}