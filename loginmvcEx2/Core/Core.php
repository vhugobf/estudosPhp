<?php

class Core
{
    public function __construct()
    {
        $this->run();
    }

    public function run()//
    {
        $parametros = array();
        if (isset($_GET['pag'])) {
            //login
            $url = htmlentities(addslashes($_GET['pag']));
        }

        if (!empty($url)) { //possui informação apos dominio www.site.com/classe/funcao/parametro
            $url = explode('/', $url);//explode string e cria array, separa o que está dentro da url


            $controller = $url[0].'Controller';//noticiaController
            //retira o primeiro valor do array
            array_shift($url);//retira posição 0 e reordena, 

            //se o usuário mandou função
            if (isset($url[0]) && !empty($url[0]))
            {
                $metodo = $url[0];
                array_shift($url);
            }
            //enviou somenta a classe
            else
            { 
                $metodo = 'index';
            }
            if (count($url) > 0) 
            {
                $parametros = $url;
            }
            else 
            { //www.site.com/
                $controller = 'homeController';
                $metodo = 'index';
            }

            $caminho = 'loginmvcEx1/Controller/'.$controller.'.php';

            if (!file_exists($caminho) && !method_exists($controller, $metodo)) 
            {
                $controller = 'homeController';//encaminha para a home caso não encontre a url digitada
                $metodo = 'index';
            }
            

            $c = new $controller;

            call_user_func_array(array($c,$metodo), $parametros ); //ternario  
        } // isset($parametros) ? $parametros : array(null)

    }
}
