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
        <title>Casdastrar</title>
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
<!--        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>-->        
        <script src="../js/jquery-3.1.0.min.js"></script>
        <script src="../js/jquery.validate.min.js"></script>
        <script src="../js/jquery.maskedinput.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <!--<script src="../js/valida_cpf_cnpj.js"></script>-->
        <script src="../js/exemplo_1.js"></script>
        <script src="../js/exemplo_2.js"></script>     
        <script src="../js/exemplo_3.js"></script> 
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
                                                    aria-expanded="false"> Fornecedores <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="../fornecedores/cadastrar-fornecedor.php">Cadastrar Fornecedores</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../../controller/FornecedorController.php?acao=buscartodos" >Mostrar Fornecedores Cadastrados</a></li>
                <li role="separator" class="divider"></li>

            </ul></li>
            <li role="presentation" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                                                    aria-expanded="false"> Títulos <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="../../controller/TituloController.php?acao=listarclientes">Cadastrar Títulos a receber</a></li>
                <li><a href="../../controller/TituloController.php?acao=listartitulos"> Mostrar todos os títulos a receber</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../../controller/TituloPagarController.php?acao=listarfornecedor">Cadastrar Títulos a pagar</a></li>
                <li><a href="../../controller/TituloPagarController.php?acao=listartitulos"> Mostrar todos os títulos a pagar</a></li>
                

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
                <li role="separator" class="divider"></li>
                <li><a href="../../view/classificacoes/cadastrar-classificacao.php">Cadastrar Classificação</a></li>
                <li><a href="../../controller/ClassificacaoController.php?acao=buscartodos">Listar Classificacoes Cadastradas</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../../controller/ModuloController.php?acao=paginamodulo">Cadastrar Modulos</a></li>
                <li><a href="../../controller/ModuloController.php?acao=listarmodulo">Listar Modulos </a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../../controller/FuncaoModuloController.php?acao=paginafuncao">Cadastrar função</a></li>
                <li><a href="../../controller/FuncaoModuloController.php?acao=listarfuncoes">Listar Funções cadastradas</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../../view/prioridade/cadastrar-prioridade.php">Cadastrar Prioridade</a></li>
                <li><a href="../../controller/PrioridadeController.php?acao=buscartodos">Listar Prioridades Cadastradas</a></li>
                

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
        <?php if (isset($_GET['status'])) { ?>
                <div class="alert alert-info">
                    <center><?php echo $_GET['status']; ?></center>
                </div>
           

        <?php }; ?>
        <h1>Cadastrar funções do Módulo</h1>
        <form action="../../controller/FuncaoModuloController.php" id="formcad" method="get">
            <input type="hidden" value="cadastrarfuncao" name="acao">
            <div class="form-group row">
                <label class="col-xs-2 col-form-label" for="modulo">Modulo</label>
                <div class="col-xs-10">
                    <select name="moduloid">
                         <?php session_start() ?>
            <?php if (isset($_SESSION["modulos"])){foreach ($_SESSION["modulos"] as $modulos):?> 
                                    <option value="<?php echo $modulos['id_modulo']; ?>"><?php echo $modulos['nomeModulo']; ?></option>
                               <?php endforeach;}?> 
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="nome" class="col-form-label col-xs-2">Nome da função</label>
                    <div class="col-xs-10">
                        <input type="text" name="nome" class="form-control">
                    </div>
            </div>
            <div class="form-group row">
                <label for="codigo" class="col-form-label col-xs-2">Codigo da função</label>
                    <div class="col-xs-10">
                        <input type="text" name="codigo" id="codigo" placeholder="Preencher com 4 digitos numericos" class="form-control">
                    </div>
            </div>
            <div class="row">
                <div class="col-xs-2"></div>
                <div class="col-xs-6">
                <input class="btn btn-success" type="submit" onclick="clicked"id="myBtn" value="Cadastrar">
                </div>
                <div class="col-xs-2">
                    <a class="btn btn-default" href="../../controller/FuncaoModuloController.php?acao=listarfuncoes">Exibir Cadastro</a>
                </div>
            </div>
            </form> 
        
        
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
                                
                                maxlength: 50,
                                minlength: 1,
                                
                                 "remote":
                                    {
                                        url: '../../controller/FuncaoModuloController.php?acao=validarcodigo',
                                        type: "post",
                                        data:
                                        {
                                            email: function()
                                            {
                                                return $('#register-form :input[name="codigo"]').val();
                                            }   
                                        }
                                }
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
                                
                                maxlength:"Deve conter no máximo 4 caracteres!",
                                minlength:"Deve conter no minimo 4 caracteres!",
                                remote:"codigo já cadastrado"
                            }
                                                    

                        }

                    });

                });
                
                </script> 
        <script>
        $(function () {
                        $("#codigo").mask("9999");
                        
                    });
        </script>
            
            
            
            
        