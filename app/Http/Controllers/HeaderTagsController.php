<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HeaderTags;

class HeaderTagsController extends Controller
{
    public function index()
    {
        $tags = HeaderTags::orderBy('id', 'DESC')->get();
        return view('admin_layout.pages.dashboard.header.index', compact('tags'));
    }

    public function add(Request $request)
    {
        // return $request;

        $header = new HeaderTags();

        $header->name = $request->name;
        $header->desc = $request->desc;
        $header->content = $request->content;

        $header->save();
        return back()->withSuccess('A new header tag is created');
    }

    public function update(Request $request)
    {
        // return $request;

        $id = $request->id;

        $tag = HeaderTags::findOrFail($id);

        $tag->name = $request->name;
        $tag->desc = $request->desc;
        $tag->content = $request->content;

        $tag->save();
        return back()->withSuccess('The header tag is updated');

    }

    public function delete(Request $request)
    {
        // return $request;
        $id = $request->id;

        $tag = HeaderTags::findOrFail($id);

        if($tag)
        {
            $tag->delete();
            return back()->withError('The header tag is Deleted');
        }
        else
        {
            return back()->withError('The header tag is not found');
        }
    }

    public function isActive(Request $request)
    {
        // return $request;
        $id = $request->id;
        $tag = HeaderTags::findOrFail($id);

        if($tag->is_active == 1)
        {
            $tag->is_active = 0;
            $tag->save();
            $status = 0;
        }
        else
        {
            $tag->is_active = 1;
            $tag->save();
            $status = 1;
        }

        return json_encode($status);
    }



}
