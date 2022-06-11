<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Freetrail;
use App\Model\Placeorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;

class FreeOrderController extends Controller
{
    //
    public function index($status)
    {
        // return $status;
        if($status == 'all')
        {
            $freetrail = Freetrail::orderBy('id', 'DESC')->get();
            $filter = 'All';
        }
        if($status == 'new')
        {
            $freetrail = Freetrail::where('status', 'new')->orderBy('id', 'DESC')->get();
            $filter = 'New';
        }
        if($status == 'accepted')
        {
            $freetrail = Freetrail::where('status', 'accepted')->orderBy('id', 'DESC')->get();
            $filter = 'Accepted';
        }
        if($status == 'rejected')
        {
            $freetrail = Freetrail::where('status', 'rejected')->orderBy('id', 'DESC')->get();
            $filter = 'Rejected';
        }
        if($status == 'processing')
        {
            $freetrail = Freetrail::where('status', 'processing')->orderBy('id', 'DESC')->get();
            $filter = 'Processing';
        }
        if($status == 'qc')
        {
            $freetrail = Freetrail::where('status', 'qc')->orderBy('id', 'DESC')->get();
            $filter = 'QC';
        }
        if($status == 'completed')
        {
            $freetrail = Freetrail::where('status', 'completed')->orderBy('id', 'DESC')->get();
            $filter = 'Completed';
        }
        return view('admin_layout.pages.dashboard.free-trial.index', compact('freetrail', 'filter'));
    }
    public function vieworder($id)
    {
        // return $id;
        $order = Freetrail::findOrFail($id);
        return view('admin_layout.pages.dashboard.free-trial.info', compact('order'));
    }

    public function action(Request $request)
    {
        // return $request;
        $order = Freetrail::find($request->id);

        if ($request->status == 'accepted') 
        {
            $order->starting_date = $request->s_date;
            $order->ending_date = $request->e_date;
            $order->status = $request->status;
            $order->save();

            return redirect()->route('admin.freeorder.index', ['status' => 'accepted'])->withSuccess('Order status is updated to Accepted');
        } 
        else 
        {
            $order->status = $request->status;
            $order->save();
            return redirect()->route('admin.freeorder.index', ['status' => 'rejected'])->withError('Order is rejected');
        }
    }

    public function statusUpdate(Request $request)
    {
        $order = Freetrail::findOrFail($request->id);
        $order->status = $request->status;
        $order->save();
        
        return redirect()->route('admin.free-trial.info', ['id' => $order->id])->withSuccess('Order status is update');
    }

    public function linkUpdate(Request $request)
    {
        // return $request->email;
        $emails = explode(',', $request->email);
        $order = Freetrail::findOrFail($request->id);

        $url = $request->url;

        $mailData = [
            'subject' => 'Free-trial Order Completed',
            'message' => 'Dear ' . $order->user->name . ', You have a free-trial order on ' . $order->created_at . '. We have completed the order and uploaded the files in a cloud.',
            'url' => $url,
        ];


        try {
            foreach ($emails as $email) {
                Mail::to($email)->send(new InvoiceMail($mailData));
            }
    
            if (isset($request->me)) {
                Mail::to('photodesignexpertbd@gmail.com')->send(new InvoiceMail($mailData));
            }
    
            $order->mail_sent = 1;
            $order->save();
    
            return redirect()->route('admin.free-trial.info', ['id' => $order->id])->withSuccess('Mail is sent');
    
        } catch(Exception $e) {
            //return $e;
            return back()->withError('Somthing went wrong');
        }

        
        // Mail::to($invoice->user->email)->send( new InvoiceMail($mailData) );
    }
}
