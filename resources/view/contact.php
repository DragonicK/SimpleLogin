<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Contato</title>

        <link href="resources/css/site.css" rel="stylesheet" type="text/css">
        <link href="resources/css/bootstrap.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div style="display: flex; justify-content: center; margin-top: 75px;"row container-fluid"> 
			<div class="col-md-8 col-md-offset-2">

				<form action="contato#contato_do_site" method="post">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Nome</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Nome">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<labe>Assunto</label>
								<input type="text" class="form-control" id="subject" name="subject" placeholder="Assunto">
							</div>
						</div>
					</div>

					<br />

					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Email</label>
								<input type="email" id="email" name="email" class="form-control" placeholder="seuemail@email.com">
							</div>
						</div>

						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Seu WhatsApp:</label>
								<input type="tel" placeholder="(99) 99999-9999" data-mask="(00) 00000-0000" maxlength="15" id="phone" name="phone" value="" class="form-control">
							</div>
						</div>
					</div>

					<br />

					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="form-group">
								<label>Mensagem</label>
								<textarea class="form-control" type='text' name='message' id='message' placeholder='Escrever mensagem ...'></textarea>
							</div>
						</div>
					</div>

					<br />

					<hr style="border-color:#ddd;">

			 		<div class="text-center">
			 			<button type="submit" name="sendmsg" class="btn btn-primary">
			 				Enviar Mensagem
			 			</button>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>