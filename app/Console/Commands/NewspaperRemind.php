<?php

namespace App\Console\Commands;

use App\Services\FlyingBookService;
use Illuminate\Console\Command;

class NewspaperRemind extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:newspaper_remind';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     *
     * @return int
     */
    public function handle()
    {
        //飞书服务
        $flyingBookService = new FlyingBookService();
        $content = '来自潘老师的温馨提醒✈️🚀️：亲，一天的工作结束了，日报周报写了吗😄';
        $flyingBookService->sendMsg($content);
    }
}
