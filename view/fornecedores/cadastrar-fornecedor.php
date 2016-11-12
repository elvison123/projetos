<?php 
session_start();
//if(!isset($_SESSION["nomeusuario"])){
//    header('Location: LoginUsuario.php');
//   
//}
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
                <li role="separator" class="divider"></li>
                <li><a href="../../view/classificacoes/cadastrar-classificacao.php">Cadastrar Classificação</a></li>
                <li><a href="../../controller/ClassificacaoController.php?acao=buscartodos">Listar Classificacoes Cadastradas</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../../controller/ModuloController.php?acao=paginamodulo">Cadastrar Modulos</a></li>
                <li><a href="../../controller/ModuloController.php?acao=listarmodulo">Listar Modulos </a></li>
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
        <?php if (isset($_GET['status'])) { ?>
                <div class="alert alert-info">
                    <center><?php echo $_GET['status']; ?></center>
                </div>
           

        <?php }; ?>
        
        
    <div class="row">
        <div class="col-xs-4">
            <h1 class="h1">Cadastrar Fornecedores</h1>
        </div>
    </div>

    <div class="container">
        <form action="../../controller/FornecedorController.php" method="GET" id="formcad" onclick="" novalidate="" >
            <input type="hidden" name="acao" value="cadastrar">

            <div class="form-group row">
                <label for="nome" class="col-xs-2 col-form-label"  >Nome da Empresa</label>
                <div class="col-xs-8">
                    <input type="name" class="form-control" name="nome"   id="nome" required maxlength="50" placeholder="Digite o nome do fornecedor">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-xs-2 col-form-label">E-mail</label>
                <div class="col-xs-8" >
                    <input type="email"class="form-control" name="email"  id="email" required maxlength="50" placeholder="Digite o email do fornecedor">
                </div>
            </div>
            
            
            <div class="form-group row">
                <label  for="telefone" class="col-xs-2 col-form-label">Telefone</label>
                <div class="col-xs-8">
                    <input  type="text"class="form-control" name="telefone" id="telefone" required maxlength="50" placeholder="Digite o telefone">
                </div>
            </div>
            
            <div class="form-group row">
                
                <label  for="cpf" class="col-xs-2 col-form-label" >CNPJ:</label>
                <div class="col-xs-8">

                    <input  type="text"class="form-control cpf_cnpj" required maxlength="18"  name="cpf" id="cpf" placeholder="Digite o CNPJ">
                </div>
            </div>
            <div class="form-group row">
                <label for="endereco" class="col-xs-2 col-form-label" >Endereço</label>
                <div class="col-xs-8">
                    <input type="text"class="form-control"  name="endereco" id="endereco" required maxlength="50" placeholder="Digite o endereco">
                </div>
            </div>



            <div class="row">
                <div class="col-xs-2"></div>
                <div class="col-xs-6">
                <input class="btn btn-success" type="submit" onclick="clicked"id="myBtn" value="Cadastrar">
                </div>
                <div class="col-xs-2">
                    <a class="btn btn-default" href="../../controller/FornecedorController.php?acao=buscartodos">Exibir Cadastro</a>
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
                                minlength: 2

                            },
                            email: {
                                required: true,
                                maxlength: 50
                                                        
                            },
                            telefone: {
                                required: true,
                                maxlength: 14

                            },
                            cpf: {
                                required: true
//                                minlength: 14,
//                                maxlength: 14

                            },
                            
                            endereco: {
                                required: true,
                                maxlength: 50
                            }

                        },
                        messages: {
                            nome: {
                                required: "Preenchimento obrigatório!",
                                minlength: "Deve conter no minimo 2 caracteres!"
                            },
                            email: {
                                required: "Preenchimento obrigatório!!",
                                email: "Email invalido!!",
                                maxlength: "Deve conter no máximo 50 caracteres."
                            },
                            
                            telefone: {
                                required: "Preenchimento obrigatório!!",
                                maxlength: "Deve conter no máximo 14 caracteres."

                            },
                            cpf: {
                                required: "Preenchimento obrigatório!!"
////                                minlength: "Deve conter no minimo 14 caracteres.",
//                                maxlength: "Deve conter no máximo 14 caracteres."
//
                            },
                            
                            endereco: {
                                required: "Preenchimento obrigatório!!",
                                maxlength: "Deve conter no máximo 50 caracteres."
                            }

                        }

                    });

                });
                $(function () {
                    $("#telefone").mask("(99)99999-9999");
                    $("#cpf").mask("99.999.999/9999-99");
                });


            </script>




    </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
     



</body>
</html>