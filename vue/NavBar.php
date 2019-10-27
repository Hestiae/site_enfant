<?php
if (isset($_SESSION['mdp'])) {
    $connec = 'Deconnexion';
    $linkCon = 'deconnexion.php';
    $sign = '';
    $signe = '';
    $event = 'echange.php';
	$solde = $_SESSION['solde'];
	$soldes = $solde.' '.'pts'; 
} else {
    $linkCon = 'connexion.php';
    $connec = 'Connexion';
    $sign = 'inscription.php';
    $signe = 'Inscription';
    $event = 'connexion.php';
	$soldes = '';
}
?>

<nav id="nav-menu-container">
    <ul class="nav-menu">
        <li class="menu-active"><a href="../index.php">Accueil</a></li>
        <li><a href="mesobjets.php">Mes Objets</a></li>
        <li><a href="<?php echo $event; ?>">Echanger</a></li>
        <li><a href="<?php echo $linkCon; ?>"><?php echo $connec; ?></a></li>
        <li><a href="<?php echo $sign; ?>"><?php echo $signe; ?></a></li>
		<li><a href=""> Solde : <?php echo $soldes; ?> </a></li>
       

    </ul>
</nav>

