<?php

namespace App\Controller;

use App\Repository\BookRepository;

class BookController extends Controller
{
    public function route(): void
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'show':
                        // Appeler la méthode show
                        $this->show();
                        break;
                    case 'list':
                        // Appeler la méthode list
                        break;
                    case 'edit':
                        // Appeler la méthode edit
                        break;
                    case 'add':
                        // Appeler la méthode add
                        break;
                    case 'delete':
                        // Appeler la méthode delete
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

    protected function show()
    {
        try {
            if(isset($_GET['id'])){

                $id = (int)$_GET['id'];
                // Charger le livre par un appel au repository
                $bookRepository = new BookRepository();
                $book = $bookRepository->findOneById($id);

                $this->render('book/show', [
                    'book' => $book
                ]);
            }else {
                throw new \Exception("L'id est manquant");
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
        
    }

    protected function list()
    {
        $this->render('page/home', []);
    }

    protected function add()
    {
        $this->render('page/home', []);
    }

    protected function delete()
    {
        $this->render('page/home', []);
    }
}
