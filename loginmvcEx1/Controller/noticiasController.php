<?php

class noticiasController extends Controller
{
    public function index () //padrao www.nome.com/
    {
        //chama um model
        //chama a view
        //realizar junção de back end com front end, pegar os dados do banco e jogar na view

        // $u = new usuario();
        // $dados = $u->getDadosUsuario();

        $this->carregarTemplate('noticias');// pode ou não passar o segundo parametro
    }

    public function getNoticias()
    {
        //chama um model
        //chama a view
        //realizar junção de back end com front end, pegar os dados do banco e jogar na view

        $this->carregarTemplate('getNoticias');
    }
    
}
