<?php echo css('forum-style') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <small>
			</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil </a></li>
      <li>Gestion utilisateur</li>
      <li>Activer un Utilisateur</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="">
    <!-- Small boxes (Stat box) -->
    <div class="row">
			<div class="col-md-12">
				<div class="box box-danger">
						<div class="box-header with-border">
								<h3 class="box-title"><font style="vertical-align: inherit;"><font style="vertical-align: i">Liste des comptes Désactivés </font></font></h3>
								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
								</div>
						</div>
						<!-- /.box-header -->
						<div class="box-body no-padding" style="">
							<section class="content-header">
								<?php if ( $hotel['total'] != 0 ) { ?>
								<table class=" dataTables_filter table-responsive" id="myTable">
									<thead >
										<th  class=" text-center "  >profil</th>	
										<th  class=" text-center "  >Nom</th>	
										<th  class=" text-center "  >prenom</th>
										<th  class=" text-center "  >etat</th>
										<th  class=" text-center "  >Action</th>
									</thead>	
									<tbody>
					               <?php for ($i=0; $i<$hotel['total']; $i++) { ?> 
											<tr>		
												<td class=" text-center " ><?php echo imgProfil($hotel[$i]['profil'],'cl img-circle','photo de profil','photo de profil');?></td>	
							          <td class=" text-center " ><?php echo $hotel[$i]['nom']; ?> </td>
							          <td class=" text-center " ><?php echo $hotel[$i]['prenom']; ?> </td>
							          <td class=" text-center " style=" color:#e74c3c; font-weight: bold; "  > 
							          	<?php if ($hotel[$i]['niveau'] == 1){ 
							          	      	echo 'Actif' ; 
							          	      } else {
							          	      		echo 'Compte Désactivé';
							          	      } ?> 
							          </td>
											  <td class=" text-center " > 
											  		<?php if ($hotel[$i]['niveau'] == 1){ ?>
							          	      	<form role="form" action=" <?php echo site_url(array('Administration','DebloquerUser')) ?> " method="post">
																		<input type="hidden" value=" <?php echo $hotel[$i]['id']; ?> "name='cible'>
																		<input type="submit" value=" Bloquer " style="background-color: red; color: white;">
																	</form>
							          	  <?php } else { ?>
							          	      		<form role="form" action=" <?php echo site_url(array('Administration','DebloquerUser')) ?> " method="post">
																			<input type="hidden" value="  <?php echo $hotel[$i]['id']; ?> "name='cible'>
																			<input type="submit" value=" Activer " style="background-color: #00C2A9; color: white;">
																		</form>
							          	   <?php } ?>
											  	
											  </td> 
											</tr>
									<?php } } else {
										 echo('<div class="text-center" style="color:#BD655B; font-weight: bold;"> Aucun Compte Bloque sur LEWAT HOTEL pour l\'instant </div> ');
									} ?>
									</tbody>	
								</table>	
					    </section>
				 		</div>
						<!-- /.box-body -->
				</div>
			</div>
    </div>
  </section>
  <!-- /.content -->
</div>

