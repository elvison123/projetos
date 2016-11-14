<?php 
session_start();
if(!isset($_SESSION["nomeusuario"])){
    header('Location: LoginUsuario.php');
   //
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
<!--        <script src="../js/valida_cpf_cnpj.js"></script>-->
<!--        <script src="../js/exemplo_1.js"></script>
        <script src="../js/exemplo_2.js"></script>     
        <script src="../js/exemplo_3.js"></script>-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
         <!-- Bootstrap -->
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
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
                <li role="separator" class="divider"></li>
                <li><a href="../../view/classificacoes/cadastrar-classificacao.php">Cadastrar Classificação</a></li>
                <li><a href="../../controller/ClassificacaoController.php?acao=buscartodos">Listar Classificacoes Cadastradas</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../../controller/ModuloController.php?acao=paginamodulo">Cadastrar Modulos</a></li>
                <li><a href="../../controller/ModuloController.php?acao=listarmodulo">Listar Modulos </a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../../controller/ModuloController.php?acao=paginafuncao">Cadastrar Função</a></li>
                <li><a href="../../controller/ModuloController.php?acao=listarfuncoes">Listar Funções cadastradas</a></li>
                <li><a href="../../controller/ChamadoController.php?acao=paginachamado">Cadastrar Chamados</a></li>
                <li><a href="../../controller/ChamadoController.php?acao=listarchamado">Listar Chamados</a></li>
                

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
            <h1 class="h1">Cadastrar Chamado</h1>
        </div>
    </div>

    <div class="container">
        <form action="../../controller/ClienteController.php" method="GET" id="formcad" onclick="" novalidate="" >
            <input type="hidden" name="acao" value="cadastrar">
            
            <div class="form-group row">
                    <label for="id_cliente" class="col-xs-2 col-form-label"  >Cliente</label>
                    <div class="col-xs-8">
                        
                        <select name="id_cliente" class="selectpicker">
                               <?php session_start() ?>
                               <?php if (isset($_SESSION["clientes1"])){foreach ($_SESSION["clientes1"] as $clientes):?> 
                                    <option value="<?php echo $clientes['id_cliente']; ?>"><?php echo $clientes['nome']; ?></option>
                               <?php endforeach;}?>  
                        </select>
                    </div>    
            </div>        
                    
           <div class="form-group row">
                    <label  for="equipamento" class="col-xs-2 col-form-label" >Equipamento</label>
                    <div class="col-xs-8">
                        <select name="equipamento" id="equipamento">
                            <option value=>--</option>
                            <option value="S">Software</option>
                            <option value="H">Hardware</option>
                            </select>
                    </div>
           </div>
            <div class="form-group row">
                <label for="classificacao" class="col-xs-2 col-form-label">Classificacao</label>
                <div class="col-xs-8" >
                    <select name="classificacao" id="classificacao" disabled="disable">
                    </select>
                </div>
            </div>
            
            <div class="software hide">
                <div class="form-group row">
                    <label  for="modulo" class="col-xs-2 col-form-label">Módulo</label>
                    <div class="col-xs-8">
                        <select name="modulo" id="modulo" disabled="disable">
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label  for="funcao" class="col-xs-2 col-form-label" >Função</label>
                    <div class="col-xs-8">
                        <select name="funcao" id="funcao" disabled="disable">
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="prioridade"  class="col-xs-2 col-form-label" >Prioridade</label>
                <div class="col-xs-8">
                    <input type="text"class="form-control"  name="prioridade"  id="prioridade" required maxlength="20" placeholder="">
                </div>
            </div>
            
            
            <div class="form-group row">
                
                <label  for="descricao" class="col-xs-2 col-form-label" >Descrição</label>
                <div class="col-xs-8">
    
                    <input  type="text"class="form-control" required maxlength="14"  name="descricao" id="descricao" placeholder="">
                </div>
            </div>
            
            



            <div class="form-group row">
                
                <input class="center-block cpf_cnpj btn-success " type="submit" onclick="clicked"id="myBtn" value="Cadastrar">



                </form>

            </div>


           <script>
                $('select').css({width:'100%'}).select2();
                $(document).ready(function () {
                     $('select').css({width:'100%'}).select2();
                     
                     $('#equipamento').on('change',function(){
                         $("#classificacao option, #modulo option, #funcao option").remove();
                         $("#classificacao, #modulo, #funcao").prop("disabled",true);
                         
                         if ($(this).val()== "S") {
                             $(".software").removeClass("hide");
                         }else{
                                 $(".software").addClass("hide");
                             }
                         
                         $.get(
                            '../../controller/ClassificacaoController.php?acao=classificacao', 
                            {tipo:$(this).val()},
                            function(response){
                                if (response.length > 1) {
                                    for (var i = 0; i < response.length; i++) {
                                        $("#classificacao").append($("<option>").val(response[i].value).text(response[i].text));
                                    }
                                    $("#classificacao").prop("disabled",false);
                                }
                            }
                         );
                     });
                     $('#classificacao').on('change',function(){
                         $("#modulo option, #funcao option").remove();
                         $("#modulo, #funcao").prop("disabled",true);
                         $.get(
                            '../../controller/ModuloController.php?acao=modulo', 
                            {tipo:$(this).val()},
                            function(response){
                                if (response.length > 1) {
                                    for (var i = 0; i < response.length; i++) {
                                        $("#modulo").append($("<option>").val(response[i].value).text(response[i].text));
                                    }
                                    $("#modulo").prop("disabled",false);
                                }
                            }
                         );
                     });
                      $('#modulo').on('change',function(){
                         $("#funcao option").remove();
                         $("#funcao").prop("disabled",true);
                         $.get(
                            '../../controller/FuncaoModuloController.php?acao=funcao', 
                            {funcao:$(this).val()},
                            function(response){
                                if (response.length > 1) {
                                    for (var i = 0; i < response.length; i++) {
                                        $("#funcao").append($("<option>").val(response[i].value).text(response[i].text));
                                    }
                                    $("#funcao").prop("disabled",false);
                                }
                            }
                         );
                     });
                    /*
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
                            senha: {
                                required: true,
                                rangelength: [4, 20]

                            },
                            senhaRep: {
                                required: true,
                                equalTo: "#senha"

                            },
                            telefone: {
                                required: true,
                                maxlength: 14

                            },
                            cpf: {
                                required: true,
//                                minlength: 14,
//                                maxlength: 14,
                                ValidarCPF: true

                            },
                            empresa: {
                                required: true,
                                maxlength: 50
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
                            senha: {
                                required: "Preenchimento obrigatório!!",
                                rangelength: "Preencher com no minimo 4 e no máximo 20 caracteres!"

                            },
                            senhaRep: {
                                required: "Preenchimento obrigatório!!",
                                equalTo: "Senhas diferentes"

                            },
                            telefone: {
                                required: "Preenchimento obrigatório!!",
                                maxlength: "Deve conter no máximo 14 caracteres."

                            },
                            cpf: {
                                required: "Preenchimento obrigatório!!",
                                ValidarCPF: "CPF Inválido!"
////                                minlength: "Deve conter no minimo 14 caracteres.",
//                                maxlength: "Deve conter no máximo 14 caracteres."
//
                            },
                            empresa: {
                                required: "Preenchimento obrigatório!!",
                                maxlength: "Deve conter no máximo 50 caracteres."
                            },
                            endereco: {
                                required: "Preenchimento obrigatório!!",
                                maxlength: "Deve conter no máximo 50 caracteres."
                            }

                        }

                    });
*/
                });
        /*
                $(function () {
                    $("#telefone").mask("(99)99999-9999");
                    $("#cpf").mask("999.999.999-99");
                });

*/
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
