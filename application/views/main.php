<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style/header.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style/footer.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style/main.css') ?>">
</head>
<style type="text/css">
	img
	{
		width: 100%;
		height: 50%;
		box-shadow: 2px 2px 3px black;
		border-radius: 2%;
	}
	section
	{
		margin-top: 4%;
	}
	section .col-md-3
	{
		padding-left: 5%;
	}
	section p{
		font-weight: bold;
		font-size: 15px;
	}
	section p span{
		font-weight: bolder;
		font-size: 15px;
		color: darkblue;
		font-family: cursive;
	}
	nav ul{
		margin-top: 2%;
		list-style: none;
		display: inline-block;
	}
	
	nav ul li a
	{
		border: 1px solid darkred;
		color: gray;
		border-radius: 15px;
		font-weight: bold;
		font-family: tahoma;
		text-align: center;
		text-decoration: none;
		letter-spacing: 2px;
		padding: 2px 15px 2px 15px;
		text-shadow: 2px 2px 2px black;
		font-size: 20px;
	}
	ul li a:hover{
		background-color: darkred;
		color: white;
	}

</style>
<body>
	<div class="conteneur">
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<nav>
					<ul><li><a href="<?php echo site_url('Welcome/main') ?>">Profil</a></li></ul>
					<ul><li><a href="<?php echo site_url('Welcome/listeArticle') ?>">Mes objets</a></li></ul>
					<ul><li><a href="<?php echo site_url('Welcome/echange')?>/<?php echo '1';?>">Liste des echanges recu</a></li></ul>
					<ul><li><a href="<?php echo site_url('Welcome/echange') ?>/<?php echo '2';?>">Liste de mes propositions</a></li></ul>
					<ul><li><a href="<?php echo site_url('Welcome/tantara') ?>">Historique</a></li></ul>
				</nav>
			</div>
		</div>
	</div>
	<section>
	<div class="row">
		<div class="col-md-offset-3 col-md-9">
			<?php 
				if(isset($_GET['m1'])){
			?>
			<p class="alert alert-info alert-dismissable col-lg-8"> 
            <button type="button" class="close" datadismiss="alert">x</button>  
            <strong>Bravo</strong> Votre demande est en cours!! </p>
			<?php } ?>
		</div>
	</div>
		<div class="row">
			<?php 
				foreach ($info->result_array() as $key) {
			?>
			<div class="col-md-3">
				<p><?php echo $key["nom"] ?> <span><?php echo $key["prenom"] ?></span></p>
				<img src="<?php echo base_url('assets/print/'.$key["image"]) ?>">
				<p>Description : <span><?php echo $key["desciption"];?></span></p>
				<p>Prix estimatif : <span><?php echo $key["prix"];?> $</span></p>
				<form method="get" action="<?php echo site_url('Welcome/part1')?>">
					<input type="text" name="idUser" hidden="hidden" value="<?php echo $this->session->userdata('user')['id_membre']; ?>">
					<input type="text" name="idEnLigne" hidden="hidden" value="<?php echo $key["id_membre"]; ?>">
					<input type="text" name="objetViser" hidden="hidden" value="<?php echo $key["id_objet"]; ?>">
					<button class="btn btn-info">Echanger</button>
				</form>
			</div>
			<?php } ?>
		</div>
	</section>
</body>
</html>