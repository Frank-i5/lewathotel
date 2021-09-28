<?php echo css('forum-style') ?>

	
 <div class="content-wrapper">
 		<section class="content-header">	
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(array('Administration','index')); ?>"><i class="fa fa-dashboard"></i>Acceuil</a></li>
        <li><a href="#">Gestion des Services</a></li>
        <li class="active">Liste des Services</li>
      </ol>
	    <div class="col-md-offset-1 col-md-8 " style="text-align: center;">
				<h2>Liste de tout les Services en Cours</h2>
			</div>
			<div class="col-md-2" style="margin-top:15px;">
			 <?php 	if (isset($_SESSION['ADMIN'])) { ?>
				 <a href="<?php echo site_url(array('Administration','formulaireAddService')) ?>" class="btn btn-success">
	 			<span class="glyphicon glyphicon-plus"></span>Ajouter un Service</a>
			<?php }else{ ?> 
				<a href="<?php echo site_url(array('Community_Manager','formulaireAddService')) ?>" class="btn btn-success"> <span class="glyphicon glyphicon-plus"></span>Ajouter un Service</a>
			<?php 	} ?>
	 
			</div>
		</section>
    <section class="content">
			<table class=" dataTables_filter table-responsive table-bordered" id="myTable">
				<thead >
					<th>&nbsp</th>
					<th  >Service</th>		
					<th  >Date-creation</th>
					<th  >Offre</th>
					<th  >Auteur</th>
					<th style="<?php if (isset($_SESSION['Community_Manager'])) {
						echo 'display: block';
					} ?>" >action</th>
				</thead>	
				<tbody>
          <?php for ($i=0; $i<$services['total'];$i++) { ?> 
						<tr>
							<td class="text-center"><?php echo $i ?></td>				
							<td class="text-center"><?php echo $services[$i]['nom_service']?> </td>
							<td class="text-center"><?php echo $services[$i]['date_creation']?> </td>	
							<td  class="text-center"><?php echo $services[$i]['offre'];   ?> </td> 
							<td class="text-center" ><?php echo $services[$i]['nom'];   ?> </td> 



							<!-- Actions de l administrateur -->
							<td class="text-center" style="<?php if (isset($_SESSION['Community_Manager'])) {
						       echo 'display: none';
					         } ?>">
							 	<form action="<?php echo site_url(array('Administration','supprimerService')) ?>" method="post" style="display: inline-block;">
							 	  <input type="hidden" value="<?php echo $services[$i]['id'] ?>" name="id">
							 			<button class="boutton" type="submit" disabled="true" ><i class="fa fa-trash"></i> </button>
							 			 
							 	</form>
							</td> 


							<!-- actions du community manager -->
							<td class="text-center" style="<?php if (isset($_SESSION['ADMIN'])) {
						       echo 'display: none';
					         } ?>">
							 	<form action="<?php echo site_url(array('Community_Manager','supprimerService')) ?>" method="post" style="display: inline-block;">  
							 	 <input type="hidden" value="<?php echo $services[$i]['id'] ?>" name="id">							 			 
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