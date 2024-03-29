<!DOCTYPE html>
<html>
    <head>
        <title>Bem Vindo ao Sistema</title>
        <link rel="stylesheet" type="text/css" href="../uteis/bootstrap/css/bootstrap.css">
        <meta charset="UTF-8">
    </head>
    <body>
        <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="textoNavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../main.php">Home <span class="sr-only">(Página atual)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cadastrar Prospects</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    Bem vindo: <?php $usuario = unserialize($_SESSION['usuario']);
                    echo $usuario->nome;
                    ?>
            </div>
        </nav>
        </header>
        <div class="container">
            <form class="form-signin" action="../../controllers/usuario/c_alterar_usuario.php" method="POST">
                <div>
                    <h5 class="form-signin-heading">Cadastro de Usuários:</h5>
                </div class="">
                <div class="form-group">
                     <label for="nome">Nome:</label>
                     <input name="codigo" id="nome" <?php echo 'value="'.$prospect->nome;'"' ?> type="text" placeholder="Digite seu nome" class="form-control" required/>
                     <label for="email">E-mail:</label>
                     <input name="email" id="email" placeholder="Digite seu E-mail" class="form-control" required autofocus autocomplete="off"/>
                     <label for="celular">Celular:</label>
                     <input name="celular" id="celular" type="text" placeholder="Digite seu celular" class="form-control" required/>
                     <label for="whatsapp">Whatsapp:</label>
                     <input name="whatsapp" id="whatsapp" type="text" placeholder="Digite seu whatsapp" class="form-control" required/>
                     <label for="facebook">Facebook:</label>
                     <input name="facebook" id="facebook" type="text" placeholder="Digite sua facebook" class="form-control" required/>
                </div>
                <button type="submit" class="btn btn-success">Cadastrar</button>
                <a href="v_listar_prospect.php" class="btn btn-danger">Cancelar</a>
            </form>
            <p class="text-center text-danger">
                <?php
                  if(isset($_SESSION['erroAlteracao'])){
                     echo $_SESSION['erroAlteracao'];
                     unset($_SESSION['erroAlteracao']);
                  }
                ?>
            </p>
        </div>
    </body>
</html>