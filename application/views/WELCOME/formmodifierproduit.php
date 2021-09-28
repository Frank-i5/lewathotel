 <div class="content-wrapper">

  <section class="content-header">
    <div class="box-header with-border" style="text-align: center;" >
      <h3 class="box-title">Modification du Produit</h3>
    </div>
  </section>
  <section class="content">
    <div class="col-md-offset-4 col-md-5" >
      <div class="box box-primary">

        <!-- <form role="form" action="<?php echo site_url(array('Administration','modifierProduit')); ?>" method="post"> -->
          <form role="form" action="<?php if(isset($_SESSION['ADMIN'])){echo site_url(array('Administration','modifierProduit'));}else{ echo site_url(array('Community_Manager','modifierProduit'));} ?>" method="post">
          <div class="box-body">
            <div class="form-group">
              <label >Choisissez une Offre</label>
              <select class="form-control" name="newid_service">
                <?php  for ($i=0 ; $i<$nom['total']; $i++){ ?>
                  <option value="<?php  echo $nom[$i]['id'] ?>" > <?php echo $nom[$i]['nom_service'] ?></option>
                <?php } ?>
              </select>

            </div>
            <div class="form-group">
              <label >Modifiez le Numéro du Produit</label>
              <input name="newnumero_produit" class="form-control" id="local-uploa" rows=""  placeholder="Veuillez entrer le prix du produit"><?php echo $numero_produit ?></input> 
            </div>
            <div class="form-group">
              <label >Modifiez la description du Produit</label>
              <textarea name="newdescription" class="form-control" id="local-uploa" rows="30" value="" ><?php echo $description ?></textarea> 
            </div>
            <div class="form-group">
              <label >Modifiez la prix du Produit</label>
              <input name="newprix_produit" class="form-control" id="local-uploa" rows=""  placeholder="Veuillez entrer le prix du produit"><?php echo $prix ?></input> 
            </div>
            <div class="form-group" style="margin-top:30px;"> 
              <p>Entrez la nouvelle image du produit</p> 
              <input id="image" type="file"  name="newphoto_service" onchange="loadFile(event)" value="<?php echo $infoservice['photo_service'];  ?>" style="height: 0px;">
            </div> 
            
          </div>
          <div class="row">
            <div class="col-md-offset-4 col-md-4 " style="margin-bottom: 20px;" >
              <label for="image">
                <img id="im"  style="width: 100px; height: 100px; cursor: pointer;" src="<?php echo img_url($infoservice['photo_service']) ?>">
              </label>
            </div>
          </div>
          </div>
          <input type="hidden" value="<?php if(isset($_SESSION['ADMIN'])){$_SESSION['ADMIN']['id_user']; }else{ echo $_SESSION['Community_Manager']['id_user'];} ?>" name="id_user">
          <input type="hidden" value="<?php echo $id_produit ?>" name="id_produit">
          <input type="hidden" value="<?php echo date('d/m/y h:i:s') ?>" name="datemodif">
          <input type="hidden" value="1" name="niveau">

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
<script src="https://cdn.tiny.cloud/1/5r3678jn7snbdpw0u4zvt2zth82bm2nwio7sula0k37hnrp0/tinymce/5/tinymce.min.js"></script> 
     <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
      var base_url = {
        'url' : 'http://localhost/k-immofinanz/',
        'author' : 'Cyprien DONTSA'
      };
      var finalUrl = base_url.url+'Administration/upload';
      tinymce.init({
          selector: 'textarea#local-upload',
           plugins: 'image code searchreplace wordcount visualblocks visualchars fullscreen insertdatetime media nonbreaking contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker codesample',
           toolbar1: 'undo redo | newdocument | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect',
          toolbar2: "cut copy paste  | searchreplace | bullist numlist | outdent indent | link unlink   | insertdatetime preview | forecolor backcolor | table | hr removeformat | subscript superscript   |  fullscreen | ltr rtl | image code |codesample print | contextmenu",

         //without images_upload_url set, Upload tab won't show up 
          images_upload_url: 'finalUrl',

         //we override default upload handler to simulate successful upload
          images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;
            
            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST',finalUrl);
          
            xhr.onload = function() {
                var json;
            
                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }
            
                json = JSON.parse(xhr.responseText);
            
                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
            
                success(json.location);
            };
          
            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());
          
            xhr.send(formData);
        },
      });
    </script>