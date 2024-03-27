<?php
/**
 * Fragment Header HTML page
 *
 * PHP version 7
 *
 * @category  Page_Fragment
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */
?><!doctype html>
<html lang="fr" class="h-100">
<head>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Application Geoworld">
    <title>Homepage : GeoWorld</title>

  <!-- Bootstrap core CSS -->
  <link href="../assets/bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">
  <?php
    require_once 'manager-db.php';
    $listeContinents = getNomContinents();
    ?>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <link rel="stylesheet" href="../css/projet.css">
  <link href="../css/custom.css" rel="stylesheet">
</head>


<body>
  
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
  <img src="../images/geoworld.png" alt="geoworld" style="width: 10%;">
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <buton>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">Acceuil</a>
          </li>
        </buton>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-haspopup="true"
             aria-expanded="false">Continents</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">

            <?php foreach($listeContinents as $cont): ?>
              <a class="dropdown-item" href="?continent=<?php echo "$cont->Continent" ;?>"><?php echo"$cont->Continent"; ?></a>
            <?php endforeach ?>

          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="todo-projet.php">
            Présentation-Atelier-de-Prof-SLAM
          </a>
        </li>
        <buton>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../dev.html">Développeur</a>
          </li>
        </buton>
        <button id="theme-toggle">Changer le thème</button>
        <?php
            session_start();
            if (isset($_SESSION['username'])) {
            // L'utilisateur est connecté, afficher le nom et le bouton "Déconnexion"
            echo '<li class="nav-item">';
            echo '</li>';
            echo '<li class="nav-item">'; }
            if ($_SESSION['username'] == 'admin') {
                echo '<a class="nav-link" href="admin.php">Admin</a>';
            } else {
            }
        ?>

        <li class="nav-item">
          <a class="nav-link" href="../index.php">Déonnexion</a>
        </li>
        </ul>
        <p> Bonjour !</p>

      <script async src="https://cse.google.com/cse.js?cx=87960e3dfd09943ea" >
      </script>
      <div class="gcse-search"></div>
    </div>
  </div>
</nav>