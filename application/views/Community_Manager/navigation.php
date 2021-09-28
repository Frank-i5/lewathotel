<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header text-center"> Tableau de Bord </li>
      <li style="<?php if (isset($_SESSION['Community_Manager'])) { echo ("display: block;");  } else{ echo ("display: none;");  } ?>"><a href="<?php echo site_url(array('Community_Manager','index')); ?>"><i class="fa fa-dashboard text-aqua"></i> <span> Acceuil </span></a></li>
      <?php if (isset($_SESSION['Community_Manager'])) { ?>
      <li class="treeview  menu-open" style="<?php if (isset($_SESSION['Community_Manager'])) { echo ("display: block;");  } else{ echo ("display: none;");  } ?>">
        <a href="#">
          <i class="fa fa-users"></i>
          <span>Utilisateurs</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <?php if (isset($_SESSION['Community_Manager'])) { ?>
        <ul class="treeview-menu">
          <li><a href="<?php echo site_url(array('Community_Manager','Utilisateur')); ?>"><i class="ion-android-add-circle"></i> Liste des Clients </a></li>
          <li><a href="<?php echo site_url(array('Community_Manager','inscription')); ?>"><i class="ion-android-add-circle"></i> Inscrire un Utilisateur </a></li>
          <li><a href="<?php echo site_url(array('Community_Manager','listBloquerUser')); ?>"><i class="ion-android-add-circle"></i> Désactiver un Utilisateur </a></li>
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
          <?php if (isset($_SESSION['Community_Manager'])) { ?>
            <li style="<?php if (isset($_SESSION['Community_Manager'])) { echo ("display: block;");  } else{ echo ("display: none;");  } ?>"><a href="<?php echo site_url(array('Community_Manager','formulaireAddOffre')) ?>" data-toggle="modal" ><i class="ion-android-add-circle"></i>  Ajouter une Offre </a></li>
            <li style="<?php if (isset($_SESSION['Community_Manager'])) { echo ("display: block;");  } else{ echo ("display: none;");  } ?>"><a href="<?php echo site_url(array('Community_Manager','listeOffre')); ?>"><i class="fa fa-star"></i> Liste des Offres </a></li>
            <li><a href="<?php echo site_url(array('Community_Manager','formulaireAddService')); ?>" data-toggle="modal" ><i class="ion-android-add-circle"></i>  Ajouter un Service </a></li>
            <li><a href="<?php echo site_url(array('Community_Manager','liste_Service')); ?>"><i class="fa fa-star"></i> Liste des Services </a></li>
          <?php } else { ?>
            <li style="<?php if (isset($_SESSION['Community_Manager'])) { echo ("display: block;");  } else{ echo ("display: none;");  } ?>"><a href="<?php echo site_url(array('Community_Manager','formAddOffre')) ?>" data-toggle="modal" ><i class="ion-android-add-circle"></i>  Ajouter une Offre </a></li>
            <li style="<?php if (isset($_SESSION['Community_Manager'])) { echo ("display: block;");  } else{ echo ("display: none;");  } ?>"><a href="<?php echo site_url(array('Community_Manager','offrelist')); ?>"><i class="fa fa-star"></i> Liste des Offres </a></li>
            <li><a href="<?php echo site_url(array('Community_Manager','formulaireAddService')); ?>" data-toggle="modal" ><i class="ion-android-add-circle"></i>  Ajoutez un Service </a></li>
            <li><a href="<?php echo site_url(array('Community_Manager','liste_Service')); ?>"><i class="fa fa-star"></i> Liste des Services </a></li>
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
          <?php if (isset($_SESSION['Community_Manager'])) { ?>
            <li style="<?php if (isset($_SESSION['Community_Manager'])) { echo ("display: block;");  } else{ echo ("display: none;");  } ?>"><a href="<?php echo site_url(array('Community_Manager','formulaireAddProduit')) ?>" data-toggle="modal" ><i class="ion-android-add-circle"></i>  Ajouter Un Produit </a></li>
            <li style="<?php if (isset($_SESSION['Community_Manager'])) { echo ("display: block;");  } else{ echo ("display: none;");  } ?>"><a href="<?php echo site_url(array('Community_Manager','liste_Produit')); ?>"><i class="fa fa-star"></i> Liste des Produits </a></li>
            <li style="<?php if (isset($_SESSION['Community_Manager'])) { echo ("display: block;");  } else{ echo ("display: none;");  } ?>"><a href="<?php echo site_url(array('Community_Manager','formulaireAddPhotoP')) ?>" data-toggle="modal" ><i class="ion-android-add-circle"></i>  Ajouter Une Photo du Produit </a></li>
            <li style="<?php if (isset($_SESSION['Community_Manager'])) { echo ("display: block;");  } else{ echo ("display: none;");  } ?>"><a href="<?php echo site_url(array('Community_Manager','liste_PhotoP')); ?>"><i class="fa fa-star"></i> Liste des Photos des Produits </a></li>
          <?php } ?>
        </ul>
      </li>
      <li class="  ">
        <a href="<?php echo site_url(array('Welcome','index')); ?>">
          <i class="fa fa-eye"></i>
          <span>Voir le Site de L'Hotel</span> 
        </a>
     </li>
      <li style="<?php if (isset($_SESSION['Community_Manager'])) { echo ("display: block;");  } else{ echo ("display: none;");  } ?>"><a href="<?php echo site_url(array('Community_Manager','deconnexion')); ?>"><i class="fa fa-power-off text-red"></i> <span> Deconnexion </span></a></li>
  </section>

</aside>

  
