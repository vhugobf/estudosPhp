<?php
    require_once 'classes/usuarios.php';
    $u = new Usuario();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Projeto Login</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div id="corpo-form-cad">
        <h1>Cadastrar</h1>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
            <input type="text" name="telefone" placeholder="telefone" maxlength="30">
            <input type="email" name="email" placeholder="Usuário" maxlength="40">
            <input type="password" name="senha" placeholder="Senha" maxlength="15">
            <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
            <input type="submit" value="Cadastrar">
        </form>
    </div>
<?php
//verificar se clicou no botao
if (isset($_POST['nome'])) 
{
   $nome = addslashes($_POST['nome']);
   $telefone = addslashes($_POST['telefone']);
   $email = addslashes($_POST['email']);
   $senha = addslashes($_POST['senha']);
   $confirmarSenha = addslashes($_POST['confSenha']);
   //verificar se esta preenchido
   
   if (!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty ($confirmarSenha))
    {
       $u->conectar("tela_login","localhost","root","");
       if ($u->msgErro == "") //se esta tudo ok
       {
            if ($senha == $confirmarSenha) {
                if ($u->cadastrar($nome,$telefone,$email,$senha)) 
                {
                   ?>
                   <div id="msg-sucesso">
                    Cadastrado com Sucesso! Acesse para entrar
                   </div>
                   <?php
                }
                else 
                {
                    ?>
                    <div class="msg-erro">
                        Email já cadastrado!
                    </div>
                    <?php
                }
            }
            else 
            {
                ?>
                <div class="msg-erro">
                    Senhas não coincidem!
                </div>
                <?php
            }
       }
       else 
       {
        ?>
            <div class="msg-erro">
                <?php echo "Erro: " .$u->msgErro;?>
            </div>
        <?php
       }
    }
    else
{
    ?>
    <div class="msg-erro">
        Preencha todos os campos!
    </div>
    <?php
}
}

?>
</body>
</html>