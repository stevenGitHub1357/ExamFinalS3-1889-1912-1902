<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style/header.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/style/footer.css') ?>">
</head>
<style type="text/css">
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
	table{
		text-align: center;
		border-collapse: collapse;
	}
	th,tr,td{
		border: 2px solid black;
	}

</style>
<body>
	<div class="conteneur">
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<nav>
					<ul><li><a href="<?php echo site_url('Welcome/main') ?>">Profil</a></li></ul>
					<ul><li><a href="<?php echo site_url('Welcome/listeArticle') ?>">Mes objets</a></li></ul>
					<ul><li><a href="<?php echo site_url('Welcome/echange')?>/<?php echo '1';?>">Liste des echanges</a></li></ul>
					<ul><li><a href="<?php echo site_url('Welcome/echange') ?>/<?php echo '2';?>">Liste des propositions</a></li></ul>
					<ul><li><a href="<?php echo site_url('Welcome/tantara') ?>">Historique</a></li></ul>
				</nav>
			</div>
		</div>
	</div>
	<section>
		<div class="row">
            <h2 style="margin-left:20%; font-family:cursive; color:darkblue;">Historique des echanges</h2>
			<div class="col-md-12">
				<table>
					<th>Photo1</th>
					<th>Description</th>
					<th>Prix</th>
					<th>Photo2</th>
					<th>Description</th>
					<th>Prix</th>
					<th>Date d'echange</th>
				
				<?php foreach ($info->result_array() as $key ) {
					
				?>
				<tr>
					<td><img style="width: 20%;" src="<?php echo base_url('assets/print/'.$key["photo1"]) ?>"></td>
					<td><?php echo $key['desc1']; ?></td>
					<td><?php echo $key['prix1']; ?></td>
					<td><img style="width: 20%;" src="<?php echo base_url('assets/print/'.$key["photo2"]) ?>"></td>
					<td><?php echo $key['desc2']; ?></td>
					<td><?php echo $key['prix2']; ?></td>
					<td><?php echo $key['daty']; ?></td>
				</tr>
				<?php } ?>
				</table>
			</div>
		</div>
	</section>
</body>
</html>