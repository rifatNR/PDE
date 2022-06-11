<?php

namespace App\Http\Controllers;

use PDF;
use App\User;
use Mail;
use App\Invoice;
use App\Profile;
use App\InvoiceOrder;
use App\Model\DynamicService;
use App\Model\Placeorder;
use App\Model\Freetrail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\shareReferral;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->has('ref')) {
            session(['referrer' => $request->query('ref')]);
        }
        
        $services = DynamicService::where('status', 1)->orderBy('id', 'DESC')->get();
        // if(Auth::check())
        // {
        //     $user = Auth::user();
        //     if($user->email_verified_at)
        //     {
        //         return view('users.index', compact('services'));
        //     }
        //     else
        //     {
        //         return redirect( route('verification.notice'));
        //     }

        // }
        // else
        // {
            return view('users.index', compact('services'));
        // }
    }
    public function about()
    {
        $services = DynamicService::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('users.about', compact('services'));
    }
    public function faq()
    {
        $services = DynamicService::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('users.faq', compact('services'));
    }
    public function contact()
    {
        $services = DynamicService::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('users.contact', compact('services'));
    }
    public function clippingpath()
    {
        return view('users.clippingpath');
    }
    public function background()
    {
        return view('users.background');
    }
    public function shadow()
    {
        return view('users.shadow');
    }
    public function retouching()
    {
        return view('users.retouching');
    }
    public function masking()
    {
        return view('users.masking');
    }
    public function ecommerce()
    {
        return view('users.ecommerce');
    }
    public function manipulation()
    {
        return view('users.manipulation');
    }
    public function correction()
    {
        return view('users.correction');
    }
    public function jewelary()
    {
        return view('users.jewelary');
    }
    public function privacy()
    {
        $services = DynamicService::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('users.privacy', compact('services'));
    }
    public function conditions()
    {
        $services = DynamicService::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('users.terms_condition', compact('services'));
    }

    public function userDashboard()
    {
        $orders = Placeorder::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();
        $freetrials = Freetrail::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();
        $invoices = Invoice::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();

        $socialShare = \Share::page(
            auth()->user()->referral_link,
            '',
        )
        ->facebook()
        ->twitter()
        ->reddit()
        ->linkedin()
        ->whatsapp()
        ->telegram();

        return view('admin_layout.index', compact('orders', 'invoices', 'freetrials', 'socialShare'));
    }

    public function userProfile()
    {
        return view('users.dashboard.profile.index');
    }

    public function userProfileUpdate(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $profile = Profile::where('user_id', $user->id)->first();
        
        $user->update([
            'name' => $request->name,
            'company' => $request->c_name,
            'phone' => $request->m_number,
            'country' => $request->country,
        ]);

        $profile->update([
            'address' => $request->address,
            'state' => $request->state,
            'zip_code' => $request->zip,
            'city' => $request->city,
        ]);

        return redirect()->route('user.dashboard.profile')->withSucces('Profile is updated successfully');
    }

    public function userProfileImageUpdate(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $profile = Profile::where('user_id', $user->id)->first();

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  
     
        $request->image->move(base_path('profile_image'), $imageName);

        $profile->update([
            'pro_image' => $imageName,
        ]);

        return redirect()->route('user.dashboard.profile')->withSuccess('Profile picture updated Successfully!');

    }

    public function userOrderAll()
    {
        $user = auth()->user();
        $orders = Placeorder::where('user_id', $user->id)->orderBy('id', 'DESC')->get();
        return view('users.dashboard.orders.all', compact('orders'));
    }

    public function userOrderNew()
    {
        $user = auth()->user();
        $orders = Placeorder::where('user_id', $user->id)->where('status', 'new')->orderBy('id', 'DESC')->get();
        return view('users.dashboard.orders.new', compact('orders'));
    }

    public function userOrderAccepted()
    {
        $user = auth()->user();
        $orders = Placeorder::where('user_id', $user->id)->where('status', 'accepted')->orderBy('id', 'DESC')->get();
        return view('users.dashboard.orders.accepted', compact('orders'));
    }

    public function userOrderRejected()
    {
        $user = auth()->user();
        $orders = Placeorder::where('user_id', $user->id)->where('status', 'rejected')->orderBy('id', 'DESC')->get();
        return view('users.dashboard.orders.reject', compact('orders'));
    }

    public function userOrderProcess()
    {
        $user = auth()->user();
        $orders = Placeorder::where('user_id', $user->id)->where('status', 'processing')->orderBy('id', 'DESC')->get();
        return view('users.dashboard.orders.processing', compact('orders'));
    }

    public function userOrderQc()
    {
        $user = auth()->user();
        $orders = Placeorder::where('user_id', $user->id)->where('status', 'QC')->orderBy('id', 'DESC')->get();
        return view('users.dashboard.orders.qc', compact('orders'));
    }

    public function userOrderCompleted()
    {
        $user = auth()->user();
        $orders = Placeorder::where('user_id', $user->id)->where('status', 'completed')->orderBy('id', 'DESC')->get();
        return view('users.dashboard.orders.completed', compact('orders'));
    }

    public function userOrderInfo(Request $request)
    {
        $order = Placeorder::findOrFail($request->id);
        return view('users.dashboard.orders.info', compact('order'));
    }

    // Invoice
    public function allInvoice()
    {
        $all_invoices = Invoice::where([['user_id', auth()->user()->id], ['status', '!=', 'new']])->orderBy('id', 'DESC')->get();
        return view('users.dashboard.invoice.all', compact('all_invoices'));
    }

    public function newInvoice()
    {
        $new_invoices = Invoice::where('user_id', auth()->user()->id)->where('status', 'New')->orderBy('id', 'DESC')->get();
        return view('users.dashboard.invoice.new', compact('new_invoices'));
    }

    public function paidInvoice()
    {
        $paid_invoices = Invoice::where('user_id', auth()->user()->id)->where('status', 'Paid')->orderBy('id', 'DESC')->get();
        return view('users.dashboard.invoice.paid', compact('paid_invoices'));
    }

    public function unpaidInvoice()
    {
        $unpaid_invoices = Invoice::where('user_id', auth()->user()->id)->where('status', 'Draft')->orderBy('id', 'DESC')->get();
        return view('users.dashboard.invoice.unpaid', compact('unpaid_invoices'));
    }

    public function overdueInvoice()
    {
        $overdue_invoices = Invoice::where('user_id', auth()->user()->id)->where('status', 'Overdue')->orderBy('id', 'DESC')->get();
        return view('users.dashboard.invoice.overdue', compact('overdue_invoices'));
    }

    public function viewInvoice($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice_orders = InvoiceOrder::where('invoice_id', $id)->get();
        return view('users.dashboard.invoice.view', compact('invoice', 'invoice_orders'));
    }

    public function pdfInvoice($id)
    {
        // return $id;
        $invoice = Invoice::findOrFail($id);
        $invoice_orders = InvoiceOrder::where('invoice_id', $id)->get();
        $user = User::where('id', $invoice->user->id)->first();

        $data = [
            'user' => $user,
            'invoice_number' => $invoice->id,
            'invoice_date' => $invoice->invoice_date,
            'due_date' => $invoice->due_date,
            'due_amount' => $invoice->due_amount,
            'total_amount' => $invoice->total_amount,
            'invoice_orders' => $invoice_orders,
            'note' => $invoice->note,
            'currency' => $invoice->currency,
        ];
        $pdf = PDF::loadView('users.dashboard.invoice.pdf', $data);  
        return $pdf->download($user->name.'.pdf');
    }

    public function printInvoice($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice_orders = InvoiceOrder::where('invoice_id', $id)->get();
        return view('users.dashboard.invoice.print', compact('invoice', 'invoice_orders'));
    }
    // Invoice

    public function service($slug)
    {
        // return $slug;
        $services = DynamicService::where('status', 1)->orderBy('id', 'DESC')->get();
        $service = DynamicService::where('slug', $slug)->first();
        return view('users.services', compact('services', 'service'));
    }

    public function userFree($status)
    {
        // return $status;
        if($status == 'all')
        {
            $freetrail = Freetrail::orderBy('id', 'DESC')->where('user_id', auth()->user()->id)->get();
            $filter = 'All';
        }
        if($status == 'new')
        {
            $freetrail = Freetrail::where([['status', 'new'], ['user_id', auth()->user()->id]])->orderBy('id', 'DESC')->get();
            $filter = 'New';
        }
        if($status == 'accepted')
        {
            $freetrail = Freetrail::where([['status', 'accepted'], ['user_id', auth()->user()->id]])->orderBy('id', 'DESC')->get();
            $filter = 'Accepted';
        }
        if($status == 'rejected')
        {
            $freetrail = Freetrail::where([['status', 'rejected'], ['user_id', auth()->user()->id]])->orderBy('id', 'DESC')->get();
            $filter = 'Rejected';
        }
        if($status == 'processing')
        {
            $freetrail = Freetrail::where([['status', 'processing'], ['user_id', auth()->user()->id]])->orderBy('id', 'DESC')->get();
            $filter = 'Processing';
        }
        if($status == 'qc')
        {
            $freetrail = Freetrail::where([['status', 'qc'], ['user_id', auth()->user()->id]])->orderBy('id', 'DESC')->get();
            $filter = 'QC';
        }
        if($status == 'completed')
        {
            $freetrail = Freetrail::where([['status', 'completed'], ['user_id', auth()->user()->id]])->orderBy('id', 'DESC')->get();
            $filter = 'Completed';
        }
        return view('users.dashboard.free.index', compact('freetrail', 'filter'));
    }

    public function userFreeInfo($id)
    {
        // return $id;
        $order = Freetrail::findOrFail($id);
        return view('users.dashboard.free.info', compact('order'));

    }

    public function emailReferral(Request $request)
    {
        // return $request;
        $mail = $request->email;
        $user = auth()->user();

        $arr = [
            'name' => $user->name,
            'email' => $user->email,
            'url' => $user->referral_link,
        ]; 

        Mail::to($mail)->send(new shareReferral($arr));

        return back()->withSuccess('Your referral link is shared via mail');
    }

}
