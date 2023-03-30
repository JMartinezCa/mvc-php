<?php 

namespace src;

require_once 'Autoloader/Autoloader.php';

use src\Autoloader\Autoloader;
use src\Router\Router;

class Core{

    public function __construct(){
    }

    /**
     * Inicializa la aplicación
     * @return Void
     */
    static public function run():Void{
        static::init();
        static::loader();
        static::dispatcher();
    }

    /**
     * Inicia una nueva sesión
     * 
     * @return Void
     */
    private static function init():Void{
        session_start();
    }

    /**
     * Inicializa la Autocarga de clases
     * 
     * @return Void
     */
    static public function loader():Void{
        $loader = new Autoloader;
        $loader->register();
    }

    /**
     * Inicializa el enrutador
     * 
     * @return Void
     */
    static public function dispatcher():Void{
        $router = new Router;
        $router->dispatch();
    }
}