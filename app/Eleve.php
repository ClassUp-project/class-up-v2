<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    protected $fillable = [
        'eleve',
    ];

    protected $guarded = [];

    protected $table = 'eleve';

    public $timestamps = false;

    protected $primaryKey = 'ideleve';




     public function utilisateur()
     {

         return $this->belongsTo(Utilisateur::class);

     }

}
