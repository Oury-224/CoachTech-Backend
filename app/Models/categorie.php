<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\posts;


class categorie extends Model
{
    use HasFactory;
    
    protected $fillable= [
        'nom',
        'date_creation'
    ];

    public function posts()
     {
        return $this->hasMany(Post::class);
    }

}
