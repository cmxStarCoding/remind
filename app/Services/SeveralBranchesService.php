<?php
namespace App\Services;

/*
 * 几枝服务类
 */

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class SeveralBranchesService{

    public $requestUrl = 'https://v2.jinrishici.com/one.json?client=npm-sdk/1.0&X-User-Token=hJBzZOqET8qhhGiwWl%2FNJIE9aRUyaF0f';
    public $client;
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * 获取飞书的古诗文
     * @return array
     * @throws
     */
    public function getAncientPoetry()
    {
        $response = $this->client->get($this->requestUrl);
        $requestResult = $response->getBody()->getContents();
        Log::info('several_branches_return:'.$requestResult);
        return json_decode($requestResult,true);
    }
}
