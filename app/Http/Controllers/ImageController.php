<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ImageController extends Controller
{
    public function input()
    {
        return view('trips.create');
    }

    public function upload(Request $request)
    {        
        $this->validate($request, [
            'file' => [
               
                'required',
               
                'file',
               
                'image', 
               
                'mimes:jpeg,png',
               
            ]
        ]);
        
        if ($request->file('file')->isValid([])) {
            
            $upload_info = Storage::disk('s3')->putFile('/test', $request->file('file'), 'public');
            
            $path = Storage::disk('s3')->url($upload_info);
    
            $user_id = Auth::id();
           
            $new_image_data = new Image();
            
            $new_image_data->user_id = $user_id;
            
            $new_image_data->trip_id = $trip_id;
           
            $new_image_data->imagr_url = $image_url;
            
            $new_image_data->save();

            return redirect('/');
        }else{
           
            return redirect('/upload/image');
        }
    }
    
    public function output()
    
    {
        $user_id = Auth::id();
        
        $user_images = Image::whereUser_id($user_id)->get();
        return view('trips.show', ['trip_images' => $trip_images]);

    }

}
