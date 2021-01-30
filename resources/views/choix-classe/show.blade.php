@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">


                    <h1>Classe: {{$groupeClasse->nom}}</h1>





                </div>
            </div>
        </div>

        <div class="col-md-8" style="margin-top: 30px;">
            <div class="card">
                <div class="card-header">

                    <h1>Matière:{{$matiere->lintitule}}</h1>

                </div>
            </div>
        </div>

    </div>
</div>
