<?php

namespace App\Http\Controllers;

use App\WCloudAPI\ClientWCloudApi;
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
        $this->whatsapp_cloud_api = new WhatsappCloudApi();

        $this->hello_world_template = new HelloWorldTemplate;
    }

    public function index(Request $request)
    {
        // $client = new ClientWCloudApi();

        // return $client->fromPhoneNumberId();
        // return $this->whatsapp_cloud_api
        //     ->sendTextMessage($request->to, $request->message);

        // return $request;

        $response = $this->whatsapp_cloud_api
            ->sendTemplateMessage($request->to, $this->hello_world_template->template());

        return $response;
    }
}
