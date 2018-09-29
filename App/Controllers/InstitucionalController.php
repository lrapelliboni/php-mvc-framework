<?php
namespace App\Controllers;
use System\Core\Controller;

class InstitucionalController extends Controller {
    public function index()
    {
        return $this->view('institucional/index', ['titulo' => 'titulo']);
    }
}