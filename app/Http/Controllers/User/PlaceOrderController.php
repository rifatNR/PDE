<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\PlaceOrderMail;
use App\Model\Placeorder;
use App\Model\PlaceOrderImage;
use Carbon\Carbon;
use App\Model\DynamicService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use File;

class PlaceOrderController extends Controller
{
    //
    public function index()
    {
        $services = DynamicService::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('users.place_order', compact('services'));
    }
    public function postorder(Request $request)
    {
//        return count($request->document);
        // return implode(', ', $request->image_format);

        $user = Auth::user();
        $request->validate([
//            'name' => 'required',
//            'email' => 'required',
            'phone' => 'required',
            // 'website' => 'required',
            'country' => 'required',
            'image_format' => 'required',
            'backgroundchoice' => 'required',
//            'image_url' => 'required',
            'delivery_time' => 'required',
            'quantity' => 'required',
            // 'instruction' => 'required',
        ]);
        $service = [];
        if(isset($request->clipping))
        {
            //$clipping = $request->clipping;
            array_push($service, $request->clipping);
        }
        if(isset($request->background))
        {
           // $background = $request->background;
            array_push($service, $request->background);
        }
        if(isset($request->masking))
        {
            //$masking = $request->masking;
            array_push($service, $request->masking);
        }
        if(isset($request->retouch))
        {
           // $retouch = $request->retouch;
            array_push($service, $request->retouch);
        }
        if(isset($request->shadow))
        {
            //$shadow = $request->shadow;
            array_push($service, $request->shadow);
        }
        if(isset($request->manipulation))
        {
            //$manipulation = $request->manipulation;
            array_push($service, $request->manipulation);
        }
        if(isset($request->color))
        {
            //$color = $request->color;
            array_push($service, $request->color);
        }
        if(isset($request->vector))
        {
            //$vector = $request->vector;
            array_push($service, $request->vector);
        }
        if(isset($request->restoration))
        {
            //$restoration = $request->restoration;
            array_push($service, $request->restoration);
        }
        if(isset($request->others))
        {
            //$others = $request->others;
            array_push($service, $request->others);
        }

        $name = $user->name;
        $email = $user->email;
        $phone = $request->phone;
        $website = $request->website;
        $country = $request->country;
        $image_format = implode(', ', $request->image_format);
        $background = implode(', ', $request->backgroundchoice);
        $image_url = $request->image_url;
        $delivery_time = $request->delivery_time;
        $quantity = $request->quantity;
        $instruction = $request->instruction;
        $seri_service = serialize($service);
//      re$un_service = unserialize($seri_service);
        $placeorder = new Placeorder();

        $placeorder->user_id = $user->id;
        $placeorder->phone = $phone;
        $placeorder->website = $website;
        $placeorder->country = $country;
        $placeorder->image_format = $image_format;
        $placeorder->backgroundchoice = $background;
        $placeorder->image_url = $image_url;
        $placeorder->delivery_time = $delivery_time;
        $placeorder->quantity = $quantity;
        $placeorder->instruction = $instruction;
        $placeorder->services = $seri_service;

        $placeorder->save();

        $data = [
            'name'=>$name,
            'order_id' => $placeorder->id,
            'email'=>$email,
            'phone'=>$phone,
            'website'=>$website,
            'service'=>$service,
            'country'=>$country,
            'image_format'=>$image_format,
            'background'=>$background,
            'image_url'=>$image_url,
            'delivery_time'=>$delivery_time,
            'quantity'=>$quantity,
            'instruction'=>$instruction,
        ];


        if(empty($request->document) != 1 )
        {
            for ($i=0; $i<count($request->document);$i++)
            {
                $file =$request->document[$i];
                $file1 = "images/$file";
                $date = Carbon::today()->toDateString();
                $id = $placeorder->id;
                $path = "place_order/$date/$id/";
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                    copy($file1,"$path/$file");
                }
                else
                {
                    copy($file1,"$path/$file");
                }
                $placeimage= new PlaceOrderImage();
                $placeimage->placeorder_id = $placeorder->id;
                $placeimage->images = $request->document[$i];
                $placeimage->save();
                $droppath=base_path('images' . "\/").$file;
                if (file_exists($droppath)) {
                    unlink($droppath);
                }
            }
        }
        
        Mail::to('info@photodesignexpert.com')->send( new PlaceOrderMail($data));
        // Mail::to('nissongo.rajputro@gmail.com')->send( new PlaceOrderMail($data));

        return back()->withSuccess('Your order has been placed. Thank you!');
    }

    public function dropimage(Request $request)
    {
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $file->move(base_path('images'),$fileName);

        return response()->json(['success'=>$fileName]);
    }
    
    public function dropimagedelete(Request $request)
    {
        $filename =  $request->get('filename');
//        Photo::where('photo_name',$filename)->delete();
        $path=base_path('images' . "\/").$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }
}
