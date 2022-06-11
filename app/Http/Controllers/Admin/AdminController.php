<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\User;
use App\Invoice;
use Carbon\Carbon;
use App\InvoiceOrder;
use App\InvoicePayment;
use App\Mail\InvoiceMail;
use App\Model\Placeorder;
use App\Model\Freetrail;
use App\Http\Controllers\Controller;
use App\Mail\GiftMail;
use App\Model\DynamicPortfolio;
use App\Model\DynamicPricing;
use App\Model\DynamicService;
use App\HeaderTags;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Traits\HasRoles;

class AdminController extends Controller
{
    public function index()
    {
        // return $_SERVER['SERVER_NAME'];
        $all_users = User::orderBy('id', 'desc')->get();

            $users = [];
            foreach($all_users as $user) {
                if(!$user->hasRole('admin')) {
                    array_push($users, $user);
                } 
            }

        $orders = Placeorder::orderBy('id', 'DESC')->get();
        $freetrial = Freetrail::all();
        $invoices = Invoice::all();
        $services = DynamicService::all();
        $portfolios = DynamicPortfolio::all();
        $pricing = DynamicPricing::all();
        $tags = HeaderTags::all();
        return view('admin_layout.index', compact('tags', 'users', 'orders', 'invoices', 'services', 'portfolios', 'pricing', 'freetrial'));
    }

    //order management//
    public function allOrders()
    {
        $orders = Placeorder::orderBy('id', 'DESC')->get();
        return view('admin_layout.pages.dashboard.order.all_order', compact('orders'));
    }

    public function newOrders(Request $request)
    {
        if (isset($request->id)) {
            $orders = Placeorder::where([['status', 'new'], ['user_id', $request->id]])->orderBy('id', 'DESC')->get();
        } else {
            $orders = Placeorder::where('status', 'new')->orderBy('id', 'DESC')->get();
        }

        return view('admin_layout.pages.dashboard.order.neworder', compact('orders'));
    }

    public function orderInfo($id)
    {
        $order = Placeorder::find($id);
        return view('admin_layout.pages.dashboard.order.orderinfo', compact('order'));
    }

    public function orderAction(Request $request)
    {
        // return $request;
        $order = Placeorder::find($request->id);


        if ($request->status == 'accepted') {
            $order->update([
                'starting_date' => $request->s_date,
                'ending_date' => $request->e_date,
                'status' => $request->status,
            ]);

            return redirect()->route('admin.order.accepted')->withSuccess('Order status is updated to Accepted');
        } else {
            $order->update([
                'status' => $request->status,
            ]);

            return redirect()->route('admin.order.rejected')->withError('Order is rejected');
        }
    }

    public function orderAccepted(Request $request)
    {
        if (isset($request->id)) {
            $orders = Placeorder::where([['status', 'accepted'], ['user_id', $request->id]])->orderBy('id', 'DESC')->get();
        } else {
            $orders = Placeorder::where('status', 'accepted')->orderBy('id', 'DESC')->get();
        }

        return view('admin_layout.pages.dashboard.order.accepted_order', compact('orders'));
    }

    public function orderRejected(Request $request)
    {
        if (isset($request->id)) {
            $orders = Placeorder::where([['status', 'rejected'], ['user_id', $request->id]])->orderBy('id', 'DESC')->get();
        } else {
            $orders = Placeorder::where('status', 'rejected')->orderBy('id', 'DESC')->get();
        }

        return view('admin_layout.pages.dashboard.order.rejected_order', compact('orders'));
    }

    public function orderProcess(Request $request)
    {
        if (isset($request->id)) {
            $orders = Placeorder::where([['status', 'processing'], ['user_id', $request->id]])->orderBy('id', 'DESC')->get();
        } else {
            $orders = Placeorder::where('status', 'processing')->orderBy('id', 'DESC')->get();
        }

        return view('admin_layout.pages.dashboard.order.processing_order', compact('orders'));
    }

    public function orderQC(Request $request)
    {
        if (isset($request->id)) {
            $orders = Placeorder::where([['status', 'QC'], ['user_id', $request->id]])->orderBy('id', 'DESC')->get();
        } else {
            $orders = Placeorder::where('status', 'QC')->orderBy('id', 'DESC')->get();
        }

        return view('admin_layout.pages.dashboard.order.qc_order', compact('orders'));
    }

    public function orderCompleted(Request $request)
    {
        if (isset($request->id)) {
            $orders = Placeorder::where([['status', 'completed'], ['user_id', $request->id]])->orderBy('id', 'DESC')->get();
        } else {
            $orders = Placeorder::where('status', 'completed')->orderBy('id', 'DESC')->get();
        }

        return view('admin_layout.pages.dashboard.order.completed_order', compact('orders'));
    }

    public function orderStatusUpdate(Request $request)
    {
        $order = Placeorder::findOrFail($request->id);

        $order->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.order.info', ['id' => $order->id])->withSuccess('Order status is update');
    }

    public function linkUpdate(Request $request)
    {
        // return $request->email;
        $emails = explode(',', $request->email);
        $order = Placeorder::findOrFail($request->id);

        $url = $request->url;

        $mailData = [
            'subject' => 'Order Completed',
            'message' => 'Dear ' . $order->user->name . ', You have a order on ' . $order->created_at . '. We have completed the order and uploaded the files in a cloud.',
            'url' => $url,
        ];


        try {
            foreach ($emails as $email) {
                Mail::to($email)->send(new InvoiceMail($mailData));
            }
    
            if (isset($request->me)) {
                Mail::to('photodesignexpertbd@gmail.com')->send(new InvoiceMail($mailData));
            }
    
            $order->mailsent = 1;
            $order->save();
    
            return redirect()->route('admin.order.info', ['id' => $order->id])->withSuccess('Mail is sent');
    
        } catch(Exception $e) {
            //return $e;
            return back()->withError('Somthing went wrong');
        }

        
        // Mail::to($invoice->user->email)->send( new InvoiceMail($mailData) );
    }
    //order management//


    //user management//
    public function users()
    {
        $all_users = User::orderBy('id', 'desc')->get();

        $users = [];
        foreach ($all_users as $user) {
            if (!$user->hasRole('admin')) {
                array_push($users, $user);
            }
        }

        return view('admin_layout.pages.dashboard.user.index', compact('users'));
    }

    public function userInfo($id)
    {
        $user = User::findOrFail($id);
        // $referrals = User::where('referred_by', $user->affiliate_id)->get();
        $new_orders = Placeorder::where('user_id', $user->id)->where('status', 'new')->orderBy('id', 'DESC')->get();
        $accepted_orders = Placeorder::where('user_id', $user->id)->where('status', 'accepted')->orderBy('id', 'DESC')->get();
        $rejected_orders = Placeorder::where('user_id', $user->id)->where('status', 'rejected')->orderBy('id', 'DESC')->get();
        $processing_orders = Placeorder::where('user_id', $user->id)->where('status', 'processing')->orderBy('id', 'DESC')->get();
        $qc_orders = Placeorder::where('user_id', $user->id)->where('status', 'QC')->orderBy('id', 'DESC')->get();
        $completed_orders = Placeorder::where('user_id', $user->id)->where('status', 'completed')->orderBy('id', 'DESC')->get();

        return view('admin_layout.pages.dashboard.user.info', compact(
            'user',
            'new_orders',
            'accepted_orders',
            'rejected_orders',
            'processing_orders',
            'qc_orders',
            'completed_orders',
            // 'referrals',
        ));
    }
    //user management//

    //invoice management//
    public function newInvoice()
    {
        $all_users = User::orderBy('id', 'desc')->get();
        $last = Invoice::orderBy('id', 'DESC')->first();

        if (Invoice::all()->count() == 0)
            $invoice_number = 100001;
        else
            $invoice_number = $last->invoice_number + 1;

        $invoices = Invoice::all();

        $users = [];
        foreach ($all_users as $user) {
            if (!$user->hasRole('admin')) {
                array_push($users, $user);
            }
        }
        return view('admin_layout.pages.dashboard.invoice.new', compact('users', 'invoice_number', 'invoices'));
    }

    public function test(Request $request)
    {
        $user = User::findOrFail($request->id);
        $profile = $user->profile;
        $invoices = Invoice::where([['user_id', $user->id], ['status', 'paid']])->get();
        $orders = Placeorder::where([['user_id', $request->id], ['status', 'completed']])->orderBy('id', 'DESC')->get();
        $order_services = [];
        $payment_amount = 0;
        foreach ($orders as $order) {
            $services = [];
            foreach (unserialize($order->services) as $item) {
                array_push($services, $item);
            }
            array_push($order_services, $services);
        }

        foreach ($invoices as $invoice)
        {
            $am = $invoice->payment->amount;
            $payment_amount += (int)$am;
        }

        // $payment_amount = 1200;

        return response(json_encode(['orders' => $orders, 'order_services' => $order_services, 'payment_amount' => $payment_amount, 'profile' => $profile]));
    }

    public function testFilter(Request $request)
    {
        // return $request;
        $orders = Placeorder::where([['user_id', $request->id], ['status', 'completed']])->orderBy('id', 'DESC')->get();
        $filter_orders = [];
        $order_services = [];
        foreach ($orders as $order) {
            $year = Carbon::parse($order->created_at)->year;
            $month = Carbon::parse($order->created_at)->month;

            $services = [];
            foreach (unserialize($order->services) as $item) {
                array_push($services, $item);
            }
            array_push($order_services, $services);

            if ($month == $request->month && $year == $request->year) {
                array_push($filter_orders, $order);
            }
        }

        return response(json_encode(['filter_orders' => $filter_orders, 'order_services' => $order_services]));
    }

    public function testGet(Request $request)
    {
        $orders = [];
        $order_services = [];
        for ($i = 0; $i < count($request->id); $i++) {
            $id = $request->id[$i];
            $order = Placeorder::findOrFail($id);
            array_push($orders, $order);
        }

        for ($i = 0; $i < count($orders); $i++) {
            $services = [];
            foreach (unserialize($order->services) as $item) {
                array_push($services, $item);
            }
            array_push($order_services, $services);
        }

        return response(json_encode(['orders' => $orders, 'order_services' => $order_services]));
    }

    public function invoice(Request $request)
    {
        // return $request;
        $user = User::findOrFail($request->user_id);
        $order_id = Placeorder::where('user_id', $user->id)->latest()->first()['id'];
        $invoice_number = $request->invoice_no;
        $invoice_date = $request->invoice_date;
        $due_date = $request->due_date;
        $due_amount = $request->due_amount;
        $total_amount = $request->total_amount;
        $currency = $request->currency;
        $note = $request->note;
        $gift = $request->gift;
        $orders = array_chunk($request->inputs, 5);

        $get_invoice = Invoice::create([
            'user_id' => $request->user_id,
            'invoice_number' => $invoice_number,
            'invoice_date' => $request->invoice_date,
            'due_date' => $request->due_date,
            'due_amount' => $request->due_amount,
            'total_amount' => $request->total_amount,
            'currency' => $request->currency,
            'note' => $request->note,
            'gift' => $request->gift,
        ]);

        foreach ($orders as $order) {
            InvoiceOrder::create([
                'invoice_id' => $get_invoice->id,
                'order_id' => $order_id,
                'title' => $order[0],
                'description' => $order[1],
                'quantity' => $order[2],
                'price' => $order[3],
                'amount' => $order[4],
            ]);
        }

        $invoice = Invoice::findOrFail($get_invoice->id);
        $invoice_orders = InvoiceOrder::where('invoice_id', $get_invoice->id)->get();
        $user = User::findOrFail($get_invoice->user_id);
        $data = [
            'user' => $user,
            'invoice_number' => $invoice->invoice_number,
            'invoice_date' => $invoice->invoice_date,
            'due_date' => $invoice->due_date,
            'due_amount' => $invoice->due_amount,
            'total_amount' => $invoice->total_amount,
            'currency' => $invoice->currency,
            'invoice_orders' => $invoice_orders,
            'note' => $invoice->note,
        ];
        $pdf = PDF::loadView('admin_layout.pages.dashboard.invoice.invoice', $data);
        $content = $pdf->download()->getOriginalContent();
        $name = $invoice->id . '.pdf';
        Storage::put('public/' . $name, $content);

        $invoice->pdf = $name;
        $invoice->save();

        $profile = $user->profile;
        $old_gift_amount = $profile->gift;
        $new_gift_amount = $old_gift_amount - $gift;
        $profile->gift = $new_gift_amount;
        $profile->save();

        return view('admin_layout.pages.dashboard.invoice.getInvoice', compact('invoice', 'invoice_orders'));
    }

    public function pdf(Request $request)
    {
        // return view('admin_layout.pages.dashboard.invoice.invoice');
        $user = User::findOrFail($request->user_id);
        $data = [
            'user' => $user,
            'invoice_number' => $request->invoice_number,
            'invoice_date' => $request->invoice_date,
            'due_date' => $request->due_date,
            'due_amount' => $request->due_amount,
            'total_amount' => $request->total_amount,
            'currency' => $request->currency,
            'orders' => $request->orders,
            'note' => $request->note,
        ];
        $pdf = PDF::loadView('admin_layout.pages.dashboard.invoice.invoice', $data);
        return $pdf->download($user->name . '.pdf');
    }

    public function allInvoice()
    {
        $draft_invoices = Invoice::where('status', 'draft')->orderBy('id', 'DESC')->get();

        foreach ($draft_invoices as $invoice) {
            $due_day = Carbon::parse($invoice->due_date)->day;
            $due_month = Carbon::parse($invoice->due_date)->month;
            $current_day = Carbon::now()->day;
            $current_month = Carbon::now()->month;

            if ($due_day < $current_day && $due_month <= $current_month) {
                $invoice->status = 'overdue';
                $invoice->save();

                $location = 'http://photodesignexpert.com/storage/app/public/' . $invoice->pdf;

                $mailData = [
                    'subject' => 'Invoice of ' . $invoice->invoice_date,
                    'message' => 'Dear ' . $invoice->user->name . ', You have a invoice on ' . $invoice->invoice_date . ' & ' . 'due date is ' . $invoice->due_date . ' & total amount is ' . $invoice->total_amount . '. Please pay as soon as you can.',
                    'link' => $location,
                ];

                Mail::to($invoice->user->email)->send(new InvoiceMail($mailData));
            }
        }

        $all_invoices = Invoice::orderBy('id', 'DESC')->get();
        return view('admin_layout.pages.dashboard.invoice.all', compact('all_invoices'));
    }

    public function inewInvoice()
    {
        $new_invoices = Invoice::where('status', 'New')->orderBy('id', 'DESC')->get();
        return view('admin_layout.pages.dashboard.invoice.inew', compact('new_invoices'));
    }

    public function paidInvoice()
    {
        $paid_invoices = Invoice::where('status', 'Paid')->orderBy('id', 'DESC')->get();
        return view('admin_layout.pages.dashboard.invoice.paid', compact('paid_invoices'));
    }

    public function draftInvoice()
    {
        $draft_invoices = Invoice::where('status', 'Draft')->orderBy('id', 'DESC')->get();
        return view('admin_layout.pages.dashboard.invoice.draft', compact('draft_invoices'));
    }

    public function overdueInvoice()
    {
        $draft_invoices = Invoice::where('status', 'draft')->orderBy('id', 'DESC')->get();

        foreach ($draft_invoices as $invoice) {
            $due_day = Carbon::parse($invoice->due_date)->day;
            $due_month = Carbon::parse($invoice->due_date)->month;
            $current_day = Carbon::now()->day;
            $current_month = Carbon::now()->month;

            if ($due_day < $current_day && $due_month <= $current_month) {
                $invoice->status = 'overdue';
                $invoice->save();
            }
        }

        $overdue_invoices = Invoice::where('status', 'Overdue')->orderBy('id', 'DESC')->get();
        return view('admin_layout.pages.dashboard.invoice.overdue', compact('overdue_invoices'));
    }

    public function approveInvoice(Request $request, $id)
    {   
        $string = str_replace("\n", "<br>", $request->message);
        $invoice = Invoice::findOrFail($id);
        $invoice->status = 'Draft';
        $invoice->save();

        $location = 'http://photodesignexpert.com/storage/app/public/' . $invoice->pdf;

        $mailData = [
            'subject' => $request->subject,
            'message' => $string,
            'link' => $location,
        ];

        Mail::to($invoice->user->email)->send(new InvoiceMail($mailData));

        if (isset($request->me)) {
            Mail::to('photodesignexpertbd@gmail.com')->send(new InvoiceMail($mailData));
        }

        return redirect()->route('admin.invoice.all')->withSuccess('Invoice status is Updated');
    }

    public function viewInvoice($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice_orders = InvoiceOrder::where('invoice_id', $id)->get();
        return view('admin_layout.pages.dashboard.invoice.view', compact('invoice', 'invoice_orders'));
    }

    public function editInvoice($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoices = Invoice::where('invoice_number', '!=', $invoice->invoice_number)->get();
        $invoice_orders = InvoiceOrder::where('invoice_id', $id)->get();
        return view('admin_layout.pages.dashboard.invoice.edit', compact('invoice', 'invoice_orders', 'invoices'));
    }

    public function saveInvoice(Request $request, $id)
    { 
        $invoice = Invoice::findOrFail($id);
        $invoice_orders = InvoiceOrder::where('invoice_id', $id)->get();
        $inv_order_id = InvoiceOrder::where('invoice_id', $id)->first()->order_id;

        if(!$inv_order_id)
        {
            $inv_order_id = Placeorder::where('user_id', $invoice->user_id)->first()->id;
        }

        $invoice->invoice_date = $request->invoice_date;
        $invoice->due_date = $request->due_date;
        $invoice->due_amount = $request->due_amount;
        $invoice->total_amount = $request->total_amount;
        $invoice->currency = $request->currency;
        $invoice->invoice_number = $request->numb;
        $invoice->note = $request->note;

        if($request->new_orders[0])
        {
            $new = explode(',',$request->new_orders[0]);
            $len = count($new)/5;
            for ($i=0; $i < $len; $i++) { 
                $invoiceOrder = new InvoiceOrder();
                $invoiceOrder->invoice_id = $id;
                $invoiceOrder->order_id = $inv_order_id;
                $invoiceOrder->title = $new[$i];
                $invoiceOrder->description = $new[$i+1];
                $invoiceOrder->quantity = $new[$i+2];
                $invoiceOrder->price = $new[$i+3];
                $invoiceOrder->amount = $new[$i+4];
                $invoiceOrder->save();
            }
        }

        foreach ($invoice_orders as $order) 
        {
            $id = $order->id;
            if ($request->has('title' . $id) || $request->has('description' . $id) || $request->has('quantity' . $id) || $request->has('price' . $id) || $request->has('amount' . $id)) 
            {
                if($request->has('title' . $id))
                {
                    $title = $request->input('title' . $id);
                    $order->title = $title;
                }
                if ($request->has('description' . $id)) 
                {
                    $description = $request->input('description' . $id);
                    $order->description = $description;
                }
                if ($request->has('quantity' . $id)) 
                {
                    $quantity = $request->input('quantity' . $id);
                    $order->quantity = $quantity;
                }
                if ($request->has('price' . $id)) 
                {
                    $price = $request->input('price' . $id);
                    $order->price = $price;
                }
                if ($request->has('amount' . $id)) 
                {
                    $amount = $request->input('amount' . $id);
                    $order->amount = $amount;
                }

                $order->save();
            }
            else
            {
                $order->delete();
            }
        }

        Storage::delete($invoice->pdf);

        $user = User::findOrFail($invoice->user_id);
        $invoice_orders_new = InvoiceOrder::where('invoice_id', $id)->get();
        $data = [
            'user' => $user,
            'invoice_number' => $invoice->invoice_number,
            'invoice_date' => $invoice->invoice_date,
            'due_date' => $invoice->due_date,
            'due_amount' => $invoice->due_amount,
            'total_amount' => $invoice->total_amount,
            'currency' => $invoice->currency,
            'invoice_orders' => $invoice_orders_new,
            'note' => $invoice->note,
        ];
        $pdf = PDF::loadView('admin_layout.pages.dashboard.invoice.invoice', $data);
        $content = $pdf->download()->getOriginalContent();
        $name = $invoice->id . '.pdf';
        Storage::put('public/' . $name, $content);

        $invoice->pdf = $name;
        $invoice->save();

        return redirect()->route('admin.invoice.view', ['id' => $invoice->id])->withSuccess('Invoice is updated');
    }

    public function emailInvoice(Request $request)
    {
        // return $request;
        $string = str_replace("\n", "<br>", $request->message);
        $invoice = Invoice::findOrFail($request->id);
        $location = 'https://photodesignexpert.com/storage/app/public/' . $invoice->pdf;
        $mailData = [
            'subject' => $request->subject,
            'message' => $string,
            'link' => $location
        ];
        Mail::to($request->email)->send(new InvoiceMail($mailData));
        if (isset($request->me)) {
            Mail::to('photodesignexpertbd@gmail.com')->send(new InvoiceMail($mailData));
        }
        return redirect()->route('admin.invoice.all')->withSuccess('Mail is sent');
    }

    public function paymentInvoice(Request $request)
    {
        // return $request;
        InvoicePayment::create([
            'invoice_id' => $request->id,
            'date' => $request->p_date,
            'amount' => $request->p_amount,
            'method' => $request->p_method,
            'account' => $request->p_account,
            'note' => $request->note,
        ]);

        $invoice = Invoice::findOrFail($request->id);
        if($invoice->status == 'Paid')
        {
            $invoice->due_amount = $invoice->due_amount - $request->p_amount;
        }
        else
        {
            $invoice->status = 'Paid';
            $invoice->due_amount = $invoice->total_amount - $request->p_amount;
        }

        if($request->ref_gift)
        {
            $referrer = $invoice->user->referrer;
            if($referrer->ref_gift == null)
            {
                $referrer->ref_gift = $request->ref_gift;
            }
            else
            {
                $referrer->ref_gift = $referrer->ref_gift + $request->ref_gift;
            }

            $referrer->save();
        }

        $invoice->save();

        $mailData = [
            'subject' => "Payment Added",
            'message' => "Dear " .$invoice->user->name.",<br><br>".$request->p_amount ."$ is received as payment for invoice of number " .$invoice->invoice_number .", and the due amount is " .$invoice->due_amount ."$. <br><br> Thanks."
        ];
        Mail::to($invoice->user->email)->send(new InvoiceMail($mailData));

        return redirect()->route('admin.invoice.all')->withSuccess('Payment is added');
    }

    public function getPdf($id)
    {
        // return $id;
        $invoice = Invoice::findOrFail($id);
        $invoice_orders = InvoiceOrder::where('invoice_id', $id)->get();
        $user = User::where('id', $invoice->user->id)->first();

        $data = [
            'user' => $user,
            'invoice_number' => $invoice->invoice_number,
            'invoice_date' => $invoice->invoice_date,
            'due_date' => $invoice->due_date,
            'due_amount' => $invoice->due_amount,
            'total_amount' => $invoice->total_amount,
            'currency' => $invoice->currency,
            'invoice_orders' => $invoice_orders,
            'note' => $invoice->note,
        ];
        $pdf = PDF::loadView('admin_layout.pages.dashboard.invoice.invoice', $data);
        return $pdf->download($user->name . '.pdf');
    }

    public function deleteInvoice(Request $request)
    {
        $invoice = Invoice::findOrFail($request->id);
        $invoice->delete();
        return redirect()->route('admin.invoice.all')->withError('Invoice is deleted');
    }

    public function printInvoice($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice_orders = InvoiceOrder::where('invoice_id', $id)->get();
        return view('admin_layout.pages.dashboard.invoice.print', compact('invoice', 'invoice_orders'));
    }

    public function gift(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $profile = $user->profile;

        if($profile)
        {
            $profile->gift = $request->gift;
            $profile->is_gifted = 1;
            $profile->save();
        }

        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'gift' => $profile->gift,
        ];

        Mail::to($user->email)->send(new GiftMail($data));
        
        return redirect()->route('admin.user.info', ['id'=>$user->id])->withSuccess($profile->gift . '$ gifted to ' . $user->name . '.');
    }

    public function refTransfer(Request $request)
    {
        // return $request;
        $user = User::findOrFail($request->id);
        $profile = $user->profile;

        if($profile->gift == null)
        {
            $profile->gift = $user->ref_gift;
        }
        else
        {
            $profile->gift = $profile->gift + $user->ref_gift;
        }

        $user->ref_gift = 0;

        $user->save();
        $profile->save();

        return back()->withSuccess('Referral bonus id transferred to the user account successfully');
    }

    public function delete(Request $request)
    {
        $id = $request->id;

        $user = User::findOrFail($id);
        $user->delete();

        return back()->withError('User is deleted successfully');
    }
}
