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
          $pageController = new PageController();
          $pageController->route();
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
    }
  }

  protected function render(string $path, array $params = []):void
  {
    $filePath = _ROOTPATH_.'/templates/'.$path.'.php';

    try {
      if(!file_exists($filePath)){
        throw new \Exception("Fichier non trouvé : " . $filePath); // Slash avant Exception pour dire que la class Exception est à la racine
      } else {
        extract($params); //Extrait chaque ligne du tableau et crée des variables pour chacune
        require_once $filePath;
      }

    } catch(\Exception $e){
      echo $e->getMessage(); //getMessage() est une methode native de la classe native Exception
    }

    

    //require _ROOTPATH_.'/templates/page/about.php';
  }
}