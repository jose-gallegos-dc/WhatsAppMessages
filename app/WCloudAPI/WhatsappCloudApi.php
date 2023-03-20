<?php

namespace App\WCloudAPI;

use App\WCloudAPI\Messages\TemplateMessage;
use App\WCloudAPI\Messages\TextMessage;

class WhatsappCloudApi
{
    protected $client_w_cloud_api;

    protected $text_message;

    protected $template_message;

    /**
    * Función constructora que instancia el objeto ClientWCloudApi y los tipos de mensajes 
    *
    * @return object $client_w_cloud_api Objeto del Cliente WhatsApp Cloud Api
    */
    public function __construct()
    {
        $this->client_w_cloud_api= new ClientWCloudApi();

        $this->text_message = new TextMessage();

        $this->template_message = new TemplateMessage();
    }

    /**
    * Función que envía un mensaje de whatsapp tipo texto
    *
    * @return mixed 
    * @var string $to El número teléfonico del destinatario 
    * @var string $text El cuerpo del mensaje de texto
    */
    public function sendTextMessage(string $to, string $text)
    {
        $message = $this->text_message
            ->textMessageBase($text);

        return $this->client_w_cloud_api
            ->sendRequest($to, $message);
    }

    /**
    * Función que envía un mensaje de whatsapp tipo plantilla 
    *
    * @return mixed 
    * @var string $to El número teléfonico del destinatario 
    * @var string $text  La estructura de la plantilla
    */
    public function sendTemplateMessage(string $to, array $template)
    {
        $message = $this->template_message
            ->TemplateMessageBase($template);

        return $this->client_w_cloud_api
            ->sendRequest($to, $message);
    }
}