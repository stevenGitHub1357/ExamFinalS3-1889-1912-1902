<header>
	<div class="row">
		<div class="col-md-offset-1 col-md-7">
			<p>BIENVENU DANS <span>TAKALO TAKALO</span></p>
		</div>
		<div class="col-md-4">
			
				
				<form method="post" action="<?php echo site_url('Welcome/deconexion') ?>">
				<p><span><?php echo $this->session->userdata('user')['prenom']; ?></span>
		    	<button type="submit" class="btn btn-danger">Deconnexion</button></p>
			</form>
				<form class="navbar-form pull-right" method="get"> 
						<select name="categorie">
							<option value="1">Vetement</option>
							<option value="2">Technologie</option>
							<option value="3">Accessoir</option>
							<option value="4">Autre</option>
							<option value="1">Sport</option>
						</select>               
		      	        <input type="text" name="description" style="width:150px" class="input-small" placeholder="Recherche">         
		      	        <button type="submit" class="btn btn-info btn-xm"><span class="glyphicon glyphicon-eye-open"></span> Chercher</button>        
		        </form> 
		    
		</div>
	</div>
</header>
