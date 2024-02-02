<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    public function authors(){
        return $this->belongsTo(Authors::class);
    }

    public function editorials(){
        return $this->belongsTo(Editorials::class);
    }

    public function categories(){
        return $this->belongsToMany(Categories::class);
    }

    public function comments(){
        return $this->belongsTo(Comments::class);
    }
}
