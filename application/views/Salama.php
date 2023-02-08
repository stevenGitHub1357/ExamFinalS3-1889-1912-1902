<?php 
	$msg = "";
	if (isset($error)) {
		$msg = $error;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style/Salama.css') ?>">
</head>
<body>
	<div class="conteneur" id="inscri">
		<div class="row">
			<div class="col-lg-6 sary">
				<img src="<?php echo base_url('assets/print/fonta.JPG') ?>">
			</div>
			<div class="col-lg-offset-1 col-lg-4 vertical">
				<p style="font-size: 20px; font-weight: bolder;">Se connecter</p>
				<button onclick="mampiseho()">Login</button><br><br>
				<p><button class="bouton" onclick="mampiseho1()">S'incrire</button> pour effectuer des echanges</p>
			</div>
			<p style="color: red;"><?php echo $msg; ?></p>
		</div>
	</div>
	<div class="conteneur" id="conexe">
		<div class="row">
			<div class="col-lg-6 sary">
				<img src="<?php echo base_url('assets/print/fonta.JPG') ?>">
			</div>
			<div class="col-lg-offset-1 col-lg-4 vertical">
				<h2>Bienvenue</h2>
				<form method="post" action="<?php echo site_url('Welcome/accepter') ?>">
					<label for="">Pseudo</label>
					<input type="text" name="nom" class="form-control" value="Admin" placeholder="Entrer votre Pseudo">
					<label for="">Mot de passe</label>
					<input type="text" name="mdp" class="form-control" value="admin" placeholder="Entrer votre mot de passe"><br>
					<button type="submit">Se connecter</button>
				</form>
			</div>
		</div>
	</div>

	<div class="conteneur" id="new">
		<div class="row">
			<div class="col-lg-6 sary">
				<img class="logo" src="<?php echo base_url('assets/print/fonta.JPG') ?>">
			</div>
			<div class="col-lg-offset-1 col-lg-4 verti">
	<form method="post" action="<?php echo site_url('Welcome/inscription') ?>">
		<label>Nom : </label>
		<input type="text" name="nom" placeholder="Entrer votre nom" class="form-control">
		<label>Prenom : </label>
		<input type="text" name="prenom" placeholder="Entrer votre prenom" class="form-control">
		<label>Sexe : </label><br>
		<label>Home</label>
		<input type="radio" name="sexe" checked="checked" value="M">
		<label>Femme</label>
		<input type="radio" name="sexe" value="F" ><br>
		<label>Date de naissance : </label>
		<input type="date" name="dtn" class="form-control">
		<label>E-mail</label>
		<input type="Email" name="email" class="form-control" placeholder="Votre E-mail">
		<label>Mot de passe</label>
		<input type="text" name="mdp" class="form-control" placeholder="Votre mot de passe"><br>
		<button style="margin-left: 15%;" type="submit"><span class="glyphicon glyphicon-ok-sign"></span>S'inscrire</button>
	</form>
	</div>
	</div>
	</div>
</body>
<script>
	function mampiseho(){
		var div = document.getElementById('inscri');
		div.style.transform = "translateY(100%)";
		div.style.opacity = 0;
		var div1 = document.getElementById('conexe');
		div1.style.transform = "translateY(-115%)";
		div1.style.opacity = 1;
	}

	function mampiseho1(){
		var div = document.getElementById('inscri');
		div.style.transform = "translateY(100%)";
		div.style.opacity = 0;
		var div1 = document.getElementById('new');
		div1.style.transform = "translateY(-180%)";
		div1.style.opacity = 1;
	}
</script>
</html>