<?php

namespace App\WCloudAPI\Templates;

class HelloWorldTemplate
{

    public function __construct() { }

    /**
    * Función que arma un array con la plantilla predeterminada hello_world de WhatsAppCloudApi
    *
    * @return array Array con la estructura de la plantilla hello_world
    */
    public function template() : array 
    {
        return [
            'template' => [
                'name' => 'hello_world',
                'language' => [
                    'code' => 'en_US',
                ]
            ]
        ];    
    }
    
}