<?php

namespace App\Console;

// use App\Jobs\UpdateTableBookingStatus;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DB;
use Carbon\carbon;

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
    // $schedule->command('inspire')->hourly();
    $schedule->call(function () {
      $currentDate = Carbon::now('GMT+7');
      $tgl = DB::table('bookings')->select('tanggal','jam_selesai')->where('status','dipesan')->get();
      $date  = $tgl[0]->tanggal." ".$tgl[0]->jam_selesai;
  
       echo "Booking".$currentDate;
       echo "Tanggal ".date($date);
  
      // $tgl = DB::table('bookings')->select('tanggal')->where('status','dipesan')->get();
        for($i = 0;$i<count($tgl);$i++){
          if(date($date) < $currentDate){
            DB::
          table('bookings')->where('status','dipesan')->update(['status'=> 'selesai']);
          }
        }
        })
      ->everyMinute();
  }

  /**
   * Register the commands for the application.
   *
   * @return void
   */
  protected function commands()
  {
    $this->load(__DIR__ . '/Commands');

    require base_path('routes/console.php');
  }
}
