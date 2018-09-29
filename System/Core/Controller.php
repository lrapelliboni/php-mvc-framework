<?php 
namespace System\Core;

class Controller {
    protected function view($viewName, $viewBag = []) 
    {
        if (count($viewBag) > 0) {
            foreach ($viewBag as $bagIndex => $bagValue) {
                ${$bagIndex} = $bagValue;
            }
        }
        return require_once 'App/Views/' . $viewName . '.php';
    }
}