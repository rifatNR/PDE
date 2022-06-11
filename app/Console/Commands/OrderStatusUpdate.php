<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Model\Placeorder;
use App\Model\Freetrail;
use Illuminate\Console\Command;

class OrderStatusUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update order status';

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
        $orders = Placeorder::where('status', 'accepted')->get();

        foreach($orders as $order)
            {
                $start = ($order->starting_date);
                $end = $order->ending_date;
                $start_date = Carbon::createFromFormat('Y-m-d H:i:s', $start, 'Asia/Dhaka');
                $end_date = Carbon::createFromFormat('Y-m-d H:i:s', $end, 'Asia/Dhaka');
                $start_date->setTimezone('UTC');
                $end_date->setTimezone('UTC');
                $date = Carbon::now();
            

                if($date >= $start_date && $date <= $end_date)
                {
                    $order->status = 'processing';
                    $order->save();
                }
                elseif($date > $end_date)
                {
                    $order->status = 'QC';
                    $order->save();
                }

            }


            $freetrials = Freetrail::where('status', 'accepted')->get();

            foreach($freetrials as $order)
            {
                $start = ($order->starting_date);
                $end = $order->ending_date;
                $start_date = Carbon::createFromFormat('Y-m-d H:i:s', $start, 'Asia/Dhaka');
                $end_date = Carbon::createFromFormat('Y-m-d H:i:s', $end, 'Asia/Dhaka');
                $start_date->setTimezone('UTC');
                $end_date->setTimezone('UTC');
                $date = Carbon::now();
                
    
                if($date >= $start_date && $date <= $end_date)
                {
                    $order->status = 'processing';
                    $order->save();
                }
                elseif($date > $end_date)
                {
                    $order->status = 'QC';
                    $order->save();
                }
    
            }
    }
}
