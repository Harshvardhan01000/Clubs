<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Exception;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function UpdataClub(Request $request,$id){
        try{
            Club::find($id)->update($request->all());
            $item = Club::find($id);
            if($request->club_logo){
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

            if($request->club_banner){
                $name = $item->club_banner;
                $image_path = "upload/category/club_logo/$name";
                unlink($image_path);

                $file_club = $request->file('club_banner');
                $ext = $file_club->getClientOriginalExtension();
                $club_banner_name = time().".".$ext;
                $file_club->move('upload/category/club_banner/',$club_banner_name);
                $item->club_logo = $club_banner_name;
                $item->save();
            }
            return response(true);
        }catch(Exception $e){
            return response(false);
        }
    }
}
