<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Profile;
use App\Models\categorie;
use App\Models\Competence;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'etat',
        'role_id',
        'presentation'
    ];
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
/**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function competences()
    {
        return $this->belongsToMany(Competence::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
