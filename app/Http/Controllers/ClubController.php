<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClubValidationRequest;
use App\Models\Club;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $clubs = Club::get();
        // $clubs = Product::with('club')->get();
        if($request->ajax()){
            $view = View::make('club',compact('clubs'))->render();
            return response($view);
        }else{
            return view('welcome',compact('clubs'));
        }
        
        // return response($data);
        // return view('ClubTable',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('CreateClubForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClubValidationRequest $request)
    {       
            $file = $request->file('club_logo');
            $extention = $file->getClientOriginalExtension();
            $club_logo_name = time().".".$extention;
            $file->move('upload/category/club_logo/',$club_logo_name);

            $file_club = $request->file('club_banner');
            $ext = $file_club->getClientOriginalExtension();
            $club_banner_name = time().".".$ext;
            $file_club->move('upload/category/club_banner/',$club_banner_name);
        Club::create([
            'group_id'=>$request->group_id,
            'business_name'=>$request->business_name,
            'club_number'=>$request->club_number,
            'club_name'=>$request->club_name,
            'club_state'=>$request->club_state,
            'club_description'=>$request->club_description,
            'club_slug'=>$request->club_slug,
            'website_title'=>$request->website_title,
            'website_link'=>$request->website_link,
            'club_logo'=>$club_logo_name,
            'club_banner'=>$club_banner_name
        ]);
        return response(true);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
          $data = Club::find($id);
        return response($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClubValidationRequest $request, string $id)
    {    
        $item = Club::find($id);
        if($request->has('club_logo')){
                $name = $item->club_logo;
                $image_path = "upload/category/club_logo/$name";
                unlink($image_path);

                $file = $request->file('club_logo');
                $extention = $file->getClientOriginalExtension();
                $club_logo_name = time().".".$extention;
                $file->move('upload/category/club_logo/',$club_logo_name);
                $item->club_logo = $club_logo_name;
                $item->save();
        }

        if($request->has('club_banner')){
            $banner_name = $item->club_banner;
            $banner_path = "upload/category/club_logo/$banner_name";
            unlink($banner_path);

            $file_club = $request->file('club_banner');
            $ext = $file_club->getClientOriginalExtension();
            $club_banner_name = time().".".$ext;
            $file_club->move('upload/category/club_banner/',$club_banner_name);
            $item->club_banner = $club_banner_name;
            $item->save();
        }
        Club::find($id)->update([
            'group_id'=>$request->group_id,
            'business_name'=>$request->business_name,
            'club_number'=>$request->club_number,
            'club_name'=>$request->club_name,
            'club_state'=>$request->club_state,
            'club_description'=>$request->club_description,
            'club_slug'=>$request->club_slug,
            'website_title'=>$request->website_title,
            'website_link'=>$request->website_link,
        ]);
        return response('true');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        Product::where('club_id',$id)->delete();
        Club::find($id)->delete();
        return response(true);
    }
}
