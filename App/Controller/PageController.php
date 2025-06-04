<?php 

namespace App\Controller;

class PageController extends Controller
{
  public function route():void
  {
    if (isset($_GET['action'])){
      switch ($_GET['action']) {
        case 'about':
          // Appeler la méthode about
          $this->about();
          break;
        case 'home':
          // Appeler la méthode home
          var_dump('On appele la méthode home');
          break;
        default:
          // Erreur
          var_dump('Deafult : erreur');
          break;
      }
    } else{
      // Charger la page d'accueil
    }
  }

  protected function about()
  {
    $params = [
      'test' => 'abc',
      'test2' =>'ab23'
    ];
    
    $this->render('page/about', $params);
  }
}