<?php

namespace App\Http\Controllers;
use App\Eleve;
use App\Groupe;
use App\Matiere;
use App\Professeur;
use App\Utilisateur;
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
        $groupeClasse = Auth::user()->groupe()->create($data);

        $data = request()->validate([

            'lintitule'=>'required',
        ]);
        $matiere = Auth::user()->matiere()->create($data);




        return redirect('/maclasses/'.$groupeClasse->idgroupe)->with(compact('matiere'));

    }



    public function show($idutilisateur ){




        $groupe = auth()->user()->groupe;

        $matiere = auth()->user()->matiere;


        return view('choix-classe.show', compact('groupe','matiere'));
    }











}
