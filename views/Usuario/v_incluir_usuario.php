<?php
session_start();
require_once("../../MODELS/Usuario.php");
use MODELS\Usuario;
if (isset($_SESSION["usuario"])) {
?>
<!DOCTYPE html>
    <html>
    <head>
        <title>Bem Vindo ao Sistema</title>
        <link rel="stylesheet" type="text/css" href="../../libs/bootstrap/css/bootstrap.css">
        <meta charset="UTF-8">
    </head>
        <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="collapse navbar-collapse" id="textoNavbar">
                <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="../main.php">Home </span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="v_incluir_usuario.php">Cadastrar Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Prospect/v_incluir_prospect.php">Cadastrar Prospects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Prospect/v_listar_prospects.php">Listar Prospects</a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        Bem vindo: <?php
                                    $usuario = unserialize($_SESSION["usuario"]);
                                    echo $usuario->nome;
                                ?> 
                        </span>
                </div>
            </nav>
            </header><br/>
            <div class="container">
                <form class="form-signin" action="../../controllers/Usuario/c_incluir_usuario.php" method="POST">
                    <div>
                        <h5 class="form-signin-heading">Cadastro de Usuários:</h5>
                    </div class="">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input name="nome" id="nome" type="text" placeholder="Digite seu nome" class="form-control" required/>
                        <label for="email">E-mail:</label>
                        <input name="email" id="email" type="text" placeholder="Digite seu email" class="form-control" required/>
                        <label for="login">Login:</label>
                        <input name="login" id="login" placeholder="Digite seu login" class="form-control" required autofocus autocomplete="off"/>
                        <label for="senha">Senha:</label>
                        <input name="senha" id="senha" type="password" placeholder="Digite sua senha" class="form-control" required/>
                    </div>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                    <a href="../../index.php" class="btn btn-danger">Cancelar</a>
                </form>

                <p class="text-center text-danger">
            <?php
                if(isset($_SESSION['erroIncluir'])){
                    echo $_SESSION['erroIncluir'];
                    unset($_SESSION['erroIncluir']);
                } 
            ?>
        </p>
            </div>
        </body>
    </html>
<?php        
    } else { 
        $_SESSION['erroLogin'] = "Você precisa fazer login para acessar o sistema.";
        header("Location: ../../index.php");
    }
?> 