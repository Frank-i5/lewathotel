<?php echo css('forum-style') ?>


<style>
	
	.cl{
	width: 100px;
	height: 100px;
	border-radius: 50%;
}

.bouttom{
	color: blue;
	border: none;
	background-color: inherit !important;

}
</style>
	<div class="content-wrapper" style="background-color:white;">

		<section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php if(isset($_SESSION['ADMIN'])) { echo site_url(array('Administration','index')); } else { echo site_url(array('Community_Manager','index')); } ?>"><i class="fa fa-dashboard"></i> Acceuil </a></li>
        <li><a href="#">Gestion des Offres</a></li>
        <li class="active">Liste des Offres</li>
      </ol>
    </section>
    
   
		<div class="col-md-offset-1 col-md-8 " style="text-align: center;">
			<h2 style="margin-top:40px; color:#00C2A9;">Liste de toutes les Offres en cours</h2>
			<div style="color:green;"> <?php if (isset($_SESSION['message_save'])) { echo $_SESSION['message_save'] ;} ?></div>
		</div>
		
		<div class="col-md-2" style="margin-top:40px;"><a href="<?php if(isset($_SESSION['ADMIN'])) { echo site_url(array('Administration','formulaireAddOffre'));} else { echo site_url(array('Community_Manager','formAddOffre')); } ?>" class="btn" style="background-color:#00C2A9; color:white;"> <span class="glyphicon glyphicon-plus"></span>Ajouter une Offre</a></div>
    <!-- Content Header (Page header) -->
    <section class="content" style="margin-top:80px;">
    	<?php if (isset($allservice)) {?>
			<table class=" dataTables_filter table-responsive table-bordered" id="myTable">
				<thead >
					<th>&nbsp</th>	
					<th  >Offre</th>
					<th  >Créateur</th>
					<th  >Date-creation</th>
					<th>action</th>
				</thead>	
				<tbody>
               <?php for ($i=0; $i<$nom['total'];$i++){ ?> 
						<tr>
							<td class="text-center"><?php echo $i ?></td>		
							<td class="text-center">
				<form role="form" action="<?php if(isset($_SESSION['ADMIN'])) { echo site_url(array('Administration','service_offre'));} else { echo site_url(array('Community_Manager','serviceOffre')); } ?>" method="post">
					<input type="hidden" value="<?php echo $nom[$i]['id'] ?>" name='id'>
					<input type="hidden" value="<?php echo $nom[$i]['nom_offre'] ?>" name='nom_offre'>
					<input type="submit" value="<?php echo $nom[$i]['nom_offre'];?>" class="bouttom">
				</form>
				</td>
				<td  class="text-center"><?php echo $nom[$i]['createur'];   ?> </td> 
				 <td class="text-center"><?php echo $nom[$i]['date_creation'];   ?> </td> 
							 <td class="text-center">
							 		<form action="<?php if(isset($_SESSION['ADMIN'])) { echo site_url(array('Administration','formulairemodifOffre')); } else { echo site_url(array('Community_Manager','FormModifOffre')); } ?>" method="post" style="display:inline-block;">
							 			<input type="hidden" value="<?php echo $nom[$i]['id'] ?>" name="id">
							 			<button type="submit" title="Modifier l'Offre?" class="bouttom"><i class="fa fa-edit" style="font-size:20px; color:black;"></i> </button> 
							 		</form>
							 		<form action="<?php if(isset($_SESSION['ADMIN'])) { echo site_url(array('Administration','supprimerOffre')); } else { echo site_url(array('Community_Manager','supprOffre')); } ?>" method="post" style="display:inline-block;">
							 			<input type="hidden" value="<?php echo $nom[$i]['id'] ?>" name="id_offre">
							 			<?php if ($allservice[$i]['total']==0){ ?>
							 				<button type="submit" title="Supprimer l'Offre?" class="bouttom"><i class="fa fa-trash" style="font-size:20px; color:black;"></i> </button>
							 				<?php }else{?>
							 					<button type="submit" disabled="true" title="SUPPRIMER" class="bouttom"><i class="fa fa-trash"></i> </button>
							 				<?php } ?>
							 		</form>
							 </td>
						</tr>
				<?php }  ?>
				</tbody>	
			</table>
			<?php }else{echo $message ;} ?>	
   </section>
   <?php 	
			unset($_SESSION['message_save']);
		 ?>
</div>