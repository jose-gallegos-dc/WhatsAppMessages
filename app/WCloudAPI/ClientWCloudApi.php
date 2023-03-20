<?php

namespace App\WCloudAPI;

use Illuminate\Support\Facades\Http;

class ClientWCloudApi
{
   public const BASE_GRAPH_URL = 'https://graph.facebook.com';

   public const DEFAULT_GRAPH_VERSION = 'v15.0';

   protected string $access_token;

   protected string $from_phone_number_id;


   /**
    * Función contructura del cliente de WhatsAppCloudApi
    *
    * @return object Instancia de client con los parámetros correspondientes
    * @var string $acccess_token El token de acceso que brinda la cuenta de WhatsAppCloudApi
    * @var string $from_phone_number Identificador de número de teléfono que brinda la cuenta de WhatsAppCloudApi
    */
   // public function __construct(string $access_token = NULL, string $from_phone_number_id = NULL)
   // {
   //    $this->access_token = $access_token ?: $_ENV['APP_WHATSAPP_CLOUD_API_TOKEN']  ?? NULL;
   //    $this->from_phone_number_id = $from_phone_number_id ?: $_ENV['APP_WHATSAPP_CLOUD_API_FROM_PHONE_NUMBER'] ?? NULL;
   // }

   public function __construct()
   {
      $this->access_token = empty($_ENV["APP_WHATSAPP_CLOUD_API_TOKEN"]) ? NULL : $_ENV["APP_WHATSAPP_CLOUD_API_TOKEN"];
      $this->from_phone_number_id = empty($_ENV["APP_WHATSAPP_CLOUD_API_FROM_PHONE_NUMBER"]) ? NULL : $_ENV["APP_WHATSAPP_CLOUD_API_FROM_PHONE_NUMBER"];
   }

   public function accessToken(): string
   {
      return $this->access_token;
   }

   public function fromPhoneNumberId(): string
   {
      return $this->from_phone_number_id;
   }

   /**
    * Función que construye los headers del cliente de WhatsAppCloudApi
    * @return array Conjunto con el access token tipo bearer y el tipo de contenido json
    */
   public function headers(): array
   {
      return [
         'Authorization' => 'Bearer ' . $this->accessToken(),
         'Content-Type' => 'application/json',
      ];
   }

   /**
    * Función que arma la estructura y envía el mensaje usando Whatsapp Cloud Api 
    *
    * @return array Array con la respuesta de WhatsappCloudApi
    * @var string $to El número teléfonico del destinatario 
    * @var array $message Cuerpo del mensaje
    */
   public function sendRequest(string $to, array $message)
   {
      try {
         $base = [
            'messaging_product' => 'whatsapp',
            'to' => $to,
         ];

         $content = array_merge($base, $message);

         $response = Http::withHeaders($this->headers())
            ->post(
               $this->buildRequestUri(),
               $content
            );

         return $response->json();
      } catch (\Throwable $th) {
         throw $th;
      }
   }

   private function buildBaseUri(): string
   {
      return self::BASE_GRAPH_URL . '/' . self::DEFAULT_GRAPH_VERSION;
   }

   private function buildRequestUri(): string
   {
      return $this->buildBaseUri() . '/' . $this->fromPhoneNumberId() . '/messages';
   }
}