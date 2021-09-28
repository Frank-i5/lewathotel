
<div class="content-wrapper">
  <section class="content-header">
    <div class="row">
      <div class="col-md-offset-4 col-md-5">
        <h1></h1>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="col-md-offset-4 col-md-5">

            <form role="form" action="<?php if(isset($_SESSION['ADMIN'])){echo site_url(array('Administration','addReservation')) ;}else { echo site_url(array('Community_Manager','addReservation')); } ?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label >Date D'Arrivée</label>
                  <input type="datetime-local" id="meeting-time" name="meeting-time" value="2018-06-12T19:30" min="2018-06-07T00:00" max="2018-06-14T00:00">  
                </div>
                <div class="form-group">
                  <label >Date De Départ</label>
                  <input type="datetime-local" id="meeting-time" name="meeting-time" value="2018-06-12T19:30" min="2018-06-07T00:00" max="2018-06-14T00:00">  
                </div>
                <div class="form-group">
                  <label >Nombre de personne</label>
                  <input type="text" name="nom_produit" class="form-control" id="local-upload"  placeholder="Veuillez entrer le prix du Produit"></input>  
                </div>

                <input type="hidden"  name="id_user"  value="<?php if(isset($_SESSION['ADMIN'])){echo $_SESSION['ADMIN']['id'];}else{ echo $_SESSION['Community_Manager']['id_user']; } ?>">
                <input type="hidden" name="auteur" value="<?php if(isset($_SESSION['ADMIN'])){echo $_SESSION['ADMIN']['nom'];}else{ echo $_SESSION['Community_Manager']['nom'];} ?>"> 
                <input type="hidden" value="<?php echo date('d/m/y h:i:s') ?>" name="date_creation">
              </div>

              <input type="hidden" name="id_produit" value="<?php echo $post['id']; ?>">
              <input type="hidden" name="statut" value="1">

              <div class="box-footer" >
                <button type="submit" class="btn btn-primary">Reserver</button>
              </div>
            </form>
    </div>
  </section>
</div>