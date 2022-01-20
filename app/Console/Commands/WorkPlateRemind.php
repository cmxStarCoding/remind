<?php

namespace App\Console\Commands;

use App\Services\FlyingBookService;
use Illuminate\Console\Command;

class WorkPlateRemind extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:work_plate_remind';

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
        $content = '来自潘老师的温馨提醒✈️🚀️：马上要上班了，一定要记得带工牌哦😄';
        $flyingBookService->sendMsg($content);
    }
}
