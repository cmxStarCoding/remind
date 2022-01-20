<?php

namespace App\Console\Commands;

use App\Services\FlyingBookService;
use Illuminate\Console\Command;

class TakeOutRemind extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:takeout_remind';

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
        $content = '来自潘老师的温馨提醒✈️🚀️：忙碌了一上午是不是该点外卖了?😄';
        $flyingBookService->sendMsg($content);
    }
}
