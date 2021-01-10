<?php

namespace App\Http\Controllers;

use App\Events\StoryCreated;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories=Auth::user()->stories;
        return view('stories.index',compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'title'=>'required',
            'body'=>'required',
            'type'=>'required',
            'status'=>'required',
            'image'=>'file|mimes:jpeg,png'
        ]);
        if(!empty($request->file('name'))) {
            $data['image'] = Str::random(15) . "." . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('images', $data['image']);
        }
        Auth::user()->stories()->create($data)->tags()->attach($request->tags);

        event(new StoryCreated($data['title']));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view',Story::find($id));
        return Story::findOrFail($id)->body;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd(Story::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=$request->validate([
            'title'=>'required',
            'body'=>'required',
            'type'=>'required',
            'status'=>'required',
            'image'=>'file|mimes:jpeg,png'
        ]);
            if(!empty($request->file('name'))){
                $data['image']=Str::random(15).".".$request->file('image')->getClientOriginalExtension();
                $request->file('image')->move('images',$data['image']);
                Story::findOrFail($id)->update(['title'=>$request->title,'body'=>$request->body,'type'=>$request->type,'status'=>$request->status,'slug'=>Str::slug($request->title),'image'=>$data['image']]);
            }

        Story::findOrFail($id)->update(['title'=>$request->title,'body'=>$request->body,'type'=>$request->type,'status'=>$request->status,'slug'=>Str::slug($request->title)]);
        Story::findOrFail($id)->tags()->sync($request->tags);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        Story::findOrFail($request->id)->delete();
        return redirect()->back();
    }
}
