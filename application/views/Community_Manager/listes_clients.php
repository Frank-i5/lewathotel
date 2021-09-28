<div class="content-wrapper">
    <section class="content-header">
      <table id="mytable" class="dataTables_filter table-responsive"> 
          <thead> 
              <th>N°: </th>
              <th> Image </th>
              <th> Nom </th>
              <th> Prenom </th>
              <th> Action</th>
          </thead>
          <tbody> 
              <?php 
              print_r($alluser);  
               if ($alluser['data']=='ok') {
                    for($i=0; $i<$alluser['total']; $i++) {?>
              <tr>  
                  <td> <?php  echo $alluser[$i]['id']; ?> </td>
                  <td> <?php echo $alluser[$i]['profil'];  ?> </td>
                  <td> <?php  echo $alluser[$i]['nom']; ?></td>
                  <td> <?php  echo $alluser[$i]['prenom']; ?></td>
                  <td>
                    <button><span class="fa fa-filter"></span></button>
                    <button><span class="fa fa fa-trash-o"></span></button>
                  </td>
              </tr>
            <?php } }else{ } ?>
          </tbody>
      </table>
    </section>
  </div>