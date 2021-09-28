<div class="content-wrapper">
    
    <section class="content-header">
      <h1>
        Detail 
        <small>
       <?php
        if(isset($kapitalanlage)){
            echo "Kapitalanlage"; 
        }else{
           echo "Versicherung"; 
         }  
      ?>
        </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(array('Administration','index')) ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li>
            <?php if(isset($kapitalanlage)){ ?>
            <a href="<?php echo site_url(array('Administration','kapitalanlagen')) ?>"><i class="fa fa-file"></i>Kapitalanlangen</a>
            <?php }else{ ?>
            <a href="<?php echo site_url(array('Administration','versicherungen')) ?>"><i class="fa fa-file"></i>Versicherung</a>
            <?php }   ?>
          </li>
        <li class="active">Derail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- row -->
      <div class="row">
        <div class="col-md-12">
          
                 
          
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
            <?php if(isset($_SESSION['USER']) ){ ?>
              <div class="pull-right col-md-1 col-sm-2 col-xs-2" style="margin-bottom: 5px">
                   <i class="fa fa-mail-reply btn btn-block btn-primary get_ens ">
                    <form method="post" action="<?php echo site_url(array('Compte','Course')) ?>">
                         <input type="hidden" name="id_cour" value="<?php echo $id_cour; ?>">
                    </form>
                  </i>

                </div>
             <?php } ?>
                  <span class="bg-red">
                    <?php  
                      echo "01.07.21"; ?>
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
            <i class="fa fa-camera bg-blue"></i>

              <div class="timeline-item">          
              <div class="row">
                <div class="col-md-8">
                  <!-- Box Comment -->
                  <div class="box box-widget">
                    <div class="box-header with-border">
                      <div class="user-block">
                        <?php if(isset($kapitalanlage)){ ?>
                          <img class="img-circle" src="<?php echo kapitalanlage_img($info_service['image']) ?>" alt="User Image">
                        <?php }else{ ?>
                          <img class="img-circle" src="<?php echo versicherung_img($info_service['image']) ?>" alt="User Image">
                        <?php } ?>
                        <span class="username"><a href="#">
                           <?php echo $info_service['titre']; ?>
                        </a></span>
                        <span class="description">Shared publicly -<?php echo "18.07.21" ?></span>
                      </div>
                      <!-- /.user-block -->
                      <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-toggle="tooltip_" title="Mark as read">
                          <i class="fa fa-circle-o"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="collapse_"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove_"><i class="fa fa-times"></i></button>
                      </div>
                      <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <p><?php echo $info_service['titre']; ?></p>
                          
                     <?php if(isset($kapitalanlage)){ ?>
                      <img class="img-responsive pad" style="margin-left:80px ;height: 700px; width: 80%;" src="<?php echo  kapitalanlage_img($info_service['image']) ?>" alt="Photo">
                        <?php }else{ ?>
                       <img class="img-responsive pad" style="margin-left:80px ;height: 700px; width: 80%;" src="<?php echo versicherung_img($info_service['image']) ?>" alt="Photo">
                        <?php } ?>
                          
                    </div>
                  </br>
       
                  </div>
                  <!-- /.box -->
                </div>







        <!-- /.col -->
         <div class="col-md-4">
          <!-- Box Comment -->
          <div class="box box-widget">

            <div class="box-header with-border">
              <div class="user-block">
                <span class="username"><a href="#">
                   Liste Versicherungen
                </a></span>
              </div>
              <!-- /.user-block -->
             
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            
            <!-- /.box-body -->
            <div class="box-footer box-comments">
              
              <!-- /.box-comment -->
               <?php if(!isset($AllVersicherung) || $AllVersicherung['total']<=0){  ?>
                          <span class="text-muted pull-right">Liste vide !</span>
            <?php }else{ for ($i=0; $i<$AllVersicherung['total'] ; $i++) {   ?>
              
                  <form method="post" class="detail_vresicherung" action="<?php echo site_url(array('Administration','detailVersicherung')) ?>">
          
                    <input type="hidden" name="versicherung" value="<?php echo $AllVersicherung[$i]['id']; ?>">
                     <div class="box-comment commentaire_liste">
                <!-- User image -->
                          
                     <?php if(isset($kapitalanlage)){ ?>
                       <img  src="<?php echo kapitalanlage_img($AllVersicherung[$i]['image']) ?>" class="attachment-img" alt="User Image" >
                        <?php }else{ ?>
                       <img  src="<?php echo versicherung_img($AllVersicherung[$i]['image']) ?>" class="attachment-img" alt="User Image" >
                        <?php } ?>
                <div class="comment-text">
                      <span class="username">
                         <h4 class="attachment-heading"><a href="#"><?php echo $AllVersicherung[$i]['titre']; ?></a></h4>
                      </span><!-- /.username -->
                <p>  <?php echo $AllVersicherung[$i]['description']; ?></p>
                </div>
                <!-- /.comment-text -->
              </div>
              </form>
              <legend>  </legend>
            <?php }  } ?>
             
              <!-- /.box-comment -->
            </div>

          
            <!-- /.box-footer -->
            </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
       <script type="text/javascript">
      $(document).ready(function(){
        $('.detail_vresicherung').click(function(){
            $(this).submit();
        });
      });
    </script>
      <!-- /.row -->
      </div></br>
            </li>
            <!-- END timeline item -->
    
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
        <!-- /.col -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  
  <div class="control-sidebar-bg"></div>

<style type="text/css">
   .photo_poster img{
      width: 50px;
      height: 50px;
      border-radius: 50%;     

    
   }
   p {
        white-space: nowrap;
        width: 100%;
        height: 20px;                   
        overflow: hidden;              /* "overflow"-Wert darf nicht "visible" sein */ 
        text-overflow: ellipsis;
       
      }

   .commentaire_liste:hover{
          cursor: pointer;
   }
   #div_commentaire_forum{
    overflow-y: scroll;
    overflow-x: hidden;
    max-height: 400px;
   }
   

   #commenter_forum:hover{
      cursor: pointer;
   }
   .photo_poster_ img {
    width: 40px;
      height: 40px;
      border-radius: 50%; 
   }
   .image_poste img{
    width: 100%;
    height: 700px;
    border:1px solid #e1e1e1;
   }
   .div_couv_all_infos_ {
     
   }
   .commentaire{
    font-size: 15px;
    color: #00959f;
   }
   .commentaire_,.commentaire:hover{
      cursor: pointer;
   }
   .div_commentaire_{
    margin: 5px;
    width: 80%;
    padding-top: 10px; 
    padding-left: 70px;
    padding-right: : 50px;
   }
   .formulaire_de_fichier_{
    margin: 10px;
    width: 60%;
    border-radius: 5px;
    border: 1px solid #00959f ;
    padding: 5px; 
   }
   .commentaire_user{
    width: 80%;
    margin: 5px;
    margin-top: -40px;
    margin-left: 15%!important;
   }
   .faire_poste{
    background-color: #00959f;
    border-radius: 5px;
    color: white;
    padding: 5px;
   }
   .btn_commentaire_id2{
    border-radius: 5px;
    border:1px; 
    width: 100px;
    height: 35px;
    margin: 5px;
   }
   .taille_date{
    font-size:10px;
   }
   .faire_poste:hover{
      cursor: pointer;
   }
   .annulle_poste:hover{
    cursor: pointer;
   }
   .commentaire_sms{
    background-color: #e5e5e5;
      padding: 5px;
    border-radius: 5px;
   }
   .textbox{
    margin: 5px;
   }
   .alignleft {
      float: left;
    }
    .alignright {
      float: right;
    }
   </style>