<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{

    protected $fillable = [
        'professeur',
    ];

    protected $guarded = [];

    protected $table = 'professeur';

    public $timestamps = false;

    protected $primaryKey = 'idprofesseur';




    public function utilisateur()
    {

        return $this->belongsTo(Utilisateur::class);
    }




}
