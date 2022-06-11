<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\DynamicService;
use App\Model\DynamicServiceSection;
use App\Model\DynamicServiceSectionImage;
use App\Model\DynamicServiceSlider;

class DynamicServiceController extends Controller
{
    public function index()
    {
        $services = DynamicService::orderBy('id', 'DESC')->get();
        return view('admin_layout.pages.dashboard.service.index', compact('services'));
    }

    public function add()
    {
        return view('admin_layout.pages.dashboard.service.add');
    }

    public function create(Request $request)
    {
        // return $request;
        $request->validate([
            'slug' => 'unique:dynamic_services'
        ]);

        // service
        $service = new DynamicService();

        $service->name = $request->service_name;
        if($request->has('service_title'))
        {
            $service->title = $request->service_title;
        }
        $service->meta = $request->service_meta;
        $service->slug = $request->slug;
        // if($request->has('service_favicon'))
        // {
        //     $image = $request->file('service_favicon');
        //     $name = rand().'_'.$service->slug.'_favicon'.'.'.$image->getClientOriginalExtension();
        //     $destinationPath = base_path("service/$service->slug/favicon");
        //     $image->move($destinationPath, $name);
        //     $service->favicon = "service/$service->slug/favicon".'/'.$name;
        // }
        $service->save();

        // slider
        $slider = new DynamicServiceSlider();
        $slider->service_id = $service->id;

        if($request->has('slider_image_1'))
        {
            $image = $request->file('slider_image_1');
            $name = rand().'_'.$service->slug.'.'.$image->getClientOriginalExtension();
            $destinationPath = base_path("service/$service->slug/slider_image");
            $image->move($destinationPath, $name);
            $slider->image1 = "service/$service->slug/slider_image".'/'.$name;
        }

        if($request->has('slider_image_2'))
        {
            $image = $request->file('slider_image_2');
            $name = rand().'_'.$service->slug.'.'.$image->getClientOriginalExtension();
            $destinationPath = base_path("service/$service->slug/slider_image");
            $image->move($destinationPath, $name);
            $slider->image2 = "service/$service->slug/slider_image".'/'.$name;
        }

        if($request->has('slider_image_3'))
        {
            $image = $request->file('slider_image_3');
            $name = rand().'_'.$service->slug.'.'.$image->getClientOriginalExtension();
            $destinationPath = base_path("service/$service->slug/slider_image");
            $image->move($destinationPath, $name);
            $slider->image3 = "service/$service->slug/slider_image".'/'.$name;
        }
        $slider->save();

        
        for($x=1; $x<$request->last_section; $x++)
        {
            //section
            if($request->has('section_'.$x.'_title') || $request->has('section_'.$x.'_description'))
            {
                $section = new DynamicServiceSection();
                $section->service_id = $service->id;
            }

            if($request->has('section_'.$x.'_title'))
            {
                $section->title = $request->input('section_'.$x.'_title');
            }

            if($request->has('section_'.$x.'_description'))
            {
                $section->description = $request->input('section_'.$x.'_description');
            }

            if($request->has('section_'.$x.'_video'))
            {
                $section->video = $request->input('section_'.$x.'_video');
            }

            $section->save();

            //section_image
            $section_image = new DynamicServiceSectionImage();
            $section_image->service_id = $service->id;
            $section_image->service_section_id = $section->id;

            if($request->has('section_'.$x.'_image_height'))
            {
                $section_image->height = $request->input('section_'.$x.'_image_height');
            }

            if($request->has('section_'.$x.'_image_width'))
            {
                $section_image->width = $request->input('section_'.$x.'_image_width');
            }

            if($request->has('section_'.$x.'_image_caption'))
            {
                $section_image->caption = $request->input('section_'.$x.'_image_caption');
            }

            if($request->has('section_'.$x.'_image_alt'))
            {
                $section_image->alt_tag = $request->input('section_'.$x.'_image_alt');
            }

            if($request->has('section_'.$x.'_image'))
            {
                $image = $request->file('section_'.$x.'_image');
                $name = rand().'_'.$service->slug.'_section_image'.'.'.$image->getClientOriginalExtension();
                $destinationPath = base_path("service/$service->slug/section_image");
                $image->move($destinationPath, $name);
                $section_image->image = "service/$service->slug/section_image".'/'.$name;
            }

            $section_image->save();
        }

        return redirect()->route('admin.service.index')->withSuccess('Service is created');
    }

    public function edit($id)
    {
        $service = DynamicService::findOrFail($id);
        // return $service->slider;
        return view('admin_layout.pages.dashboard.service.edit', compact('service'));
    }

    public function edit_post(Request $request, $id)
    {
        // return $request;

        $service = DynamicService::findOrFail($id);

        //update service
        $service->name = $request->service_name;
        $service->title = $request->service_title;
        $service->meta = $request->service_meta;
        $service->slug = $request->service_slug;

        //favicon
        if($request->has('service_favicon'))
        {
            //unlink previous file
            $file_path = $service->favicon;
            if(file_exists($file_path))
            {
                unlink($file_path);
            }

            //add new favicon
            $image = $request->file('service_favicon');
            $name = rand().'_'.$service->slug.'_favicon'.'.'.$image->getClientOriginalExtension();
            $destinationPath = base_path("service/$service->slug/favicon");
            $image->move($destinationPath, $name);
            $service->favicon = "service/$service->slug/favicon".'/'.$name;
        }

        $service->save();

        //slider
        $slider_id = $service->slider->id;
        $slider = DynamicServiceSlider::findOrFail($slider_id);
        if($slider)
        {
            if($request->has('slider_image_1'))
            {
                //unlink previous file
                $file_path1 = $slider->image1;
                if(file_exists($file_path1))
                {
                    unlink($file_path1);
                }

                //add-new-file
                $image1 = $request->file('slider_image_1');
                $name1 = rand().'_1'.$service->slug.'.'.$image1->getClientOriginalExtension();
                $destinationPath1 = base_path("service/$service->slug/slider_image");
                $image1->move($destinationPath1, $name1);
                $slider->image1 = "service/$service->slug/slider_image".'/'.$name1;
            }

            if($request->has('slider_image_2'))
            {
                //unlink previous file
                $file_path2 = $slider->image2;
                if(file_exists($file_path2))
                {
                    unlink($file_path2);
                }

                //add-new-file
                $image2 = $request->file('slider_image_2');
                $name2 = rand().'_2'.$service->slug.'.'.$image2->getClientOriginalExtension();
                $destinationPath2 = base_path("service/$service->slug/slider_image");
                $image2->move($destinationPath2, $name2);
                $slider->image2 = "service/$service->slug/slider_image".'/'.$name2;
            }

            if($request->has('slider_image_3'))
            {
                //unlink previous file
                $file_path3 = $slider->image3;
                if(file_exists($file_path3))
                {
                    unlink($file_path3);
                }

                //add-new-file
                $image3 = $request->file('slider_image_3');
                $name3 = rand().'_3'.$service->slug.'.'.$image3->getClientOriginalExtension();
                $destinationPath3 = base_path("service/$service->slug/slider_image");
                $image3->move($destinationPath3, $name3);
                $slider->image3 = "service/$service->slug/slider_image".'/'.$name3;
            }
        } 

        $slider->save();

        foreach($service->sections as $item)
        {
            $id = $item->id;
            $section = DynamicServiceSection::findOrFail($id);
            if($section)
            {
                if(!$request->has('s_'.$id.'_title') && !$request->has('s_'.$id.'_description'))
                {
                    $section->delete();
                }
                else
                {
                    if($request->has('s_'.$id.'_title'))
                    {
                        $section->title = $request->input('s_'.$id.'_title');
                    }

                    if($request->has('s_'.$id.'_description'))
                    {
                        $section->description = $request->input('s_'.$id.'_description');
                    }

                    if($request->has('s_'.$id.'_video'))
                    {
                        $section->video = $request->input('s_'.$id.'_video');
                    }


                    $section->save();


                    $image_id = $section->service_section_image->id;
                    $section_image = DynamicServiceSectionImage::findOrFail($image_id);
                    if($section_image)
                    {
                        if($request->has('s_'.$image_id.'_image_height'))
                        {
                            $section_image->height = $request->input('s_'.$image_id.'_image_height');
                        }
            
                        if($request->has('s_'.$image_id.'_image_width'))
                        {
                            $section_image->width = $request->input('s_'.$image_id.'_image_width');
                        }
            
                        if($request->has('s_'.$image_id.'_image_caption'))
                        {
                            $section_image->caption = $request->input('s_'.$image_id.'_image_caption');
                        }
            
                        if($request->has('s_'.$image_id.'_image_alt'))
                        {
                            $section_image->alt_tag = $request->input('s_'.$image_id.'_image_alt');
                        }
            
                        if($request->has('s_'.$image_id.'_image'))
                        {
                            //unlink previous file
                            $file_path = $section_image->image;
                            if(file_exists($file_path))
                            {
                                unlink($file_path);
                            }

                            //add new file
                            $image = $request->file('s_'.$image_id.'_image');
                            $name = rand().'_'.$service->slug.'_section_image'.'.'.$image->getClientOriginalExtension();
                            $destinationPath = base_path("service/$service->slug/section_image");
                            $image->move($destinationPath, $name);
                            $section_image->image = "service/$service->slug/section_image".'/'.$name;
                        }

                        if($request->input('s_'.$image_id.'_image_remove') == 'Yes')
                        {
                            //unlink previous file
                            $file_path = $section_image->image;
                            if(file_exists($file_path))
                            {
                                unlink($file_path);
                            }

                            $section_image->image = null;
                        }
            
                        $section_image->save();
                    }
                }
            }
        }

        for($x=1; $x<$request->last_section; $x++)
        {
            //section
            if($request->has('section_'.$x.'_title') || $request->has('section_'.$x.'_description'))
            {
                $section_new = new DynamicServiceSection();
                $section_new->service_id = $service->id;

                if($request->has('section_'.$x.'_title'))
                {
                    $section_new->title = $request->input('section_'.$x.'_title');
                }

                if($request->has('section_'.$x.'_description'))
                {
                    $section_new->description = $request->input('section_'.$x.'_description');
                }

                if($request->has('section_'.$x.'_video'))
                {
                    $section_new->video = $request->input('section_'.$x.'_video');
                }

                $section_new->save();

                //section_image
                $section_new_image = new DynamicServiceSectionImage();
                $section_new_image->service_id = $service->id;
                $section_new_image->service_section_id = $section_new->id;

                if($request->has('section_'.$x.'_image_height'))
                {
                    $section_new_image->height = $request->input('section_'.$x.'_image_height');
                }

                if($request->has('section_'.$x.'_image_width'))
                {
                    $section_new_image->width = $request->input('section_'.$x.'_image_width');
                }

                if($request->has('section_'.$x.'_image_caption'))
                {
                    $section_new_image->caption = $request->input('section_'.$x.'_image_caption');
                }

                if($request->has('section_'.$x.'_image_alt'))
                {
                    $section_new_image->alt_tag = $request->input('section_'.$x.'_image_alt');
                }

                if($request->has('section_'.$x.'_image'))
                {
                    $image = $request->file('section_'.$x.'_image');
                    $name = rand().'_'.$service->slug.'_section_image'.'.'.$image->getClientOriginalExtension();
                    $destinationPath = base_path("service/$service->slug/section_image");
                    $image->move($destinationPath, $name);
                    $section_new_image->image = "service/$service->slug/section_image".'/'.$name;
                }

                $section_new_image->save();

            }
        }

        return redirect()->route('admin.service.index')->withSuccess('Service is updated');
    }

    public function isActive(Request $request) 
    {
        $id = $request->id;
        $service = DynamicService::findOrFail($id);

        if ($service->status === 0) {
            $service->status = 1;
            $service->save();
            $status = 1;
        } else {
            $service->status = 0;
            $service->save();
            $status = 0;
        }

        return response(json_encode(['status' => $status]));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $service = DynamicService::findOrFail($id);
        $service->delete();
        return redirect()->route('admin.service.index')->withError('Service is deleted');
    }
}
