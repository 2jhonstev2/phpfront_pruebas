<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['title', 'author_id', 'category_id', 'editorial_id', 'year_publication'];

    public function authors(){
        return $this->belongsTo(Authors::class,'author_id');
    }

    public function editorials(){
        return $this->belongsTo(Editorials::class,'editorial_id');
    }

    public function categories(){
        return $this->belongsTo(Categories::class,'category_id');
    }

    public function comments(){
        return $this->belongsTo(Comments::class);
    }
}
