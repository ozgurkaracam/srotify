<?php

namespace App\Http\Controllers;

use App\Exports\StoryExport;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Excel;

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
    public function export()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new StoryExport,'users.xlsx');
    }
}
