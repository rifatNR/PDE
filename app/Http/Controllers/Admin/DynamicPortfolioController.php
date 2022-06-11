<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\DynamicService;
use App\Model\DynamicPortfolio;
use Illuminate\Http\Request;

class DynamicPortfolioController extends Controller
{
    public function index()
    {
        $portfolios = DynamicPortfolio::orderBy('id', 'DESC')->get();
        return view('admin_layout.pages.dashboard.portfolio.index', compact('portfolios'));
    }

    public function findServices()
    {
        $services = DynamicService::where('status', 1)->orderBy('id', 'DESC')->get();
        return $services;
    }

    public function imageAdd(Request $request)
    {
        $request->validate([
            'service' => 'required',
            'image1' => 'required|image',
            'image2' => 'required|image'
        ]);

        $service = DynamicService::findOrFail($request->service);
        $portfolio = new DynamicPortfolio();

        $portfolio->service_id = $request->service;

        if($request->has('image1'))
        {
            $image = $request->file('image1');
            $name = rand().'_'.$service->slug.'.'.$image->getClientOriginalExtension();
            $destinationPath = base_path("portfolio/$service->slug");
            $image->move($destinationPath, $name);
            $portfolio->image1 = "portfolio/$service->slug".'/'.$name;
        }

        if($request->has('image2'))
        {
            $image = $request->file('image2');
            $name = rand().'_'.$service->slug.'.'.$image->getClientOriginalExtension();
            $destinationPath = base_path("portfolio/$service->slug");
            $image->move($destinationPath, $name);
            $portfolio->image2 = "portfolio/$service->slug".'/'.$name;
        }

        $portfolio->save();

        return redirect()->route('admin.portfolio.index')->withSuccess('New portfoio image added to '.$service->name);
    }

    public function isActive(Request $request)
    {
        $id = $request->id;
        $portfolio = DynamicPortfolio::findOrFail($id);

        if($portfolio->status == 1)
        {
            $portfolio->status = 0;
            $portfolio->save();
            $status = 0;
        }
        else
        {
            $portfolio->status = 1;
            $portfolio->save();
            $status = 1;
        }

        return $status;
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $portfolio = DynamicPortfolio::findOrFail($id);
        $service = $portfolio->service;
        
        $file_path_1 = $portfolio->image1;
        if(file_exists($file_path_1))
        {
            unlink($file_path_1);
        }

        $file_path_2 = $portfolio->image2;
        if(file_exists($file_path_2))
        {
            unlink($file_path_2);
        }

        $portfolio->delete();
        return redirect()->route('admin.portfolio.index')->withError('Portfolio image of '. $service->name. ' is removed.');
    }
}
