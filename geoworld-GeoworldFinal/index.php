<?php
/**
 * Home Page
 *
 * PHP version 7
 *
 * @category  Page
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

?>
<?php  require_once 'header.php'; ?>
<?php
require_once 'inc/manager-db.php';

if (!empty($_GET['continent'])) {
    $continent = $_GET['continent'];
} else {
    $continent = "Europe";
}

$desPays = getCountriesByContinent($continent);

if (!empty($_GET['country'])) {
    $idCapitale = $_GET['country'];
    $nomCapitale = getNomCapitale($idCapitale);
} else {
    $nomCapitale = null;
}

?>
<link rel="stylesheet" href="css/custom.css">
<link rel="stylesheet" href="css/projet.css">
<link rel="stylesheet" href="css/forme.css">
<main role="main" class="flex-shrink-0">

  <div class="container">
    <h1 onclick="info(this)"> 
    <br>
    <?php echo " Les pays de $continent"?>
    </h1>
    <div>
     <table class="table">
         <tr>
           <th>Nom</th>
           <th>Population</th>
           <th>Capitale</th>
           <th>Superficie</th>
           <th>Éspérance de vie</th>
           <th>Langue</th>
         </tr>
         <?php foreach ($desPays as $pays) : ?>
            <tr>
              <td><?php echo $pays->Name ?></td>
              <td><?php echo $pays->Population ?></td>
              <td><?php echo getNomCapitale($pays->Capital) ?></td>
              <td><?php echo $pays->SurfaceArea ?></td>
              <td><?php echo $pays->LifeExpectancy ?></td>

              <?php $idCountry = $pays->id;
               $langues = getLanguage($idCountry) ?>

              <td><?php foreach ($langues as $language): ?>
                <?php echo $language->Name ?> 
              <?php endforeach;?></td>
              
            </tr>
         <?php endforeach;?>


     </table>
     <label class="container">
        <input type="checkbox">
        <div class="checkmark">
          <svg class="icon" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 50 50">
          <path fill-opacity="1.000" d="M 24.10 6.29 Q 28.34 7.56 28.00 12.00 Q 27.56 15.10 27.13 18.19 A 0.45 0.45 4.5 0 0 27.57 18.70 Q 33.16 18.79 38.75 18.75 Q 42.13 18.97 43.23 21.45 Q 43.91 22.98 43.27 26.05 Q 40.33 40.08 40.19 40.44 Q 38.85 43.75 35.50 43.75 Q 21.75 43.75 7.29 43.75 A 1.03 1.02 0.0 0 1 6.26 42.73 L 6.42 19.43 A 0.54 0.51 -89.4 0 1 6.93 18.90 L 14.74 18.79 A 2.52 2.31 11.6 0 0 16.91 17.49 L 22.04 7.17 A 1.74 1.73 21.6 0 1 24.10 6.29 Z M 21.92 14.42 Q 20.76 16.58 19.74 18.79 Q 18.74 20.93 18.72 23.43 Q 18.65 31.75 18.92 40.06 A 0.52 0.52 88.9 0 0 19.44 40.56 L 35.51 40.50 A 1.87 1.83 5.9 0 0 37.33 39.05 L 40.51 23.94 Q 40.92 22.03 38.96 21.97 L 23.95 21.57 A 0.49 0.47 2.8 0 1 23.47 21.06 Q 23.76 17.64 25.00 12.00 Q 25.58 9.36 24.28 10.12 Q 23.80 10.40 23.50 11.09 Q 22.79 12.80 21.92 14.42 Z M 15.57 22.41 A 0.62 0.62 0 0 0 14.95 21.79 L 10.01 21.79 A 0.62 0.62 0 0 0 9.39 22.41 L 9.39 40.07 A 0.62 0.62 0 0 0 10.01 40.69 L 14.95 40.69 A 0.62 0.62 0 0 0 15.57 40.07 L 15.57 22.41 Z"></path>
          <circle fill-opacity="1.000" cx="12.49" cy="37.50" r="1.51"></circle>
          </svg>
        </div>
        <p class="like">Si vous avez aimé cette page n'hésitez pas à réagir ;)</p>
     </label>
    </div>
  </div>
</main>

<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>