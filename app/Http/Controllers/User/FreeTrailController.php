<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\FreeTrailMail;
use App\Mail\PlaceOrderMail;
use App\Model\Freetrail;
use App\Model\DynamicService;
use App\Model\Placeorder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FreeTrailController extends Controller
{

    public function index()
    {
        $services = DynamicService::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('users.free_trail', compact('services'));
    }
    
    public function postfree(Request $request)
    {
        $user = Auth::user();
        $request->validate([

            'phone' => 'required',
            // 'website' => 'required',
            'country' => 'required',
            'image_format' => 'required',
            'backgroundchoice' => 'required',
            'delivery_time' => 'required',
            'pathRadios' => 'required',
            'instruction' => 'required',
        ]);
        $service = [];
        if(isset($request->clipping))
        {
            array_push($service, $request->clipping);
        }
        if(isset($request->background))
        {
            array_push($service, $request->background);
        }
        if(isset($request->masking))
        {
            array_push($service, $request->masking);
        }
        if(isset($request->retouch))
        {
            array_push($service, $request->retouch);
        }
        if(isset($request->shadow))
        {
            array_push($service, $request->shadow);
        }
        if(isset($request->manipulation))
        {
            array_push($service, $request->manipulation);
        }
        if(isset($request->color))
        {
            array_push($service, $request->color);
        }
        if(isset($request->vector))
        {
            array_push($service, $request->vector);
        }
        if(isset($request->restoration))
        {
            array_push($service, $request->restoration);
        }
        if(isset($request->others))
        {
            array_push($service, $request->others);
        }


        $name = $user->name;
        $email = $user->email;
        $phone = $request->phone;
        $website = $request->website;
        $country = $request->country;
        $image_format = implode(', ' ,$request->image_format);
        $background = implode(', ' ,$request->backgroundchoice);
        $delivery_time = $request->delivery_time;
        $path = $request->pathRadios;
        $instruction = $request->instruction;
        $seri_service = serialize($service);

        if($path == 0)
        {
            $pathResponce = 'No';
        }
        else
        {
            $pathResponce = 'Yes';
        }

        $freetrail = new Freetrail();

        $freetrail->user_id = $user->id;
        $freetrail->phone = $phone;
        $freetrail->website = $website;
        $freetrail->country = $country;
        $freetrail->image_format = $image_format;
        $freetrail->backgroundchoice = $background;
        $freetrail->pathneed = $path;
        $freetrail->delivery_time = $delivery_time;
        $freetrail->quantity = 2;
        $freetrail->instruction = $instruction;
        $freetrail->services = $seri_service;
        $date = Carbon::today()->toDateString();

        if($request->has('image1'))
        {
            $image = $request->file('image1');
            $imageName = time().'_image1'.'.'.$image->getClientOriginalExtension();
            $request->image1->move(base_path('free_trail/'.$date.'/'), $imageName);
            $image1 = 'free_trail/'. $date . '/' . $imageName;
            $freetrail->image_1 = $image1;
        }
        if($request->has('image2'))
        {
            $image2 = $request->file('image2');
            $imageName2 = time().'_image2'.'.'.$image2->getClientOriginalExtension();
            $request->image2->move(base_path('free_trail/'.$date.'/'), $imageName2);
            $image3 = 'free_trail/'. $date . '/' . $imageName2;
            $freetrail->image_2 = $image3;
        }
        $freetrail->save();
        $data = [
            'name'=>$name,
            'email'=>$email,
            'phone'=>$phone,
            'website'=>$website,
            'service'=>$service,
            'country'=>$country,
            'image_format'=>$image_format,
            'image1'=>$image1,
            'image2'=>$image3,
            'background'=>$background,
            'delivery_time'=>$delivery_time,
            'path'=>$pathResponce,
            'instruction'=>$instruction,

        ];

        Mail::to('info@photodesignexpert.com')->send( new FreeTrailMail($data));
        // Mail::to('nissongo.rajputro@gmail.com')->send( new FreeTrailMail($data));

        return back()->withSuccess('Your free trial order has been sent. Thank you!');
    }
}
