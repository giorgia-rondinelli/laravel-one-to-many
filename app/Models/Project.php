<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    use HasFactory;
    public function technology(){
        return $this->belongsTo(Technology::class);
    }
    protected $fillable=['title','technology_id','image','slug','languages','status','commits','description'];
}
