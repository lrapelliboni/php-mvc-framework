<?php
namespace App\Controllers;

use App\Utils\MySQLConnect;
use System\Core\Controller;

class HomeController extends Controller {

    public function index($query = null)
    {
        $pdo = (new MySQLConnect())->connect();
        $stmt = $pdo->prepare("SELECT * FROM categories WHERE name LIKE :like_param");

        $stmt->bindValue(':like_param',  $query . '%', \PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $this->view('home/index', ['categories' => $rows, 'title' => 'Categorias']);
    }

    public function about()
    {
        return $this->view('home/about', ['title' => 'About']);
    }
}