<?php

namespace App\Http\Controllers;

use App\WCloudAPI\Templates\HelloWorldTemplate;
use App\WCloudAPI\WhatsappCloudApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    protected $whatsapp_cloud_api;

    protected $hello_world_template;

    public function __construct()
    {
        $this->whatsapp_cloud_api = new WhatsappCloudApi([
            'access_token' => 'EAAHluWbrnZC4BAEOuxfqkiYyWYTnUUQjPlE5yl9t3ftkeHVpMZAbgrZCZB9095rcNxXdLkZBiyHB5w0n3MX1jNcTcxNFewpWZCtx7ZBJvXQ4OgGKiLZBpD1aJXhP5ZCUryZBp3eUySy6d2ZACIGNscitvlOhe8OjASS3zXlt6piXdntjzgqp4cfDx09NAkWq6wEdULpLZCqynyi0XgZDZD',
            'from_phone_number_id' => '109966078649122',
        ]);

        $this->hello_world_template = new HelloWorldTemplate;
    }

    public function index(Request $request)
    {
        // return $response;
        // return $this->whatsapp_cloud_api
        //     ->sendTextMessage($request->to, $request->message);

        return $this->whatsapp_cloud_api
            ->sendTemplateMessage($request->to, $this->hello_world_template->template());
    }
}
