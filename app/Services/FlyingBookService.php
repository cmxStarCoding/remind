<?php
namespace App\Services;

/*
 * 飞书服务类
 */

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class FlyingBookService{

    public $requestUrl = 'https://open.feishu.cn/open-apis/bot/v2/hook/3d3dce71-f3ca-4a37-9f63-257c571a727d';
    public $client;
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * 发送飞书消息
     * @param string $content
     * @return void
     * @throws
     */
    public function sendMsg($content = ''){
        $response = $this->client->post($this->requestUrl,[
            'headers' => ['Content-Type' => 'application/json'],
            'json' => [
                'msg_type' => 'text',
                'content' => [
                    'text' => $content
                ],
            ]
        ]);
        Log::info('flying_book_return:'.$response->getBody()->getContents());
    }
}
