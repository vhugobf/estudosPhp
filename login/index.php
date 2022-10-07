<?php
require_once './classes/usuarios.php';
$u = new Usuario();
?>

<html lang="pt-br">

<head>
    <meta charset="utf-8"/>
    <title>Projeto Login</title>
    <link rel="stylesheet" href="CSS/estilo.css">
    <meta name="viewport" content="width-device-width">
</head>

<body>

    <div id="corpo-form">

        <h1>Entrar</h1>
        <form method="POST">

            <input type="email" placeholder="Usuário" name="email">
            <input type="password" placeholder="Senha" name="senha">
            <input type="submit" value="ACESSAR">
            <a href="cadastrar.php">Ainda não é inscrito?<strong>Cadastre-se</strong></a>

        </form>

    </div>

<?php

if (isset($_POST['email'])) 

{
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    if (!empty($email) && !empty($senha)) 
    {
        $u->conectar("tela_login","localhost","root","");
        if ($u->msgErro == "") 
        {
            
        if ($u->logar($email,$senha)) 
        {
            header("location: areaPrivada.php");
        }
        else 
        {
            ?>
            <div class="msg-erro">
                Email e/ou senha estão incorretos!
            </div>    
            <?php
        }
    }
    else 
    {
        ?>
        <div class="msg-erro">
            <?php echo "Erro: " .$u->msgErro; ?>
        </div>
        <?php
    }
}else 
{
    ?>
    <div class="msg-erro">
        Preencha todos os campos
    </div>
    <?php
    }
}
?>
</body>
</html>