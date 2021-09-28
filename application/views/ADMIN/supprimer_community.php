<?php echo css('forum-style') ?>

<!-- Content Wrapper. Contains page content -->
  <!-- Content Header (Page header) -->
  <div class="content-wrapper">
	  <section class="content-header">
	    <h1>
	      <small>
				</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="#"><i class="fa fa-dashboard"></i> Acceuil </a></li>
	      <li>Gestion utilisateur</li>
	      <li>Supprimer Community Manager</li>
	    </ol>
	  </section>

	  <!-- Main content -->
	  <section class="content">
	    <!-- Small boxes (Stat box) -->
	    <div class="row">
				<div class="col-md-12">
					<div class="box box-danger">
							<div class="box-header with-border">
									<h3 class="box-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="text-center">Retirer un Community Manager</font></font></h3>
									<div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
									</div>
							</div>
							<!-- /.box-header -->
							<div class="box-body no-padding" style="">
								<section class="content-header">
									<?php if ( $total != 0 ) { ?>
									<table class=" dataTables_filter table-responsive" id="myTable">
										<thead >
											<th  class=" text-center "  >profil</th>	
											<th  class=" text-center "  >Nom</th>	
											<th  class=" text-center "  >prenom</th>
											<th  class=" text-center "  >Action</th>
										</thead>	
										<tbody>
						               <?php for ($i=0; $i<$total; $i++) { ?> 
												<tr>		
													<td class=" text-center " ><?php echo imgProfil($cible[$i]['profil'],'cl img-circle','photo de profil','photo de profil');?></td>	
								          <td class=" text-center " ><?php echo $cible[$i]['nom']; ?> </td>
								          <td class=" text-center " ><?php echo $cible[$i]['prenom']; ?> </td>
												  <td class=" text-center " > 
												  		<form action=" <?php echo(site_url(array('Administration','Supp_CommunityS'))); ?> " method="post">
																<input type="submit" value=" Supprimer Community Manager ">
																<input type="hidden" name="cible" value="<?php echo($identifier[$i]); ?>">
															</form>
												  </td> 
												</tr>
										<?php } } else {
											 echo('<div class="text-center" style="color:red; font-weight: bold;">  Oups ! vous n\'avez pas encore nommer un Community Manager </div> ');
										} ?>
										</tbody>	
									</table>	
					    	</section>
							</div>
					</div>
				</div>
	    </div>
	  </section>
	</div>