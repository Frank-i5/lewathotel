<?php
  echo css('bootstrap.min'); 
  echo css('dataTables.bootstrap.min');
  echo css('jquery.dataTables.min');
      
?>

<div class="content-wrapper">
    <section class="content-header">
      <table id="mytable" class="dataTables_filter table-responsive"> 
          <thead> 
              <th>N°: </th>
              <th> Image </th>
              <th> Nom </th>
              <th> Prenom </th>
              <th> Telephone </th>
              <th> Email </th>
              <th> Action</th>
          </thead>
          <tbody> 
              <?php  
               if ($alluser['data']=='ok') {
                    for($i=0; $i<$alluser['total']; $i++) {?>
              <tr>  
                  <td> <?php  echo $alluser[$i]['id']; ?> </td>
                  <td><?php $a=$alluser[$i]['id_user'];
                    $info=$this->User->finduserInfos($a);
                    echo $info['profil']; ?>
                  </td>
                  <td><?php $a=$alluser[$i]['id_user'];
                    $info=$this->User->finduserInfos($a);
                    echo $info['nom']; ?>
                  </td>
                  <td><?php $a=$alluser[$i]['id_user'];
                    $info=$this->User->finduserInfos($a);
                    echo $info['prenom']; ?>
                  </td>
                  <td><?php $a=$alluser[$i]['id_user'];
                    $info=$this->User->finduserInfos($a);
                    echo $info['telephone']; ?>
                  <td> <?php  echo $alluser[$i]['email']; ?> </td>
                  <td>
                    <form action="<?php echo site_url(array('Administration','supprimerCommunity')) ?>" method="post" style="display: inline-block;">
                      <input type="hidden" value="<?php echo $alluser[$i]['id'] ?>" name="id">
                      <button><span class="fa fa-filter"></span></button>
                      <button><span class="fa fa fa-trash-o"></span></button>
                    </form>
                  </td>
              </tr>
            <?php } }else{ } ?>
          </tbody>
      </table>
    </section>
  </div>
  <?php 
        echo js('jquery-3.6.0.min');
        echo js('bootstrap.min');
        echo js('jquery.dataTables.min');
        echo js('dataTables.bootstrap.min');
        echo js('app'); 
     ?>