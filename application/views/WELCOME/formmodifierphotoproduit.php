 <?php
echo css('css/style2');
?>

 <div class="content-wrapper">

  <section class="content-header">
    <div class="box-header with-border" style="text-align: center;" >
      <h3 class="box-title">Modification du Service</h3>
    </div>
  </section>
  <section class="content">
    <div class="col-md-offset-4 col-md-5" >
      <div class="box box-primary">

        <!-- <form role="form" action="<?php echo site_url(array('Administration','modifierService')); ?>" method="post"> -->
          <form role="form" action="<?php if(isset($_SESSION['ADMIN'])){echo site_url(array('Administration','modifierService'));}else{ echo site_url(array('Community_Manager','modifierService'));} ?>" method="post">
          <div class="box-body">
                <span class="glyphicon glyphicon-picture"></span>
                <label>Telecharger votre photo de pofil</label>
                <div class="input-group">
                  <input class="form-control inpt7" type="file" name="photo" accept="image/*" onchange="loadFile(event)" required="" >
                  <span class="validity input-group-addon" style="background-color: none;"></span>
                </div>
                <div class="col-md-offset-4 col-md-4 im" style="">
                  <img id="im"/>
                </div>
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
    <script>    
        var loadFile = function(event) {
            var profil = document.getElementById('im');
            profil.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>