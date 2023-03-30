<?php 
declare(strict_types = 1);

namespace src\View;

require dirname(__FILE__, 3) . '/vendor/autoload.php';
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class View{

    public function __construct(){
    }

    /**
     * @param String $view
     * @param Array $params
     * 
     * @return Void
     */
    public static function render(String $view, Array $params = []):Void{
        try {
            $config = include '../config/app.php';
            $root = $config['path']['root'];
            $template = sprintf('%s/app/Views/', $root);
            $content = sprintf('%s.html.twig', $view);
            
            extract($params, EXTR_SKIP);

            $loader = new FilesystemLoader($template);
            $twig = new Environment($loader);
            $twig->addGlobal('_session', $_SESSION);
            $twig->addGlobal('_post', $_POST);
            $twig->addGlobal('_get', $_GET);

            echo $twig->render($content, $params);
                
        } catch (\Exception $error) {
            echo $error->getMessage();
            die();
        }
    }
}