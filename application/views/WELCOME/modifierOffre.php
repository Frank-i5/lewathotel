

<div class="content-wrapper" style=" background-color:#222d32;">

  <section class="content" style="margin-top:150px;">
      <h3 class="box-title" style="text-align:center; color:#00C2A9;">Modifiez les Informations de cette Offre</h3>
    <div class="box box-primary col-md-offset-4 col-md-5" style="background-color:white; border-radius: 8px; margin-top:30px;">
      
      <!-- /.box-header -->
      <!-- form start -->
      <form action="<?php if(isset($_SESSION['ADMIN'])) { echo site_url(array('Administration','modifierOffre')); } else { echo site_url(array('Community_Manager','modifOffre')); } ?>" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label >Nouveau titre</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrez le Nouveau Titre de l'Offre'" name="newnom_offre" value="<?php echo $infooffre['nom_offre'] ?>">
          </div>
          <input type="hidden" value="<?php echo date('d/m/y h:i:s') ?>" name="date_modification">
          <input type="hidden" value="<?php echo $infooffre['id'] ?>" name="id_offre">   
        </div>
        <input type="hidden" name="id_user" value="<?php if(isset($_SESSION['ADMIN'])) { echo $_SESSION['ADMIN']['id_user']; } else { echo $_SESSION['Community_Manager']['id_user']; } ?>">
        <input type="hidden" name="niveau" value="1">

        <div class="box-footer" >
          <button type="submit" class="btn pull pull-right" style="background-color:#00C2A9; color:white;">Enregistrer</button>
        </div>
      </form>
    </div>
  </section>
</div>
