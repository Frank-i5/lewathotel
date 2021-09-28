<?php echo css('forum-style') ?>

<style>
	
	/*.cl{
	width: 100px;
	height: 100px;
}

.bouttom{
	color: blue;
	border: none;
	background-color: inherit !important;
}*/
</style>	
 <div class="content-wrapper">
 		<section class="content-header">	
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php  echo site_url(array('Administration','index')); ?>"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li><a href="#">Gestion des Produits & Reservations</a></li>
        <li class="active">Liste des Photos des Produits</li>
      </ol>
	    <div class="col-md-offset-1 col-md-8 " style="text-align: center;">
				<h2 style="margin-top:40px; color:#00C2A9;">Liste de toutes les Photos des Produits En Cours</h2>
			</div>
			<div class="col-md-2" style="margin-top:40px;">
			 <?php 	if (isset($_SESSION['ADMIN'])) { ?>
				 <a href="<?php echo site_url(array('Administration','formulaireAddProduit')) ?>" class="btn btn-success" style="background-color:#00C2A9; color:white;">
	 			<span class="glyphicon glyphicon-plus"></span>Ajouter une Photo du Produit</a>
			<?php }else{ ?> 
				<a href="<?php echo site_url(array('Community_Manager','formulaireAddProduit')) ?>" class="btn btn-success"> <span class="glyphicon glyphicon-plus"></span>Ajouter une Photo du Produit</a>
			<?php 	} ?>
	 
			</div>
		</section>
    <section class="content">
    	<?php print_r($photoproduits) ?>
			<table class=" dataTables_filter table-responsive table-bordered" id="myTable">
				<thead >
					<th>&nbsp</th>	
					<th  >Photo</th>	
					<th  >Date-creation</th>
					<th  >Produit</th>
					<th style="<?php  if (isset($_SESSION['Community_Manager'])) {
						echo 'display: block';
					} ?>" >action</th>
				</thead>	
				<tbody>

          <?php $j=1; for ($i=0; $i<$photoproduits['total'];$i++) { ?> 
						<tr>
							<td class="text-center"><?php echo $j; $j++; ?></td>			
							<td class="text-center"><?php echo $photoproduits[$i]['photo']?> </td>
							<td class="text-center"><?php echo $photoproduits[$i]['date_creation']?> </td>	
							<td  class="text-center"><?php echo $photoproduits[$i]['produit'];   ?> </td> 



							<!-- Actions de l administrateur -->
							<td class="text-center" style="<?php if (isset($_SESSION['Community_Manager'])) {
						       echo 'display: none';
					         } ?>">
							 	<form action="<?php echo site_url(array('Administration','supprimerPhotoP')) ?>" method="post" style="display: inline-block;">
							 	  <input type="hidden" value="<?php echo $photoproduits[$i]['id'] ?>" name="id">
							 		<button class="boutton" type="submit"  ><i class="fa fa-trash"></i> </button>
							 			 
							 	</form>
							 	<form action="<?php echo site_url(array('Administration','formcommenterProduit')) ?>" method="post" style="display: inline-block;">
							 		<input type="hidden" value="<?php echo $photoproduits[$i]['id'] ?>" name="id">
							 		<input type="hidden" value="<?php echo $photoproduits[$i]['photo'] ?>" name="photo">
							 		<button class="boutton" type="submit"><i class="fa fa-comment"></i> </button>
							 	</form>
							 	<form action="<?php echo site_url(array('Administration','formodifierphotoproduit')) ?>" style="display:inline-block;" method="post">
							 		<input type="hidden" value="<?php echo $photoproduits[$i]['id'] ?>" name="id_photo_produit">
							 		<input type="hidden" value="<?php echo $photoproduits[$i]['photo'] ?>" name="photo">
							 		 <button class="boutton" type="submit" title="Editer" ><i class="fa fa-edit"></i> </button>
							 	</form>
							</td> 


							<!-- actions du moderateur -->
							<td class="text-center" style="<?php if (isset($_SESSION['ADMIN'])) {
						       echo 'display: block';
					         } ?>">
							 	<form action="<?php echo site_url(array('Administration','supprimerPhotoP')) ?>" method="post" style="display: inline-block;">  
							 	 <input type="hidden" value="<?php echo $photoproduits[$i]['id_produit'] ?>" name="id">
							 	 <button class="boutton" type="submit"  ><i class="fa fa-trash"></i> </button>
							 			 
							 	</form>
							 	<form action="<?php echo site_url(array('Administration','formreserverProduit')) ?>" method="post" style="display: inline-block;">
							 		<input type="hidden" value="<?php echo $photoproduits[$i]['id_produit'] ?>" name="id">
							 		<input type="hidden" value="<?php echo $photoproduits[$i]['photo'] ?>" name="photo">
							 		<!-- <input type="hidden" value="<?php echo $_SESSION['ADMIN']['id_service'] ?>" name="id_user"> -->
							 		<button class="boutton" type="submit"><i class="fa fa-comment"></i> </button>
							 	</form>
							 	<form action="<?php echo site_url(array('Administration','formodifierphotoproduit')) ?>" style="display:inline-block;" method="post">
							 		<input type="hidden" value="<?php echo $photoproduits[$i]['id_produit'] ?>" name="id_produit">
							 		<input type="hidden" value="<?php echo $photoproduits[$i]['photo'] ?>" name="photo">
							 		 <button class="boutton" type="submit" title="Editer" ><i class="fa fa-edit"></i> </button>
							 	</form>
							</td>
						</tr>
				<?php }  ?>
				</tbody>	
			</table>
			
		</section>	
</div>
<?php 	echo js('app'); ?>
<?php echo js('jquery-3.6.0.min'); ?>