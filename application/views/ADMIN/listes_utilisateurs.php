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
                    $cord=$this->User->finduserInfos($a);
                    echo $cord['profil']; ?>
                  </td>
                  <td><?php $a=$alluser[$i]['id_user'];
                    $cord=$this->User->finduserInfos($a);
                    echo $cord['nom']; ?>
                  </td>
                  <td><?php $a=$alluser[$i]['id_user'];
                    $cord=$this->User->finduserInfos($a);
                    echo $cord['prenom']; ?>
                  </td>
                  <td><?php $a=$alluser[$i]['id_user'];
                    $info=$this->User->finduserInfos($a);
                    echo $info['telephone']; ?>
                  <td> <?php  echo $alluser[$i]['email']; ?> </td>
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