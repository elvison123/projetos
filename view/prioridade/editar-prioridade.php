<?php 
session_start();
if(!isset($_SESSION["nomeusuario"])){
    header('Location: LoginUsuario.php');
   
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
<!--        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>-->        
        <script src="../js/jquery-3.1.0.min.js"></script>
        <script src="../js/jquery.validate.min.js"></script>
        <script src="../js/jquery.maskedinput.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
      
         <!-- Bootstrap -->
        <link href="../css/bootstrap.css" rel="stylesheet">

    </head>
    <ul class="nav nav-pills">
        <li role="presentation" class="active"><a href="../home/home-usuario.php">Home</a></li>
        <!-- <li role="presentation"><a href="#">Messages</a></li>-->
        <li role="presentation" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                                                    aria-expanded="false"> Clientes <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="../clientes/cadastrar-cliente.php">Cadastrar Clientes</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../../controller/ClienteController.php?acao=buscartodos" >Mostrar Clientes Cadastrados</a></li>
                <li role="separator" class="divider"></li>

            </ul></li>
            <li role="presentation" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                                                    aria-expanded="false"> Títulos <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="../../controller/TituloController.php?acao=listarclientes">Cadastrar Títulos a receber</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../../controller/TituloController.php?acao=listartitulos"> Mostrar todos os títulos cadastrados</a></li>
                

            </ul></li>
            <li role="presentation" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                                                    aria-expanded="false"> Usuários <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="../usuarios/cadastrar-usuario.php">Cadastrar Usuários</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../../controller/UsuarioController.php?acao=listarusuarios"> Mostrar todos os Usuários cadastrados</a></li>
                

            </ul></li>
            <li role="presentation" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                                                    aria-expanded="false"> Chamados <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#">Modulos</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../../controller/ModuloController.php?acao=paginafuncao">Cadastrar função</a></li>
                <li><a href="../../controller/ModuloController.php?acao=listarfuncoes">Listar Funções cadastradas</a></li>
                

            </ul></li>
            
            <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown"><?php  if (isset($_SESSION['nomeusuario'])){echo "Olá, " . $_SESSION["nomeusuario"];}; ?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"></a></li>
                    <li><a href="#">Configurações do perfil</a></li>
                    
                    
                </ul>
            </li>
            <li><a href="../../controller/LoginUsuarioController.php?acao=logout">Sair</a></li>
        </ul>
    </ul>
    <div class="container">
        <h1>Cadastrar Prioridade</h1>
        <form action="../../controller/PrioridadeController.php" id="formcad" method="get">
            <input type="hidden" value="editarprioridade" name="acao">
            <input type="hidden" value="<?php echo $_GET['id_prioridade']; ?>" name="prioridadeid">
            <div class="form-group row">
                <label class="col-xs-2 col-form-label" for="prioridade">Prioridade</label>
                <div class="col-xs-10">
                    <select name="prioridadeid">
                          
                                    <option value="<?php echo $_GET['id_prioridade_fk']; ?>"><?php echo $_GET['nomePrioridade']; ?></option>
                            
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="nome" class="col-form-label col-xs-2">Nome da Prioridade</label>
                    <div class="col-xs-10">
                        <input type="text"name="nome" value="<?php echo $_GET['nome']; ?>"class="form-control">
                    </div>
            </div>
            <div class="form-group row">
                <label for="codigo" class="col-form-label col-xs-2">Codigo da Prioridade</label>
                    <div class="col-xs-10">
                        <input type="text" name="codigo" readonly value="<?php echo $_GET['codigo']; ?>"class="form-control">
                    </div>
            </div>
            <div class="form-group col-xs-2">
                <input class="btn btn-default" type="submit" value="Cadastrar">
            </div>
                <script>
                $(document).ready(function () {
                    $("#formcad").validate({
                        rules: {
                            nome: {
                                required: true,
                                maxlength:100,
                                minlength: 1,
                                

                            },
                            
                            codigo: {
                                required: true,
                                number:true,
                                maxlength: 50,
                                minlength: 1,
                                
                                
                        }
                              

                        },
                        messages: {
                            nome: {
                                required: "Preenchimento obrigatório!",
                                maxlength:"Deve conter no máximo 100 caracteres1",
                                minlength:"Deve conter no minimo 1 caracteres!"

                            },
                            
                            codigo: {
                                required:"Preenchimento obrigatório!",
                                number:"Preencher apenas com numeros!",
                                maxlength:"Deve conter no máximo 50 caracteres!",
                                minlength:"Deve conter no minimo 1 caracteres!",
                                
                            }
                                                    

                        }

                    });

                });
                </script>     
            
            
            
            
        </form> 
        
        
    </div>