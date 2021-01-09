<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Story extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['title','body','type','status','image'];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function setTitleAttribute($value){
        $this->attributes['title']=$value;
        $this->attributes['slug']=Str::slug($value);
    }
    public function getTitleAttribute($value){
        return ucfirst($value);
    }
    public function scopeActive($query){
        return $query->where('status',1)->get();
    }
    public function getImageAttribute($value){
        if($value)
            return 'images/'.$value;
        return 'images/image.jpg';
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,'tags_stories','story_id');
    }
}
