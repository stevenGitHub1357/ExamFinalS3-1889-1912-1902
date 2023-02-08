<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
	<h1>Modifier categorie</h1>
	<div class="conteneur">
		<div class="row">
			<div class="col-md-offset-3 col-md-6">
				<nav>
					
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
				<form action="modifCatego" methode="get">
                    <select name="catego" id="">
                        <?php foreach($catego->result_array() as $cat){?>
                        <option value="<?php echo $cat["id_categorie"] ;?>">
                            <?php echo $cat["nom"] ;?>
                        </option>
                        <?php }?>
                    </select>
					<input type="hidden" value="<?php echo $key["id_objet"]?>" name="idObj">
					<button type="submit" class="btn btn-info">Confirmer</button>
				</form>
			</div>
			<?php } ?>
		</div>
	</section>
	<div class="row">
		<div class="col-md-offset-2 col-md-4">
			<h1>Statistique des inscrit du jour</h1>
			<h3><?php echo $Stat['membre']?></h3> <h4> personne(s) inscrit jusqu'a aujourd'huit </h4>
		</div>
		<div class="col-md-6">
			<h1>Statistique des Echange du jour</h1>
			<h3><?php echo $Stat['echange']?></h3> <h4> echange(s) jusqu'a aujourd'huit </h4>
		</div>

</body>
</html>
</body>
</html>