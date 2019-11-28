<?php
session_start();
require_once("../../MODELS/Usuario.php");
require_once("../../controllers/Prospect/ControllerProspect.php");
use CONTROLLERS\ControllerProspect;
use MODELS\Usuario;
if (isset($_SESSION["usuario"])) {
    if (isset($_GET["email"])) {
?>
<!DOCTYPE html>
<html>
<head>
        <title>Bem Vindo ao Sistema</title>
        <link rel="stylesheet" type="text/css" href="../../libs/bootstrap/css/bootstrap.css">
        <style type="text/css">
            .table-overflow {
                max-height:600px;
                overflow-y:auto;
            }
        </style>
    </head>
    <body>
        <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="textoNavbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link " href="../main.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Usuario/v_incluir_usuario.php">Cadastrar Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="v_incluir_prospect.php">Cadastrar Prospects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="v_listar_prospects.php">Listar Prospects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../controllers/efetuar_logoff.php">Sair</a>
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
            <form class="form-signin" action="../../controllers/Prospect/c_alterar_prospect.php" method="POST">
                <div>
                    <h5 class="form-signin-heading">Alterar Prospect:</h5>
                </div class="">
                <?php
                    $ctrl = new ControllerProspect();
                    $p = $ctrl->buscarProspects($_GET["email"])[0];
                ?>
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input name="nome" id="nome" value="<?php echo $p["nome"]; ?>" type="text" placeholder="Digite seu nome" class="form-control" autofocus required/>
                        <label for="email">E-mail:</label>
                        <input name="email" id="email" value="<?php echo $p["email"]; ?>" placeholder="Digite seu E-mail" class="form-control" required autocomplete="off"/>
                        <label for="celular">Celular:</label>
                        <input name="celular" id="celular" value="<?php echo $p["celular"]; ?>" type="text" placeholder="Digite seu celular" class="form-control" required/>
                        <label for="whatsapp">Whatsapp:</label>
                        <input name="whatsapp" id="whatsapp" value="<?php echo $p["whatsapp"]; ?>" type="text" placeholder="Digite seu whatsapp" class="form-control" required/>
                        <label for="facebook">Facebook:</label>
                        <input name="facebook" id="facebook" value="<?php echo $p["facebook"]; ?>" type="text" placeholder="Digite sua facebook" class="form-control" required/>
                    </div>
                <input name="codigo" id="codigo" value="<?php echo $p["codigo"]; ?>" type="text" style="display:none" required/>    
                <button type="submit" class="btn btn-success">Alterar</button>
                <a href="v_listar_prospects.php" class="btn btn-danger">Cancelar</a>
                <input name="emailAntigo" id="emailAntigo" style="display:none" value="<?php echo $p["email"]; ?>" placeholder="Digite seu E-mail" class="form-control" required autocomplete="off"/>

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
        $_SESSION['erroLogin'] = "Você precisa passar um email para alteracao.";
        header("Location: v_listar_prospects.php");
    }    
} else { 
    $_SESSION['erroLogin'] = "Você precisa fazer login para acessar o sistema.";
    header("Location: ../../index.php");
}
?> 