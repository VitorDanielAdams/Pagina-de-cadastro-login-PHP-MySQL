<?php
require_once 'CLASSES/usuarios.php';
$u = new Usuario;
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/style.css" />
        <title>Tela de Cadastro</title>
    </head>

    <body>
        <!--Form Cadastro-->
        <div class="container">
            <div class="boxcad">
                <form method="POST" id="form">
                    <div class="title">
                        <span>Cadastro</span>
                    </div>
                    <div class="input">
                        <input type="text" name="user" placeholder="Usuário" id="user" maxlength="30">
                        <small></small>
                    </div>
                    <div class="input">
                        <input type="email" name="email" placeholder="Email" id="email" maxlength="40">
                        <small></small>
                    </div>
                    <div class="input">
                        <input type="password" name="password" placeholder="Senha" id="password" maxlength="15">
                        <small></small>
                    </div>
                    <div class="input">
                        <input type="password" name="confirmPassword" placeholder="Confirmar senha" id="confirmPassword" maxlength="30">
                        <small></small>
                    </div>
                    <button type="submit">Enviar</button>
                    <div class="log">
                        <a>Já tem uma conta? <a id="linklog" href="index.php">Fazer Login.</a></a>
                    </div>
                </form>
            </div>
        </div>
        <script src="scriptcad.js"></script>
    </body>
    <?php
if(isset($_POST['user'])){
    $user = addslashes($_POST['user']);
    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);
    $confirmPassword = addslashes($_POST['confirmPassword']);

    if(!empty($user) && !empty($email) && !empty($password) && !empty($confirmPassword)){
        $u->conectar("cadastro","localhost","root","");
        if($u->msgErro == ""){
            if($u->cadastrar($email,$user,$password)){
                ?>
        <div class="sucess">
            <small>Cadastrado com sucesso</small>
        </div>
        <?php
            } else {
                ?>
            <div class="erro">
                <small>Usuario já cadastrado</small>
            </div>
            <?php
            }
        } else {
            ?>
                <div class="erro">
                    <small><?php echo "Erro: ".$u->msgErro; ?></small>
                </div>
                <?php
        }
    } else {
        ?>
                    <script>
                        form.addEventListener('submit', (e) => {
                            checkInputs();
                            if (!checkInputs()) {
                                e.preventDefault();
                            }
                        });
                    </script>
                    <?php
    }
}
?>

    </html>