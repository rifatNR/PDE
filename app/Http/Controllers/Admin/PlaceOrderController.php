<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Date;
use App\Model\Placeorder;
use App\Invoice;
use App\User;
use App\InvoiceOrder;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PlaceOrderController extends Controller
{
    //
    public function index()
    {            
        // $invoice = Invoice::findOrFail(5);
        // $invoice_orders = InvoiceOrder::where('invoice_id', 5)->get();
        // $user = User::where('id', 9)->first();

        

        //     $invoice_number = $invoice->id;
        //     $invoice_date = $invoice->invoice_date;
        //     $due_date = $invoice->due_date;
        //     $due_amount = $invoice->due_amount;
        //     $total_amount = $invoice->total_amount;
        //     $invoice_orders = $invoice_orders;
        
        return view('Email.placeOrderMail');
        
    //   $orders = Placeorder::where('status', 'accepted')->get();

    //     foreach($orders as $order)
    //         {
    //             $start = ($order->starting_date);
    //             $end = $order->ending_date;
    //             $start_date = Carbon::createFromFormat('Y-m-d H:i:s', $start, 'Asia/Dhaka');
    //             $end_date = Carbon::createFromFormat('Y-m-d H:i:s', $end, 'Asia/Dhaka');
    //             $start_date->setTimezone('UTC');
    //             $end_date->setTimezone('UTC');
    //             $date = Carbon::now();
            

    //             if($date >= $start_date && $date <= $end_date)
    //             {
    //                 $order->status = 'processing';
    //                 $order->save();
    //             }
    //             elseif($date > $end_date)
    //             {
    //                 $order->status = 'QC';
    //                 $order->save();
    //             }

    //         }
    }

    public function vieworder($id)
    {
        $order =Placeorder::find($id);
        return view('admin_layout.pages.viewplaceorder')->with('orders', $order);
    }
}
