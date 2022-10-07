<?php

class Controller
{
    public $dados;//variavel publica, sendo possível utilizar em outras views

    public function __construct()
    {
        $this->dados = array();
    }

    //chamado por todos os controllers
    public function carregarTemplate($nomeView, $dadosModel = array())
    {
        $this->dados = $dadosModel;//recebe nome da view, e informação da classe model, fazendo a busca no banco de dados, distruindo as informações na página, juntando as informações e o template.
        require 'Views/template.php';
    }

    //chamado no template
    public function carregarViewNoTemplate($nomeView, $dadosModel = array())
    {
        extract($dadosModel);//

        require 'Views/'.$nomeView.'.php';//dinamico
    }
}
