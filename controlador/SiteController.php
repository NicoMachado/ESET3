<?php
class SiteController {
    private $page;
    
    function __contruct() {
        $this->page = 'index.view.php';
        
    }
    
    function admin() {
        echo "Estoy en Site/Admin";
        ob_start();
        include 'vistas/app/' . $page;
        $contenido = ob_get_clean();
        return $contenido;

    }
}

//Como 