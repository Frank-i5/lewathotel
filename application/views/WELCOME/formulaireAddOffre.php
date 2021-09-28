
<div class="content-wrapper" style="margin-top:150px; background-color:#222d32;">

  <section class="content-header">
    <div class="box-header" style="text-align: center;">
      <h1 class="box-title" style="color:#00C2A9; text-align: center;">Veuillez Ajouter une Offre SVP!</h1>
    </div>
  </section>
  <section class="content">
    <div class="col-md-offset-4 col-md-5">
      <div class="box box-primary">
        <form role="form" action="<?php if(isset($_SESSION['ADMIN'])){echo site_url(array('Administration','addoffre'));}else{ echo site_url(array('Community_Manager','addoffre'));} ?>" method="post" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Titre</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Entrez le Titre l'Offre" name="nom_offre">
            </div> 
          </div>
          <input type="hidden" name="id_user" value="<?php if(isset($_SESSION['ADMIN'])){ echo $_SESSION['ADMIN']['id_user'];}else{ echo $_SESSION['Community_Manager']['id_user'];} ?>">
          <input type="hidden" name="niveau" value="1">

          <div class="box-footer" >
            <button type="submit" class="btn pull pull-right" style="background-color:#00C2A9; color:white;">Enregistrer</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>