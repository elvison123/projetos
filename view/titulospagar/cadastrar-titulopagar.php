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
        <title>Cadastrar</title>
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
<!--        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>-->        
        <script src="../js/jquery-3.1.0.min.js"></script>
        <script src="../js/jquery.validate.min.js"></script>
        <script src="../js/jquery.maskedinput.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery.maskMoney.js"></script>
        <script src="../js/testa_data.js"></script>
        <script src="../js/exemplo_1.js"></script>
        
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
    <?php if (isset($_GET['status'])&&(!$_GET['status']==null)) { ?>
                <div class="alert alert-info">
                    <center><?php echo $_GET['status']; ?></center>
                </div>
           

        <?php }; ?>
    <div class="row">
        <div class="col-xs-4">
            <h1 class="h1">Cadastrar Títulos a Pagar </h1>
        </div>
    </div>

        
    <form action="../../controller/TituloPagarController.php" method="GET" id="formcad" novalidate="" >
                <input type="hidden" name="acao" value="cadastrartitulo">

                <div class="form-group row">
                    <label for="id_fornecedor" class="col-xs-2 col-form-label"  >Fornecedores Cadastrados</label>
                    <div class="col-xs-10">
                        
                        <select name="id_fornecedor">
                               <?php session_start() ?>
            <?php if (isset($_SESSION["fornecedor1"])){foreach ($_SESSION["fornecedor1"] as $fornecedor):?> 
                                    <option value="<?php echo $fornecedor['id_fornecedor']; ?>"><?php echo $fornecedor['nome']; ?></option>
                               <?php endforeach;}?>  
                        </select>
                        
                    </div>
                </div>
                <div class="form-group row">
                    <label  for="valor" class="col-xs-2 col-form-label" >Valor Documento</label>
                    <div class="col-xs-10">
                        <input type="text"class="form-control testa_data"  name="valor" id="valor"  required maxlength="14" placeholder="Digite o valor">
                    </div>
                </div>
                <div class="form-group row">
                    <label  for="descricao" class="col-xs-2 col-form-label" >Descrição</label>
                    <div class="col-xs-10">
                        <input type="text"class="form-control"  name="descricao" id="descricao"  required maxlength="50" placeholder="Digite a descrição do produto">
                    </div>
                </div>
                <div class="form-group row">
                    <label  for="documento" class="col-xs-2 col-form-label" >Documento</label>
                    <div class="col-xs-10">
                        <input type="text"class="form-control"  name="documento" id="documento"  required maxlength="50" placeholder="Digite o numero do documento">
                    </div>
                </div>
                <div class="form-group row">
                    <label  for="situacao" class="col-xs-2 col-form-label">Situação</label>
                    <div class="col-xs-10">
                        <select name="situacao">
                            <option value="Nao devedor">Nao devedor</option>
                            <option value="Devedor">Devedor</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label  for="parcela" class="col-xs-2 col-form-label" >Numero de parcelas</label>
                    <div class="col-xs-10">
                        <select name="parcela">
                            <option value="1">1x</option>
                            <option value="2">2x</option>
                            <option value="3">3x</option>
                            <option value="4">4x</option>
                            <option value="5">5x</option>
                            <option value="6">6x</option>
                            <option value="7">7x</option>
                            <option value="8">8x</option>
                            <option value="9">9x</option>
                            <option value="10">10x</option>
                            <option value="11">11x</option>
                            <option value="12">12x</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="dataoperacao" class="col-xs-2 col-form-label" >Data da operação</label>
<?php date_default_timezone_set('America/Sao_Paulo');
$date = date('d/m/Y'); ?>

                    <div class="col-xs-10">
                        <input  type="text"class="form-control"  name="dataoperacao" id="dataoperacao"   value="<?php echo $date; ?>"required maxlength="10" placeholder="Data da operação">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="datavencimento" class="col-xs-2 col-form-label" >Data de Vencimento</label>
                    <div class="col-xs-10">
                        <input type="text"class="form-control"  name="datavencimento" id="datavencimento" required maxlength="10" placeholder="Digite a data de vencimento">
                    </div>
                </div>



                <div class="row">
                <div class="col-xs-2"></div>
                <div class="col-xs-6">
                <input class="btn btn-success" type="submit" onclick="clicked"id="myBtn" value="Cadastrar">
                </div>
                <div class="col-xs-2">
                    <a class="btn btn-default" href="../../controller/TituloPagarController.php?acao=listartitulos">Exibir Cadastro</a>
                </div>
            </div>
            </form>

            </div>
                <script>

                    $(function () {
                        $("#valor").maskMoney({symbol: 'R$ ',
                            showSymbol: true, thousands: '.', decimal: ',', symbolStay: true});
                    })


                    $(document).ready(function () {
                        $("#formcad").validate({
                            rules: {
                                id_fornecedor: {
                                    required: true,
                                    maxlength:11


                                },
                                valor: {
                                    required: true,
                                    maxlength:20

                                },
                                descricao: {
                                    required: true,
                                    maxlength:50

                                },
                                documento: {
                                    required: true,
                                    maxlength:100

                                },
                                situacao: {
                                    required: true,
                                    maxlength:100


                                },
                                parcela: {
                                    required: true,
                                    maxlength:100


                                },
                                dataoperacao: {
                                    required: true,
                                    maxlength:10


                                },
                                datavencimento: {
                                    required: true,
                                    maxlength:10,
                                    ValidarData:true


                                }

                            },
                            messages: {
                                id_fornecedor: {
                                    required: "Selecione o Fornecedor!",
                                    maxlength:"No maximo 11 caracteres"

                                },
                                valor: {
                                    required: "Preenchimento obrigatório!!",
                                    maxlength:"No maximo 14 caracteres"

                                },
                                descricao: {
                                    required: "Preenchimento obrigatório!!",
                                    maxlength:"No maximo 100 caracteres"

                                },
                                documento: {
                                    required: "Preenchimento obrigatório!!",
                                    maxlength:"No maximo 100 caracteres"

                                },
                                situacao: {
                                    required: "Preenchimento obrigatório!!",
                                    maxlength:"No maximo 100 caracteres"


                                },
                                parcela: {
                                    required: "Preenchimento obrigatório!!",
                                    maxlength:"No maximo 100 caracteres"


                                },
                                dataoperacao: {
                                    required: "Preenchimento obrigatório!!",
                                    maxlength:"No maximo 10 caracteres"
                                    


                                },
                                datavencimento: {
                                    required: "Preenchimento obrigatório!!",
                                    maxlength:"No maximo 10 caracteres",
                                    ValidarData: "A data deve ser superior ou igual à data atual"
                                    

                                }

                            }

                        });

                    });
                    
                </script>
                <script>
                    $(function () {
                        $("#dataoperacao").mask("99/99/9999");
                        $("#datavencimento").mask("99/99/9999");
                        $("$valor").maskMoney({symbol:'R$ ', 
showSymbol:true, thousands:'.', decimal:',', symbolStay: true});
                    });
                </script>
                    



        </div>





    </body>
</html>
