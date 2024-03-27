<?php
/**
 * Ce script est composé de fonctions d'exploitation des données
 * détenues pas le SGBDR MySQL utilisées par la logique de l'application.
 *
 * C'est le seul endroit dans l'application où a lieu la communication entre
 * la logique métier de l'application et les données en base de données, que
 * ce soit en lecture ou en écriture.
 *
 * PHP version 7
 *
 * @category  Database_Access_Function
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2023 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

/**
 *  Les fonctions dépendent d'une connection à la base de données,
 *  cette fonction est déportée dans un autre script.
 */
require_once 'connect-db.php';


// Exemple d'une fonction sans paramètre, avec documentation technique PhpDoc  

/**
 * Obtenir la liste des pays
 *
 * @return liste d'objets de type StdClass représentant un Country 
 */
function getAllCountries()
{
    global $pdo;
    $query = 'SELECT * FROM Country;';
    return $pdo->query($query)->fetchAll();
}

/**
 * Récupère les noms des continents disponibles.
 *
 * @return array Tableau contenant les noms des continents disponibles.
 */
function getNomContinents() 
{
    global $pdo;
    $query = 'SELECT DISTINCT(Continent) FROM  Country;';
    return $pdo->query($query)->fetchAll();
}

/**
 * Affiche le nom d'une capitale en fonction de son ID.
 *
 * @param PDO $pdo        Connexion à la base de données.
 * @param int $idCapitale ID de la capitale à afficher.
 * 
 * @return string Nom de la capitale associée à l'ID donné.
 */
function getNomCapitale($idCapitale)
{
    global $pdo;
    //$sql = $pdo->prepare("SELECT city.Name FROM city JOIN country ON city.id = country.Capital WHERE country.Capital = :id;");
    $sql = $pdo->prepare("SELECT city.Name FROM city WHERE :idc= city.id");
    $sql->bindParam(':idc', $idCapitale ,  PDO::PARAM_INT);
    $sql->execute();
    $nomCapitale = $sql->fetchColumn();
    return $nomCapitale;
}
  

// Exemple d'une fonction paramétrée, avec documentation technique PhpDoc  

/**
 * Obtenir la liste de tous les pays référencés d'un continent donné
 *
 * @param string $continent le nom d'un continent
 * 
 * @return array tableau d'objets (des pays)
 */
function getCountriesByContinent($continent)
{
    // pour utiliser la variable globale dans la fonction
    global $pdo;
    $query = 'SELECT * FROM Country WHERE Continent = :cont;';
    $prep = $pdo->prepare($query);
    // on associe ici (bind) le paramètre (:cont) de la req SQL,
    // avec la valeur reçue en paramètre de la fonction ($continent)
    // on prend soin de spécifier le type de la valeur (String) afin
    // de se prémunir d'injections SQL (des filtres seront appliqués)
    $prep->bindValue(':cont', $continent, PDO::PARAM_STR);
    $prep->execute();
    // var_dump($prep);  pour du debug
    // var_dump($continent);

    // on retourne un tableau d'objets (car spécifié dans connect-db.php)
    return $prep->fetchAll();
}

function getSurfaceArea()
{
    global $pdo;
    $query = 'SELECT DISTINCT(SurfaceArea) FROM Country;';
    return $pdo->query($query)->fetchAll();
}

function getLifeExpectancy()
{
    global $pdo;
    $query = 'SELECT DISTINCT(LifeExpectancy) FROM Country;';
    return $pdo->query($query)->fetchAll();
}

function getLanguage($idCountry)
{
    global $pdo;
    $sql = ("SELECT language.Name FROM language JOIN countrylanguage ON countrylanguage.idLanguage = language.id WHERE countrylanguage.idCountry = :idc;");
    $prep=$pdo->prepare($sql);
    $prep->bindParam(':idc', $idCountry ,  PDO::PARAM_INT);
    $prep->execute();
    
    return $prep->fetchAll();
}

function ajoutUtil($param){
    global $pdo;
    $requete = "INSERT INTO users (username, email, type, password) values (username, email, type, password)";
    $prep = $pdo->prepare($requete);
    $prep->bindValue(':username', $param['username']);
    $prep->bindValue(':email', $param['email']);
    $prep->bindValue(':type', $param['type']);
    $prep->bindValue(':password', $param['password']);
    $prep->execute();
}

function getAuthentification($username,$password){
    global $pdo;
    $query = "SELECT * FROM users where username=:username and password=:password";
    $prep = $pdo->prepare($query);
    $prep->bindValue(':username', $username);
    $prep->bindValue(':password', $password);
    $prep->execute();
    // on vérifie que la requête ne retourne qu'une seule ligne
    if($prep->rowCount() == 1){
    $result = $prep->fetch();
    return $result;
    }
    else
    return false;
}
?>