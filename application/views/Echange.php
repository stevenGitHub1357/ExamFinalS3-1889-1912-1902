<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style/header.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style/footer.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style/Echange.css') ?>">
    <title>Document</title>
</head>
<style>
    img
{
		width: 100%;
		height: 30%;
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
					<ul><li><a href="<?php echo site_url('Welcome/main') ?>">Accueil</a></li></ul>
					<ul><li><a href="<?php echo site_url('Welcome/listeArticle') ?>">Mes objets</a></li></ul>
					<ul><li><a href="<?php echo site_url('Welcome/echange')?>/<?php echo '1';?>">Listes des echanges recu</a></li></ul>
					<ul><li><a href="<?php echo site_url('Welcome/echange') ?>/<?php echo '2';?>">Listes de mes propositions</a></li></ul>
				</nav>
			</div>
		</div>
	</div>
    <?php 
        foreach ($data->result_array() as $key){
        ?>
    <section>
        <div class="row">
            <div class="col-md-offset-2 col-md-3">
                <p><img src="<?php echo base_url('assets/print/'.$key["photo1"]) ?>" alt=""> </p>
                <p>Objet de : <span><?php echo $key["desc1"]; ?></span></p>
                <p>Prix de l'objet : <span><?php echo $key["prix1"]; ?></span></p>
            </div>
            <div class="col-md-3">
                <p><img src="<?php echo base_url('assets/print/'.$key["photo2"]) ?>" alt=""> </p>
                <p>Objet de : <span><?php echo $key["desc2"]; ?></span> </p>
                <p>Prix de l'objet : <span><?php echo $key["prix2"]; ?></span> </p>
            </div>
            <?php if($action==2){?>
				
            <div class="col-md-4">
			<h1>Voici votre proposition</h1>
                <div class="row">
                    <a href="<?php echo site_url('Welcome/annuler')?>/<?php echo $key["objet1"];?>/<?php echo $key["objet2"];?>">
                    <button class="btn btn-warning">
                        Annuler
                    </button>
                    </a>
                </div>
            </div>
            <?php }?>
            <?php if($action==1){?>

            <div class="col-md-4">
			<h1>Voici une des propositions recu</h1>
                <div class="row">
                    <a href="<?php echo site_url('Welcome/accepterEchange')?>/<?php echo $key["objet2"];?>/<?php echo $key["membre1"];?>/<?php echo $key["objet1"];?>/<?php echo $key["membre2"];?>">
                    <button class="btn btn-info">
                        Accepter
                    </button>
                    </a>
                </div>
                <br>
                <br>
                <div class="row">
                    <a href="<?php echo site_url('Welcome/annuler')?>/<?php echo $key["objet1"];?>/<?php echo $key["objet2"];?>">
                    <button class="btn btn-danger">
                        Refuser
                    </button>
                    </a>
                </div>
            </div>
            <?php }?>
        </div>
    <?php } ?>
    </section>
    
</body>
</html>