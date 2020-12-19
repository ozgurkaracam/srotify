<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\Request;

class StoriesController extends Controller
{
    public function index(){
        $stories=Story::onlyTrashed()->get();
        return view('admin.deletedstories',compact('stories'));
    }

    public function savedeleted($id){
        Story::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('deletedstories');
    }
    public function allstories(){

    }
}
