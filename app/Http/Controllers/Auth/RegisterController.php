<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Professeur;
use App\Eleve;
use App\Providers\RouteServiceProvider;
use App\Utilisateur;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    //redirect after registrer
    protected function redirectTo()
    {

        return '/maclasses/create';
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:utilisateur'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Utilisateur
     * @return \App\Professeur
     * @return \App\Eleve
     */
    protected function create(array $data)
    {
        $user = Utilisateur::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);


        $user->save();

        if(isset($data['professeur'])){
            $roleProf = new Professeur($data);
            $user->professeur()->save($roleProf);
        }elseif(isset($data['eleve'])){
            $roleEleve = new Eleve($data);
            $user->eleve()->save($roleEleve);
        }


       return $user;




    }


}
