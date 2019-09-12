@extends ('modeles/gestionnaire')
    @section('menu')
            <!-- Division pour le sommaire -->
        <div id="menuGauche">
            <div id="infosUtil">
                  
             </div>  
               <ul id="menuList">
                   <li >
                   <!-- ETAPE 2, qui consiste à créer la vue gestionnaire -->
                    <strong>Bonjour {{ $gestionnaire['nom'] . ' ' . $gestionnaire['prenom'] }}</strong>
                   </li>
                  <li>
                  
                  </li>
               
                  <li class="smenu">
                    <a href="{{ route('chemin_selectionMois') }}" title="Valider fiche de frais">Valider fiche de frais</a> <!-- Le titre de la mission -->
                  </li>
                  
               <li class="smenu">
                <a href="{{ route('chemin_deconnexion') }}"" title="Se déconnecter">Déconnexion</a>
                  </li>
                </ul>
               
        </div>
    @endsection          