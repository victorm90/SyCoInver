<?php

namespace App\Console;

use App\Models\Ejecutors;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $ejecutors = Ejecutors::where('estado', true)->get();
            foreach ($ejecutors as $ejecutor) {
                if ($ejecutor->dayoff >= 0) {
                    $ejecutor->estado = 0;
                    $ejecutor->save();
                }
            }
            Log::info('La tarea se ejecutó a las ' . now());
        })->everyFiveMinutes();
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
