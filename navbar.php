<?php
if (isset($_SESSION['mdp'])) {
    $connec = 'Deconnexion';
    $linkCon = 'deconnexion.php';
    $sign = '';
    $signe = '';
    $event = 'echange.php';
} else {
    $linkCon = 'connexion.php';
    $connec = 'Connexion';
    $sign = 'inscription.php';
    $signe = 'Inscription';
    $event = 'connexion.php';
}
?>

<nav id="nav-menu-container">
    <ul class="nav-menu">
        <li><a href="../index.php">Accueil</a></li>
        <li class="menu-active"><a href="mesobjets.php">Mes Objets</a></li>
        <li><a href="<?php echo $event; ?>">Echanger</a></li>
        <li><a href="<?php echo $linkCon; ?>"><?php echo $connec; ?></a></li>
        <li><a href="<?php echo $sign; ?>"><?php echo $signe; ?></a></li>
       

    </ul>
</nav>

