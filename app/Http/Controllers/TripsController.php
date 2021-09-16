<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use App\User;
use App\Image;
use Illuminate\Support\Facades\Storage;
use App\Rules\SampleRule;


class TripsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function top()
    {
        if(\Auth::check()) {
            // ログイン中
            $trips = Trip::orderBy('id', 'desc')->paginate(8);
            return view('mypage',[
                'trips' => $trips,
                
            ]);
        } else {
            // dd('test1');
            // ログイン中でない
            $trips = Trip::orderBy('id', 'desc')->paginate(8);
            return view('top',[
                'trips' => $trips,
            ]);
        }
    } 
    
    
    public function create()
    {
        $trip = new Trip;

        return view('trips.create', [
            'trip' => $trip,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:20', 
            'content' => 'required|max:5000',
           'image.*' => 'required|max:10240',
           'image' => [new SampleRule]
        ]);

        $trip = new Trip;
        $trip->title = $request->title; 
        $trip->content = $request->content;
        $trip->user_id = \Auth::id();
        $trip->save();
        
        
       foreach($request-> file('image') as $image) {
            $path = Storage::putFile('trip_images', $image, 'public');
            $image = new Image;
            $image->trip_id = $trip->id;
            $image->user_id = \Auth::id();
            $image->image_url = 'https://k43ubucket.s3.ap-northeast-1.amazonaws.com/' . $path;
            $image->path = $path;
            $image->save();

       }
       
        return redirect('/');
        
    }
    
   public function destroy(Request $request,$id)
   
    {   
        $trip = \App\Trip::findOrFail($id);
        
           foreach($trip->images as $image) {
               
               $path = $image->path;
               
               if (\Auth::id() === $image->user_id) {
                 $image->delete();
               }
               
               Storage::disk('s3')->delete($path);
               
           }
        
       
        

        if (\Auth::id() === $trip->user_id) {
            $trip->delete();
        }
        
        

        return redirect('/');
    }
    
    
     public function show($id)
    
    {
        $trip = Trip::findOrFail($id);

        $user_id = \Auth::id();
        
        $trip_images = Image::where('trip_id',$id)->get();
        
         return view('trips.show', [
             'trip' => $trip,
            'trip_images' => $trip_images,
     ]);

    }
    
    public function yourtrips()
    {
        $data = [];
       if (\Auth::check()) { 
       
            $user = \Auth::user();
            
            $trips = $user->trips()->orderBy('created_at', 'desc')->paginate(8);
        }
        
        return view('trips.yourtrips', [
            'user' => $user,
            'trips' => $trips,
        ]);
       
   }
   
   public function edit($id)
    {
        $trip = Trip::findOrFail($id);

        // メッセージ編集ビューでそれを表示
        return view('trips.edit', [
            'trip' => $trip,
        ]);
    }
    
     public function update(Request $request, $id)
    {
        $trip = Trip::findOrFail($id);
        
        $trip->title = $request->title;
        $trip->content = $request->content;
        $trip->save();
        
      
       
        if ($request->hasFile('image')) {
           
           foreach($trip->images as $image) {
               
               $path = $image->path;
               
               if (\Auth::id() === $image->user_id) {
                 $image->delete();
               }
               
               Storage::disk('s3')->delete($path);
               
           }
           
           
          foreach($request-> file('image') as $image) {
            $path = Storage::putFile('trip_images', $image, 'public');
            $image = new Image;
            $image->trip_id = $trip->id;
            $image->user_id = \Auth::id();
            $image->image_url = 'https://k43ubucket.s3.ap-northeast-1.amazonaws.com/' . $path;
            $image->path = $path;
            $image->save();
          
           }
           
        }

       // トップページへリダイレクトさせる
        return redirect('/');
    }
   
    public function favorites()
    {
        
        $user = \Auth::user();
        
        $user->loadRelationshipCounts();
        $favorites = $user->favorites()->paginate(8);
        
        return view('trips.favorites', [
            
            'user' => $user,
            'trips' => $favorites,
        ]);
        
    }
    
}

