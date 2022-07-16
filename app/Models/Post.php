<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Comment;
use App\Models\categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
 

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'titre',
        'contenu',
        'dateCreation',
        'categorie_id',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function categorie(){
        return $this -> belongsTo(Categorie::class); 
    }
    public function comments(){
        return $this -> hasMany(Comment::class);    
    } 
    public function image()
    {
        return $this->hasOne(Image::class);
    }
}
