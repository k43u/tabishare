<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use App\User;
use App\Image;

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
            $trips = Trip::orderBy('id', 'desc')->paginate(3);

            return view('mypage',[
                'trips' => $trips,
            ]);
        } else {
            // ログイン中でない
            $trips = Trip::orderBy('id', 'desc')->paginate(3);

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
            'title' => 'required|max:50', 
            'content' => 'required|max:5000',
        ]);

        $trip = new Trip;
        $trip->title = $request->title; 
        $trip->content = $request->content;
        $trip->user_id = \Auth::id();
        $trip->save();
        
        // \Auth::user()->trips()->create([
        //     'title' => $request->title,
        //     'content' => $request->content,
        // ]);
        
        return back();
    }
    
    public function destroy($id)
    {
        $trip = \App\Trip::findOrFail($id);

        if (\Auth::id() === $trip->user_id) {
            $trip->delete();
        }

        return redirect('/');
    }
    
    public function show($id)
    {
        $trip = Trip::findOrFail($id);

        $user_id = \Auth::id();
        
        $user_images = Image::whereUser_id($user_id)->get();
         return view('trips.show', [
             'trip' => $trip,
             'user_images' => $user_images,
         ]);

    }
    
    public function yourtrips()
    {
        $data = [];
       if (\Auth::check()) { 
       
            $user = \Auth::user();
            
            $trips = $user->trips()->orderBy('created_at', 'desc')->paginate(2);
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

        // トップページへリダイレクトさせる
        return redirect('/');
    }
   
    public function favorites()
    {
        
        $user = \Auth::user();
        
        $user->loadRelationshipCounts();
        $favorites = $user->favorites()->paginate(2);
        
        return view('trips.favorites', [
            
            'user' => $user,
            'trips' => $favorites,
        ]);
        
    }
    
}

