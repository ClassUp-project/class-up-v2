<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'prenom', 'email', 'password',
    ];

    protected $table = 'utilisateur';

    protected $primaryKey = 'idutilisateur';

    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function questionnaires()
    {
        return $this->hasMany(Questionnaire::class);

    }

    public function matiere()
    {
        return $this->hasMany(Matiere::class);

    }


    public function linscription()
    {
        return $this->hasOne(Linscription::class);
    }


    public function professeur()
    {
        return $this->hasone(Professeur::class);
    }

    public function eleve()
    {
        return $this->hasOne(Eleve::class);
    }

    public function groupe()
    {
        return $this->hasMany(Groupe::class);
    }


}
