<?php

namespace App\WCloudApi\Messages;

class TemplateMessage
{

    public function __construct() { }

    /**
    * Función que arma un array como plantilla de mensaje
    *
    * @return array Array con la estructura de la plantilla indicada
    * @var array $to Array combinado con la plantilla base y la plantilla indicada
    */
    public function TemplateMessageBase(array $template) : array 
    {
        $array_template['type'] = 'template';

        $array_template['template'] = $template['template'];

        return $array_template;
    }

}