<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;


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
            $trips = Trip::all();
            return view('mypage',[
                'trips' => $trips,
            ]);
        } else {
            // ログイン中でない
            $trips = Trip::all();
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

        return view('trips.show', [
            'trip' => $trip,
        ]);
    }
    
    public function yourtrips()
    {
        $data = [];
       if (\Auth::check()) { 
       
            $user = \Auth::user();
            
            $trips = $user->trips()->orderBy('created_at', 'desc')->paginate(10);
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
        
        $trip->content = $request->content;
        $trip->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

}

