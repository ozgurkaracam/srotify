<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){
        $type=$request->input('type');
        if(in_array($type,['short','long']))
            $stories=Story::where(['status'=>1,'type'=>$type])->orderBy('ID','DESC')->paginate(5);
        else
            $stories=Story::where(['status'=>1])->orderBy('ID','DESC')->paginate(5);
        return view('dashboard',compact('stories'));
    }
}
