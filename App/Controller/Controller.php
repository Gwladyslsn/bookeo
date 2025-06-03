<?php 

namespace App\Controller;

Class Controller
{
  public function route():void
  {
    if (isset($_GET['controller'])){
      switch ($_GET['controller']) {
        case 'page':
          // Charger controller page
          var_dump('On charge PageController');
          break;
        case 'book':
          // Charger controller book
          var_dump('On charge BookController');
          break;
        default:
          // Erreur
          var_dump('Deafult : erreur');
          break;
      }
    } else{
      // Charger la page d'accueil
      var_dump('else : page d\'accueil');
    }
  }
}