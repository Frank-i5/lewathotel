<div class="content-wrapper">
	<section class="content-header">
	  <h1>
	    <small></small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="<?php if(isset($_SESSION['ADMIN'])) { echo site_url(array('Administration','index')); } else { echo site_url(array('Community_Manager','index')); } ?>"><i class="fa fa-dashboard"></i> Acceuil</a></li>
	    <li><a href="<?php if(isset($_SESSION['ADMIN'])) { echo site_url(array('Administration','listeProduit')); } else { echo site_url(array('Community_Manager','Categorielist')); } ?>">Liste des Offres</a></li>
	    <li class="active">Liste des Photos des Produits</li>
	  </ol>
	</section>
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
        <small></small>
      </h1>
		<ol class="breadcrumb">
        <li><a href="<?php if(isset($_SESSION['ADMIN'])) { echo site_url(array('Administration','index')); } else { echo site_url(array('Community_Manager','index')); } ?>"><i class="fa fa-dashboard"></i> Acceuil</a></li>
        <li><a href="<?php if(isset($_SESSION['ADMIN'])) { echo site_url(array('Administration','listeProduit')); } else { echo site_url(array('Community_Manager','listeCategorie')); } ?>">Liste des Produits</a></li>
        <li class="active">Liste des Photos des Produits</li>
      </ol>
	</section>
	<section class="content-header">

		<div class="row">
			<div class="col-md-offset-4 col-md-4">
				<h1>Liste des Photos des Produits liée a <?php echo $photoproduits['produit']  ?></h1>
			</div>
		</div>		
	</section>
	<section class="content">
		<table class=" dataTables_filter table-responsive" id="myTable">
			<thead >
				<th>&nbsp</th>
				<th  >Photos</th>	
				<th  >Date de creation</th>
				<th>action</th> 
			</thead>	
			<tbody>
				<?php for ($i=0; $i<$photoproduits['taille'];$i++){ ?> 
					<tr>
						<td class="text-center"><?php echo $i ?></td>		
						<td class="text-center"><?php echo $photoproduits[$i]['photo'] ?></td>	
						<td class="text-center" ><?php echo $photoproduits[$i]['date_creation'] ?></td>
						<td class="text-center">
							<form action="<?php echo site_url(array('Administration','supprimerService')) ?>" method="post">
								<input type="hidden" value="<?php echo $photoproduits[$i]['id'] ?>" name="id">
								<button type="submit" title="SUPPRIMER"><i class="fa fa-trash"></i> </button>
							</form>
						</td>	
					</tr>
				<?php }  ?>
				</tbody>	
			</table>	
   </section>
</div>
</div>