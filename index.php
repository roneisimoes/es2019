<?php
 session_start();
?>
<!DOCTYPE html>
<html>
    <cabeça >
        <title> Cadastro de Perspectivas </title >
        <link rel = " stylesheet "  type = " text/css "  href = " uteis/bootstrap/css/bootstrap.css ">
        <style type = " text/css ">
            .login-form {
                largura : 600 px ;
                margem : automático de 50 px  ;
            }
            formulário.login-form {
                sombra da caixa: 0 px  2 px  2 px  rgba ( 0 , 0 , 0 , 0,3 );
                preenchimento : 30 px ;
            }
        </style >
    </cabeça >
    <corpo >
        <div  class = " formulário de login " >
            <form  class = " form-signin "  action = " controllers/validar_login.php "  method = " POST " >
               <div  class = " container " >
                  <div  class = " row " >
                     <img  src = " assets/customer.jpg "  width = " 80 " >
                  </div>
               </div>
               <h2  class = " text-center " > Faça login </h2>
                <div  class = " form-group " >
                    <input  name = " login "  type = " text "  class = " form-control "  espaço reservado = " Login "  required = " required " >
                </div>
                <div  class = " form-group ">
                    <input  name = " senha "  type = " password "  class = " form-control "  placeholder = " Senha "  required = " required " >
                </div>
                <div  class = " form-group " >
                    <tipodebotão  = "enviar" class = "btn btn-primário btn-bloco" > Entrar </button> 
                </div>
            </form>
            <P  class = " text-center " > <a  href = "views/Usuario/v_incluir_usuario.php " > Cadastre-se </a > </p >
            <p  class = " texto-perigo-texto-centro " >
                <? php
                  if (isset($_SESSION['erroLogin'])) {
                     echo  $_SESSION['erroLogin'];
                     não definido ($_SESSION[ ' erroLogin ' ]);
                  }
                ?>
            </p>
        </div>
    </corpo>
</html>