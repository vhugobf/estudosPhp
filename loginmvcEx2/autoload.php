<?php
//realiza require automatico
spl_autoload_register(function($nome_arquivo)//captura a chamada de uma nova instancia
{
    if (file_exists('Controller/'.$nome_arquivo.'.php')) 
    {
        require 'Controller/'.$nome_arquivo.'.php';     
    }

    elseif (file_exists('Core/'.$nome_arquivo.'.php')) 
    {
        require 'Core/'.$nome_arquivo.'.php';
    }

    elseif (file_exists('Models/.'.$nome_arquivo.'.php'))
    {
        require 'Models/.'.$nome_arquivo.'.php';
    }
});

?>