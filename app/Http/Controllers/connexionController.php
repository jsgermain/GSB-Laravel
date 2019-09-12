<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PdoGsb;

class connexionController extends Controller
{
    function connecter(){
        
        return view('connexion')->with('erreurs',null);
    } 

    function valider(Request $request){
        $login = $request['login'];
        $mdp = $request['mdp'];
        $visiteur = PdoGsb::getInfosVisiteur($login,$mdp);
        $gestionnaire = PdoGsb::getInfosGestionnaire($login,$mdp); // ici la ligne en référence au gestionnaire
        if(!is_array($visiteur) && !is_array($gestionnaire)){ // !is_array($gestionnaire > en référence au gestionnaire 
            $erreurs[] = "Login ou mot de passe incorrect(s)";
            return view('connexion')->with('erreurs',$erreurs);
        }
        else
            if(is_array($visiteur)){
            session(['visiteur' => $visiteur]);
            return view('sommaire')->with('visiteur',session('visiteur'));
        }
            else 
            session(['gestionnaire' => $gestionnaire]);
            return view('sommaireGestionnaire')->with('gestionnaire',session('gestionnaire'));
     
    }


    function deconnecter(){
            session(['visiteur' => null]); // deconnoxion visiteur 
            return redirect()->route('chemin_connexion');
            session(['gestionnaire' => null]); // deconnexion gestionnaire 
            return redirect()->route('chemin_connexion');
           
    }
       
}