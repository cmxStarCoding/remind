<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //每日精美古诗词推送
         $schedule->command('daily:ancient_poetry_push')->dailyAt('09:05');
        //每日带工牌提醒
        $schedule->command('daily:work_plate_remind')->dailyAt('09:00');
        $schedule->command('daily:work_plate_remind')->dailyAt('13:30');
        //日报、周报提醒
        $schedule->command('daily:newspaper_remind')->dailyAt('21:00');
        $schedule->command('daily:newspaper_remind')->dailyAt('23:00');
        //每日点外卖报提醒
        $schedule->command('daily:takeout_remind')->dailyAt('11:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
