<?php

namespace App\Controller;

class Controller
{
  public function route(): void
  {
    try {
      if (isset($_GET['controller'])) {
        switch ($_GET['controller']) {
          case 'page':
            // Charger controller page
            $pageController = new PageController();
            $pageController->route();
            break;
          case 'book':
            // Charger controller book
            $pageController = new BookController();
            $pageController->route();
            break;
          default:
            throw new \Exception("Le controller n'existe pas");
        }
      } else {
        // Charger la page d'accueil
        $pageController = new PageController();
        $pageController->home();
      }
    } catch (\Exception $e) {
      $this->render('/errors/default', [
        'error' => $e->getMessage()
      ]);

    }
  }

  protected function render(string $path, array $params = []): void
  {
    $filePath = _ROOTPATH_ . '/templates/' . $path . '.php';

    try {
      if (!file_exists($filePath)) {
        throw new \Exception("Fichier non trouvé : " . $filePath); // Slash avant Exception pour dire que la class Exception est à la racine
      } else {
        extract($params); //Extrait chaque ligne du tableau et crée des variables pour chacune
        require_once $filePath;
      }
    } catch (\Exception $e) {
      $this->render('/errors/default', [
        'error' => $e->getMessage()
      ]);
    }



    //require _ROOTPATH_.'/templates/page/about.php';
  }
}
