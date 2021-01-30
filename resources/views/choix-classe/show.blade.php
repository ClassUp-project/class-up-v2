@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">



                    @foreach($groupeClasse as $groupeClasses)
                    <h1>Classe: {{$groupeClasses->nom}}</h1>
                    @endforeach





                </div>
            </div>
        </div>

        <div class="col-md-8" style="margin-top: 30px;">
            <div class="card">
                <div class="card-header">

                    @foreach($matiere as $matieres)
                    <h1>Matière:{{$matieres->lintitule}}</h1>
                    @endforeach

                
                </div>
            </div>
        </div>

    </div>
    <a href="{{ url('/maclasses/create') }}">
        @csrf
            <button type="submit" class="btn btn-primary">Rajouter une classe et une matière</button>
    </a>
</div>

