<?php 

namespace App\Repository;

use App\Entity\Book;
use App\db\Mysql;
class BookRepository 
{
    public function findOneById(int $id)
    {
        //appel bdd 
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('SELECT * FROM book WHERE id = :id');
        $query->bindValue(':id', $id, $pdo::PARAM_INT);
        $query->execute();
        $book = $query->fetch();

        //$book = ['id' => 1, 'title' => 'titre test', 'description'=>'description test'];

        $bookEntity = new Book();        
        $bookEntity->setId($book['id']);
        $bookEntity->setTitle($book['title']);
        $bookEntity->setDescription($book['description']);

        //Appeler dynamiquement 
        /*foreach ($book as $key => $value) {
            $bookEntity->{'set' . }
        }*/

        return $bookEntity;
    }


}