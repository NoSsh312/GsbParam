
<!--  Menu haut-->
<?php if(isset($_SESSION['nomUtil'])){?>
	<p id="msg-connect">Connecté en tant que <?php echo $_SESSION['nomUtil'] ?></p><?php
}
?>
<?php if(isset($_SESSION['nomAdmin'])){?>
	<p id="msg-connect">Connecté en tant que <?php echo $_SESSION['nomAdmin'] ?></p><?php
}
?>
<div id="group-nav">
	<div id="div-logo">
	<a href="index.php?uc=accueil">
		<img id="logo" src="images/gsbBioLogo.png">
	</a>
</div>
<div id="navigation">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    	
      <li class="nav-item active">
        <a class="nav-link" href="index.php?uc=accueil">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?uc=voirProduits&action=voirCategories">Produits par catégorie</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?uc=voirProduits&action=nosProduits">Nos produits</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="index.php?uc=gererPanier&action=voirPanier">Mon panier</a>
      </li>
      <?php if(isset($_SESSION['nomUtil']) || isset($_SESSION['nomAdmin'])){ ?>
      	  <li class="nav-item">
        <a class=" btn btn-outline-success" href="index.php?uc=monProfil&action=voirMonProfil">Mon profil</a>
      </li>
       <li class="nav-item">
        <a class=" btn btn-outline-success" href="index.php?uc=seDeconnecter&action=deconnexion">Se Déconnecter</a>
      </li>
      <?php }else{?>
      <li class="nav-item">
        <a class=" btn btn-outline-success" href="index.php?uc=seConnecter&action=voirForm">Se connecter</a>
      </li>
        <li class="nav-item">
        <a class=" btn btn-outline-success" href="index.php?uc=seConnecter&action=inscription">S'inscrire</a>
      </li>
      <?php
}?>
    </ul>
  </div>
</nav>
</div>
</div>
<HR NOSHADE class="separation">
<!-- <ul id="menu">
	<div>
	<a href="index.php?uc=accueil">
		<img id="logo" src="images/gsbBioLogo.png">
	</a>
</div>
	<li><a class="style-menu-link" href="index.php?uc=accueil"> Accueil </a></li>
	<li><a class="style-menu-link"  href="index.php?uc=voirProduits&action=voirCategories"> Produits par catégorie </a></li>
	<li><a class="style-menu-link"  href="index.php?uc=voirProduits&action=nosProduits"> Nos produits </a></li>
	<li><a class="style-menu-link"  href="index.php?uc=gererPanier&action=voirPanier"> Mon panier </a></li>
	<?php if(isset($_SESSION['nomUtil']) || isset($_SESSION['nomAdmin'])){
	?><li><a class="style-menu-link"  href="index.php?uc=seDeconnecter&action=deconnexion">Se Déconnecter</a></li><?php
}else{?>
	<li><a class="style-menu-link"  href="index.php?uc=seConnecter&action=voirForm"> Se connecter </a></li><?php
}?>
</ul>
<HR NOSHADE class="separation"> -->