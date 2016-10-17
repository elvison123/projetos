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
        <script src="../js/valida_cpf_cnpj.js"></script>-->
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
                <li><a href="cadastrar-cliente.php">Cadastrar Clientes</a></li>
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
    <div class="row">
        <div class="col-xs-4">
            <h1 class="h1">Editar Clientes</h1>
        </div>
    </div>

<div class="container">
    <form action="../../controller/ClienteController.php" method="GET" id="formcad" novalidate="">
		<input type="hidden" name="acao" value="editar">
                <input type="hidden" name="id_cliente" value="<?php echo ltrim($_GET['id_cliente']);?>" >
		
                <div class="form-group row">
			<label for="nome" class="col-xs-2 col-form-label">Nome completo</label> 
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="nome" id="nome" required maxlength="50" value="<?php echo ltrim($_GET["nome"]);?>" placeholder="Digite o nome do cliente">
			</div>
                </div>
        	<div class="form-group row">
			<label for="email" class="col-xs-2 col-form-label">E-mail</label> 
                        <div class="col-xs-8" >
                            <input type="email" class="form-control" name="email" id="email" required maxlength="50" value="<?php echo ltrim($_GET["email"]);?>" placeholder="Digite o email do cliente">
			</div>
                </div>
		               
                <div class="form-group row">
                    <label  for="login" class="col-xs-2 col-form-label">Login</label>
                    <div class="col-xs-8">
                        <input  type="text"class="form-control" name="login" id="login" value="<?php echo ltrim($_GET["login"]) ?>" required maxlength="20" placeholder="Digite o nome de acesso do usuario">
                    </div>
                </div>
                
                
                <div class="form-group row ">
			<label for="senha" class="col-xs-2 col-form-label">Senha</label> 
                        <div class="col-xs-8" >    
                            <input type="password"class="form-control"  name="senha" required maxlength="20" value="<?php echo ltrim($_GET["senha"]);?>"id="senha" placeholder="Digite a senha">
                        </div>
		</div>
                
                <div class="form-group row">
                <label for="senhaRep"  class="col-xs-2 col-form-label" >Confirme Senha</label>
                <div class="col-xs-8">
                    <input type="password"class="form-control"  name="senhaRep" value="<?php echo ltrim($_GET["senha"]) ?>" id="senhaRep" required maxlength="20" placeholder="Digite a senha">
                </div>
                </div>
                
		<div class="form-group row">
			<label for="telefone" class="col-xs-2 col-form-label">Telefone</label> 
                        <div class="col-xs-8">
                                <input type="text"class="form-control" name="telefone"value="<?php echo ltrim($_GET["telefone"]);?>" id="telefone" required maxlength="14" placeholder="Digite o telefone">
			</div>
                </div>
                
			<div class="form-group row">
				<label for="cfp" class="col-xs-2 col-form-label">CPF</label> 
                                <div class="col-xs-8">
                                    <input type="text"class="form-control cpf_cnpj"  name="cpf" id="cpf"value="<?php echo ltrim($_GET["cpf"]);?>" required maxlength="14" placeholder="Digite o cpf">
			</div>
		</div>
		
            <div class=" form-group row">	
                <label for="empresa" class="col-xs-2 col-form-label">Empresa</label> 
                    <div class="col-xs-8">
                        <input type="text"class="form-control"  name="empresa" id="empresa" value="<?php echo ltrim($_GET["empresa"]);?>" required maxlength="50" placeholder="Digite o nome da empresa">
		</div>
            </div>		
            <div class="form-group row ">
                <label for="endereco" class="col-xs-2 col-form-label">Endereço</label> 
                    <div class="col-xs-8">
                        <input type="text"class="form-control"  name="endereco" id="endereco" value="<?php echo ltrim($_GET["endereco"]);?>" required maxlength="50" placeholder="Digite o endereco">
                    </div>
            </div>
		
		
		

		 <div class="form-group col-md-offset-0">
                     <input type="submit"value="Cadastrar" class="btn-default">
                     
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
                            login: {
                                required: true,
                                maxlength: 20

                            },
                            senha: {
                                required: true,
                                rangelength: [4, 20]

                            },
                            senhaRep: {
                                required: true,
                                equalTo: "#senha"

                            },
                            
                            cpf: {
                                required: true,
                                //minlength: 14,
                                //maxlength: 14

                            },
                            empresa: {
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
                            login: {
                                required: "Preenchimento obrigatório!!",
                                maxlength: "Deve conter no máximo 20 caracteres."

                            },
                            senha: {
                                required: "Preenchimento obrigatório!!",
                                rangelength: "Preencher com no minimo 4 e no máximo 20 caracteres!"

                            },
                            senhaRep: {
                                required: "Preenchimento obrigatório!!",
                                equalTo: "Senhas diferentes"

                            },
                            
                            cpf: {
                                required: "Preenchimento obrigatório!!",
                              //  minlength: "Deve conter no minimo 14 caracteres.",
                              //  maxlength: "Deve conter no máximo 14 caracteres."

                            },
                            
                            telefone: {
                                required: "Preenchimento obrigatório!!",
                                maxlength: "Deve conter no máximo 14 caracteres."
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

                });
                $(function () {
                    $("#telefone").mask("(99)99999-9999");
                    $("#cpf").mask("999.999.999-99");
                });


            </script>



</body>
</html>
