<?php

namespace App\Http\Controllers;
use App\Eleve;
use App\Groupe;
use App\Matiere;
use App\Professeur;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;



class GroupeController extends Controller
{
    public function __construct()
      {
         $this->middleware('auth');
      }


      public function create(){


        return view('choix-classe.create');

    }



    public function store(/*Request $request, Matiere $matiere, $idutilisateur*/){


        //$profId = Professeur::find($idutilisateur);

        /*
        $groupeClasse = new Groupe;
        $groupeClasse->nom = $request->nom;
        $groupeClasse->acronyme = $request->acronyme;

        $matiere = new Matiere;
        $matiere->lintitule = $request->lintitule;
        $matiere->profMatiere()->associate($profId);
        $matiere->save();


        $groupeClasse->save();

        $groupeClasse = auth()->user()->professeur()->attach($profId);
        */

        $data = request()->validate([

            'nom'=>'required',
            'acronyme'=>'required',
        ]);
        $groupeClasse =auth()->user()->groupe()->create($data);

        $data = request()->validate([

            'lintitule'=>'required',
        ]);
        $matiere =auth()->user()->matiere()->create($data);




        return view('choix-classe.show', compact('groupeClasse', 'matiere'));

    }



    public function show(Groupe $groupeClasse ){


        $groupeClasse = Groupe::all();

        $matiere = Matiere::all();


        return view('choix-classe.show', compact('groupeClasse','matiere'));
    }











}
