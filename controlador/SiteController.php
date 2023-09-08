<?php
//require_once 'ConexionBD.php';

class SiteController {
    private $rutaVistas;
    private $page = 'index.view.php';
    
    function __construct($rutaVistas = 'vistas/app') {
       print "estoy en constructor de __contruct";
        $this->rutaVistas = $rutaVistas;
        $this->page = 'index.view.php';
    }
    
    function admin($nombreVista, $datos = []) {
        //echo "Estoy en Site/Admin";
        //var_dump($this->rutaVistas);

        $rutaCompleta = $this->rutaVistas . '/' . $nombreVista . '.php';

        //var_dump($rutaCompleta);
        if (file_exists($rutaCompleta)) {
            //print "Estoy en Site/Admin";
            ob_start();
            
            include $rutaCompleta;

            $contenido = ob_get_clean();

            return $contenido;
            
        } else {
            echo "No existe la vista $rutaCompleta";
        }
    }
}

