<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable=['title'];
    public function stories(){
        return $this->belongsToMany(Story::class,'tags_stories','tag_id');
    }
}
