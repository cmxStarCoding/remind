<?php

namespace App\Console\Commands;

use App\Services\FlyingBookService;
use App\Services\SeveralBranchesService;
use Illuminate\Console\Command;

class AncientPoetryPush extends Command
{
    /**
     * 每日激励
     *
     * @var string
     */
    protected $signature = 'daily:ancient_poetry_push';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '每日精美古诗词';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     * @throws
     * @return void
     */
    public function handle()
    {
        //几枝服务
        $severalBranchesService = new SeveralBranchesService();
        //飞书服务
        $flyingBookService = new FlyingBookService();
        //获取飞书古诗词
        $ancientPoetry = $severalBranchesService->getAncientPoetry();
        if(!empty($ancientPoetry['data']['content']) && !empty($ancientPoetry['data']['origin']['author'])){
            $content = '每日精美古诗词🐶：'.$ancientPoetry['data']['content'].'--'.$ancientPoetry['data']['origin']['author'];
            $flyingBookService->sendMsg($content);
        }
    }
}
