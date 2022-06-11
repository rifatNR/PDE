<?php

namespace App\Http\Controllers\Admin;

use App\Model\DynamicPricing;
use App\Http\Controllers\Controller;
use App\Model\DynamicService;
use Illuminate\Http\Request;

class DynamicPricingController extends Controller
{
    public function index()
    {
        $services = DynamicService::where('status', 1)->get();

        // Check if a service has previous pricing if has remove that service from dropdown
        $length = count($services);

        for ($i=0; $i < $length; $i++) { 
            if($services[$i]->pricing)
            {
                unset($services[$i]);
            }
        }
        // Check if a service has previous pricing, if has remove that service from dropdown

        $prices = DynamicPricing::all();
        return view('admin_layout.pages.dashboard.pricing.index', compact('services', 'prices'));
    }

    public function add(Request $request)
    {
        // return $request;
        if($request->has('service'))
        {
            $request->validate([
                'service' => 'required',
                'image1' => 'required|image',
                'image2' => 'required|image',
                // 'pricing_1_name' => ['required','regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
                'pricing_1_name' => 'required',
                'pricing_1_amount' => 'required',
                // 'pricing_2_name' => ['required','regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
                'pricing_2_name' => 'required',
                'pricing_2_amount' => 'required',
                // 'pricing_3_name' => ['required','regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
                'pricing_3_name' => 'required',
                'pricing_3_amount' => 'required',
            ]);

            $service = DynamicService::findOrFail($request->service);
            $pricing = new DynamicPricing();

            $pricing->service_id = $request->service;

            if($request->has('image1'))
            {
                $image = $request->file('image1');
                $name = rand().'_'.$service->slug.'.'.$image->getClientOriginalExtension();
                $destinationPath = base_path("pricing/$service->slug");
                $image->move($destinationPath, $name);
                $pricing->image1 = "pricing/$service->slug".'/'.$name;
            }

            if($request->has('image2'))
            {
                $image = $request->file('image2');
                $name = rand().'_'.$service->slug.'.'.$image->getClientOriginalExtension();
                $destinationPath = base_path("pricing/$service->slug");
                $image->move($destinationPath, $name);
                $pricing->image2 = "pricing/$service->slug".'/'.$name;
            }

            $pricing->pricing_1_name = $request->pricing_1_name;
            $pricing->pricing_1_amount = $request->pricing_1_amount;
            $pricing->pricing_2_name = $request->pricing_2_name;
            $pricing->pricing_2_amount = $request->pricing_2_amount;
            $pricing->pricing_3_name = $request->pricing_3_name;
            $pricing->pricing_3_amount = $request->pricing_3_amount;

            $pricing->save();

            return redirect()->route('admin.pricing.index')->withSuccess('Pricing for ' . $service->name . ' is added');
        }

        if($request->has('pricing_name'))
        {
            $request->validate([
                'pricing_name' => 'required',
                'image1' => 'required|image',
                'image2' => 'required|image',
                // 'pricing_1_name' => ['required','regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
                'pricing_1_name' => 'required',
                'pricing_1_amount' => 'required',
                // 'pricing_2_name' => ['required','regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
                'pricing_2_name' => 'required',
                'pricing_2_amount' => 'required',
                // 'pricing_3_name' => ['required','regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
                'pricing_3_name' => 'required',
                'pricing_3_amount' => 'required',
            ]);

            // $service = DynamicService::findOrFail($request->service);
            $pricing = new DynamicPricing();

            $name = $request->pricing_name;
            $pricing->name = $name;
            $slug = str_replace(' ', '_', $name);

            if($request->has('image1'))
            {
                $image = $request->file('image1');
                $name = rand().'_'.$slug.'.'.$image->getClientOriginalExtension();
                $destinationPath = base_path("pricing/$slug");
                $image->move($destinationPath, $name);
                $pricing->image1 = "pricing/$slug".'/'.$name;
            }

            if($request->has('image2'))
            {
                $image = $request->file('image2');
                $name = rand().'_'.$slug.'.'.$image->getClientOriginalExtension();
                $destinationPath = base_path("pricing/$slug");
                $image->move($destinationPath, $name);
                $pricing->image2 = "pricing/$slug".'/'.$name;
            }

            $pricing->pricing_1_name = $request->pricing_1_name;
            $pricing->pricing_1_amount = $request->pricing_1_amount;
            $pricing->pricing_2_name = $request->pricing_2_name;
            $pricing->pricing_2_amount = $request->pricing_2_amount;
            $pricing->pricing_3_name = $request->pricing_3_name;
            $pricing->pricing_3_amount = $request->pricing_3_amount;

            $pricing->save();

            return redirect()->route('admin.pricing.index')->withSuccess($pricing->name . ' pricing is added');
        }
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $pricing = DynamicPricing::findOrFail($id);

        if($request->has('pricing_name'))
        {
            $pname = $request->pricing_name;
            $pricing->name = $pname;
            $slug = str_replace(' ', '_', $pname);

            if($request->has('image1'))
            {
                //unlink previous file
                $file_path = $pricing->image1;
                if(file_exists($file_path))
                {
                    unlink($file_path);
                }

                //add new favicon
                $image = $request->file('image1');
                $name = rand().'_'.$slug.'.'.$image->getClientOriginalExtension();
                $destinationPath = base_path("pricing/". $slug);
                $image->move($destinationPath, $name);
                $pricing->image1 = "pricing/" . $slug .'/'.$name;
            }

            if($request->has('image2'))
            {
                //unlink previous file
                $file_path = $pricing->image2;
                if(file_exists($file_path))
                {
                    unlink($file_path);
                }

                //add new favicon
                $image = $request->file('image2');
                $name = rand().'_'.$slug.'.'.$image->getClientOriginalExtension();
                $destinationPath = base_path("pricing/" . $slug);
                $image->move($destinationPath, $name);
                $pricing->image2 = "pricing/" . $slug .'/'.$name;
            }

            $pricing->pricing_1_name = $request->pricing_1_name;
            $pricing->pricing_1_amount = $request->pricing_1_amount;
            $pricing->pricing_2_name = $request->pricing_2_name;
            $pricing->pricing_2_amount = $request->pricing_2_amount;
            $pricing->pricing_3_name = $request->pricing_3_name;
            $pricing->pricing_3_amount = $request->pricing_3_amount;

            $pricing->save();

            return redirect()->route('admin.pricing.index')->withSuccess('Pricing for ' . $pname . ' is updated');
        }
        else
        {
            if($request->has('image1'))
            {
                //unlink previous file
                $file_path = $pricing->image1;
                if(file_exists($file_path))
                {
                    unlink($file_path);
                }

                //add new favicon
                $image = $request->file('image1');
                $name = rand().'_'.$pricing->service->slug.'.'.$image->getClientOriginalExtension();
                $destinationPath = base_path("pricing/". $pricing->service->slug);
                $image->move($destinationPath, $name);
                $pricing->image1 = "pricing/" . $pricing->service->slug .'/'.$name;
            }

            if($request->has('image2'))
            {
                //unlink previous file
                $file_path = $pricing->image2;
                if(file_exists($file_path))
                {
                    unlink($file_path);
                }

                //add new favicon
                $image = $request->file('image2');
                $name = rand().'_'.$pricing->service->slug.'.'.$image->getClientOriginalExtension();
                $destinationPath = base_path("pricing/" . $pricing->service->slug);
                $image->move($destinationPath, $name);
                $pricing->image2 = "pricing/" . $pricing->service->slug .'/'.$name;
            }

            $pricing->pricing_1_name = $request->pricing_1_name;
            $pricing->pricing_1_amount = $request->pricing_1_amount;
            $pricing->pricing_2_name = $request->pricing_2_name;
            $pricing->pricing_2_amount = $request->pricing_2_amount;
            $pricing->pricing_3_name = $request->pricing_3_name;
            $pricing->pricing_3_amount = $request->pricing_3_amount;

            $pricing->save();

            return redirect()->route('admin.pricing.index')->withSuccess('Pricing for ' . $pricing->service->name . ' is updated');
        }
    }

    public function delete(Request $request)
    {
        // return $request;
        $id = $request->id;
        $price = DynamicPricing::findOrFail($id);
        $service_name = $request->service_name;

        $file_path_1 = $price->image1;
        if(file_exists($file_path_1))
        {
            unlink($file_path_1);
        }

        $file_path_2 = $price->image2;
        if(file_exists($file_path_2))
        {
            unlink($file_path_2);
        }

        $price->delete();

        return redirect()->route('admin.pricing.index')->withSuccess('Pricing for ' . $service_name . ' is deleted');
    }
}
