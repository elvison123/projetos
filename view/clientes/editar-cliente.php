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

<div class="container-fluid">
    <form action="../../controller/ClienteController.php" method="GET">
		<input type="hidden" name="acao" value="editar">
                <input type="hidden" name="id_cliente" value="<?php echo ltrim($_GET['id_cliente']);?>" >
		<div class="row">
			<div class="form-group col-md-4 col-md-offset-2">
				<label for="nome">Nome completo</label> 
                                <input type="text" class="form-control" name="nome" id="nome"  value="<?php echo ltrim($_GET["nome"]);?>" vaplaceholder="Digite o nome do cliente">
			</div>

		</div>
		<div class="row">
			<div class="form-group col-md-4 col-md-offset-2">
				<label for="email">E-mail</label> 
                                <input type="email"class="form-control" name="email" id="email"value="<?php echo ltrim($_GET["email"]);?>" placeholder="Digite o email do cliente">
			</div>
			<div class="form-group col-md-1 ">
				<label for="senha">Senha</label> 
                                <input type="password"class="form-control"  name="senha" value="<?php echo ltrim($_GET["senha"]);?>"id="senha" placeholder="Digite a senha">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-3 col-md-offset-2">
				<label for="telefone">telefone</label> 
                                <input type="text"class="form-control" name="telefone"value="<?php echo ltrim($_GET["telefone"]);?>" id="telefone" placeholder="Digite o telefone">
			</div>
			<div class="form-group col-md-2">
				<label for="cfp">CPF</label> 
                                <input type="text"class="form-control"  name="cpf" id="cpf"value="<?php echo ltrim($_GET["cpf"]);?>" placeholder="Digite o cpf">
			</div>
		</div>
		<div class="row">	
			
			<div class="form-group col-md-5 col-md-offset-2">
				<label for="empresa">Empresa</label> 
                                <input type="text"class="form-control"  name="empresa" id="empresa" value="<?php echo ltrim($_GET["empresa"]);?>" placeholder="Digite o nome da empresa">
			</div>
		</div>
		<div class="row">	
			
			<div class="form-group col-md-5 col-md-offset-2">
				<label for="endereco">Endereco</label> 
                                <input type="text"class="form-control"  name="endereco" id="endereco" value="<?php echo ltrim($_GET["endereco"]);?>"placeholder="Digite o endereco">
			</div>
		</div>
		
		
		

		 <div class="form-group col-md-offset-2">
                     <input type="submit"value="Cadastrar">
                     
  		</div>


	</form>
</div>
   




</body>
</html>