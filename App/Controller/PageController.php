<?php

namespace App\Controller;

class PageController extends Controller
{
  public function route(): void
  {
    try {
      if (isset($_GET['action'])) {
        switch ($_GET['action']) {
          case 'about':
            // Appeler la méthode about
            $this->about();
            break;
          case 'home':
            // Appeler la méthode home
            $this->home();
            break;
          default:
            throw new \Exception("Cette action n'existe pas : " . $_GET['action']);
        }
      } else {
        throw new \Exception("Aucune action detectée");
      }
    } catch (\Exception $e) {
      $this->render('/errors/default', [
        'error' => $e->getMessage()
      ]);
    }
  }

  protected function about()
  {
    $this->render('page/about', [
      'test' => 'abc',
      'test2' => 'ab23'
    ]);
  }

  protected function home()
  {
    $this->render('page/home', []);
  }
}
