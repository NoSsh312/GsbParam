<div id="bandeau">
<!-- Images En-tête -->
<a href = "index.php?uc=accueil">
<img src="images/logo.jpg"	alt="GsbLogo" title="GsbLogo"  />
</a>
</div>
<!--  Menu haut-->
<?php if(isset($_SESSION['nomUtil'])){?>
	<p id="msg-connect">Connecté en tant que <?php echo $_SESSION['nomUtil'] ?></p><?php
}
?>
<ul id="menu">
	<li><a href="index.php?uc=accueil"> Accueil </a></li>
	<li><a href="index.php?uc=voirProduits&action=voirCategories"> Nos produits par catégorie </a></li>
	<li><a href="index.php?uc=voirProduits&action=nosProduits"> Nos produits </a></li>
	<li><a href="index.php?uc=gererPanier&action=voirPanier"> Voir son panier </a></li>
	<?php if(isset($_SESSION['nomUtil'])){
	?><li><a href="index.php?uc=seDeconnecter&action=deconnexion">Se Déconnecter</a></li><?php
}else{?>
	<li><a href="index.php?uc=seConnecter&action=voirForm"> Se connecter </a></li><?php
}?>
</ul>
