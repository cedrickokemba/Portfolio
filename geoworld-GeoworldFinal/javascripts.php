<?php
/**
 * Déclaration d'inclusion de code js
 *
 * PHP version 7
 *
 * @category  Include_JS
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

?>

<script src="assets/bootstrap-5.1.3-dist/js/bootstrap.min.js"> </script>

<script>
function info(e) { console.log(e.getAttribute("class")); }
</script>

<script>
  var themeToggle = document.getElementById('theme-toggle');

  // Vérifie si l'utilisateur a déjà choisi un thème
  if (localStorage.getItem('theme') === 'dark') {
    document.documentElement.setAttribute('data-theme', 'dark');
  }

  // Écouteur d'événement pour le bouton de changement de thème
  themeToggle.addEventListener('click', function() {
    var theme = document.documentElement.getAttribute('data-theme');
    if (theme === 'dark') {
      document.documentElement.setAttribute('data-theme', 'light');
      localStorage.setItem('theme', 'light'); // Stocke la préférence de l'utilisateur
    } else {
      document.documentElement.setAttribute('data-theme', 'dark');
      localStorage.setItem('theme', 'dark'); // Stocke la préférence de l'utilisateur
    }
  });
</script>

