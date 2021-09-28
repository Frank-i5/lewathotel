<!--  -->
 <div class="content-wrapper">
    <section class="content-header">
      <div class="box-header with-border" style="text-align: center;" >
        <h3 class="box-title">Ajoutez un Service</h3>
      </div>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-offset-4 col-md-5" >
          <div class="box box-primary">
            <form role="form" action="<?php if(isset($_SESSION['ADMIN'])){echo site_url(array('Administration','addService'));}else{ echo site_url(array('Community_Manager','addService'));} ?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label ></label>
                  <select class="form-control" name="id_offre">
                    <?php  for ($i=0 ; $i<$nom['total']; $i++){ ?>
                  <option value="<?php  echo $nom[$i]['id'] ?>"> <?php echo $nom[$i]['nom_offre'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label >Service</label>
                  <input type="text" name="nom_service" class="form-control" id="local-upload"  placeholder="Veuillez entrer le titre du Service"></input>  
                </div>
              </div>
                <?php   if (isset($_SESSION['ADMIN'])) { ?>
                  <input type="hidden" value="<?php echo $_SESSION['ADMIN']['id_user'] ?>" name="id_user">
                <?php }else{ ?>
                  <input type="hidden" value="<?php echo $_SESSION['Community_Manager']['id_user'] ?>" name="id_user">
                <?php } ?>
                  <input type="hidden" value="1" name="niveau">
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                  </div>
            </form>
          </div>
        </div>
      </div>
	 </section>


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