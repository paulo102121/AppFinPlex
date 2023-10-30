<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="assets/css/newstyle.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Faça seu login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
			
				<div class="col-md-12 col-lg-10">
					       <? if(isset($msg)){?>
		      <div class="alert alert-danger" role="alert">
  <?= $msg ?>
</div>
<?}?>
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(assets/img/bg-1.png); background-size: contain;
background-repeat: no-repeat;">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Login</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
			      	
					<form class="signin-form" action="./?c=login" method="POST">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Usuário</label>
			      			<input type="email" name="email" class="form-control" placeholder="Insira seu Email..." required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Senha</label>
		              <input type="password" class="form-control" name="senha" placeholder="Insira sua Senha..." required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Entrar</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Lembrar de mim
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="./?c=login&m=esqueceuSenha" id="esqueceuSenha">Esqueceu a senha?</a>
									</div>
		            </div>
		          </form>
		          <p class="text-center">Não tem uma? 
		          <a href="./?c=cadastro" data-toggle="tab" id="criarConta">Criar nova conta</a>
		          
		        </div>
		        
		      </div>
	
				</div>
				
			</div>
			
		</div>

	</section>

	<script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/main.js"></script>
<script>


setTimeout(function(){
    $('.alert').fadeToggle("slow");
}, 2000);
</script>
	</body>
</html>