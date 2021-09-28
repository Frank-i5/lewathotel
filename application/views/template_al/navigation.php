

<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header text-center"> Tableau de Bord </li>
      <li style="<?php if (isset($_SESSION['ADMIN'])) { echo ("display: block;");  } else{ echo ("display: none;");  } ?>"><a href="<?php echo site_url(array('Administration','index')); ?>"><i class="fa fa-dashboard text-aqua"></i> <span> Acceuil </span></a></li>
      <?php if (isset($_SESSION['ADMIN'])) { ?>
      <li class="treeview  menu-open" style="<?php if (isset($_SESSION['ADMIN'])) { echo ("display: block;");  } else{ echo ("display: none;");  } ?>">
        <a href="#">
          <i class="fa fa-users"></i>
          <span>Utilisateurs</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <?php if (isset($_SESSION['ADMIN'])) { ?>
        <ul class="treeview-menu">
          <li><a href="<?php echo site_url(array('Administration','inscription')); ?>"><i class="ion-android-add-circle"></i> Inscrire un Client </a></li>
          <li><a href="<?php echo site_url(array('Administration','Utilisateur')); ?>"><i class="ion-android-add-circle"></i> Liste des Clients </a></li>
          <li><a href="<?php echo site_url(array('Administration','inscriptionCommunity')); ?>"><i class="ion-android-add-circle"></i> Inscrire un Community Manager </a></li>
          <li><a href="<?php echo site_url(array('Administration','Community')); ?>"><i class="ion-android-add-circle"></i> Liste des Community Manager </a></li>
          <li><a href="<?php echo site_url(array('Administration','listBloquerUser')); ?>"><i class="ion-android-add-circle"></i> Désactiver un Client </a></li>
          <li><a href="<?php echo site_url(array('Administration','listDebloquerUser')); ?>"><i class="ion-android-add-circle"></i> Activer un Client </a></li>
        </ul>
         <?php }else { ?>

        <?php } ?>
      </li>      
      <?php } ?>
      <li class="treeview  menu-open">
        <a href="#">
          <i class="fa fa-th "></i>
          <span>Offres & Services</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <?php if (isset($_SESSION['ADMIN'])) { ?>
            <li style="<?php if (isset($_SESSION['ADMIN'])) { echo ("display: block;");  } else{ echo ("display: none;");  } ?>"><a href="<?php echo site_url(array('Administration','formulaireAddOffre')) ?>" data-toggle="modal" ><i class="ion-android-add-circle"></i>  Ajouter une Offre </a></li>
            <li style="<?php if (isset($_SESSION['ADMIN'])) { echo ("display: block;");  } else{ echo ("display: none;");  } ?>"><a href="<?php echo site_url(array('Administration','listeOffre')); ?>"><i class="fa fa-star"></i> Liste des Offres </a></li>
            <li><a href="<?php echo site_url(array('Administration','formulaireAddService')); ?>" data-toggle="modal" ><i class="ion-android-add-circle"></i>  Ajouter un Service </a></li>
            <li><a href="<?php echo site_url(array('Administration','liste_Service')); ?>"><i class="fa fa-star"></i> Liste des Services </a></li>
          <?php } ?>
        </ul>
      </li>
      <li class="treeview  menu-open">
        <a href="#">
          <i class="fa fa-th "></i>
          <span>Produits & Reservations</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <?php if (isset($_SESSION['ADMIN'])) { ?>
            <li style="<?php if (isset($_SESSION['ADMIN'])) { echo ("display: block;");  } else{ echo ("display: none;");  } ?>"><a href="<?php echo site_url(array('Administration','formulaireAddProduit')) ?>" data-toggle="modal" ><i class="ion-android-add-circle"></i>  Ajouter Un Produit </a></li>
            <li style="<?php if (isset($_SESSION['ADMIN'])) { echo ("display: block;");  } else{ echo ("display: none;");  } ?>"><a href="<?php echo site_url(array('Administration','liste_Produit')); ?>"><i class="fa fa-star"></i> Liste des Produits </a></li>
            <li style="<?php if (isset($_SESSION['ADMIN'])) { echo ("display: block;");  } else{ echo ("display: none;");  } ?>"><a href="<?php echo site_url(array('Administration','formulaireAddPhotoP')) ?>" data-toggle="modal" ><i class="ion-android-add-circle"></i>  Ajouter Une Photo du Produit </a></li>
            <li style="<?php if (isset($_SESSION['ADMIN'])) { echo ("display: block;");  } else{ echo ("display: none;");  } ?>"><a href="<?php echo site_url(array('Administration','liste_PhotoP')); ?>"><i class="fa fa-star"></i> Liste des Photos des Produits </a></li>
          <?php } ?>
        </ul>
      </li>
      <li class="  ">
        <a href="<?php echo site_url(array('Welcome','index')); ?>">
          <i class="fa fa-eye"></i>
          <span>Voir le Site de L'Hotel</span> 
        </a>
     </li>
      <li style="<?php if (isset($_SESSION['ADMIN'])) { echo ("display: block;");  } else{ echo ("display: none;");  } ?>"><a href="<?php echo site_url(array('Administration','deconnexion')); ?>"><i class="fa fa-power-off text-red"></i> <span> Deconnexion </span></a></li>
  </section>

</aside>

  <?php 
        echo js('jquery-3.6.0.min');
        echo js('bootstrap.min');
        echo js('jquery.dataTables.min');
        echo js('dataTables.bootstrap.min');
        echo js('app'); 
     ?>

  
