<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css" />
</head>
<body>
<?php
require('connect-db.php');

if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['type'], $_REQUEST['password'])){
  // récupérer le nom d'utilisateur 
  $username = stripslashes($_REQUEST['username']);
  $username = htmlspecialchars($username); 
  // récupérer l'email 
  $email = stripslashes($_REQUEST['email']);
  $email = htmlspecialchars($email);
  // récupérer le mot de passe 
  $password = stripslashes($_REQUEST['password']);
  $password = htmlspecialchars($password);
  // récupérer le type (user | admin)
  $type = stripslashes($_REQUEST['type']);
  $type = htmlspecialchars($type);
  
    $query = "INSERT into `users` (username, email, type, password)
          VALUES (:username, :email, :type, :password)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':password', hash('sha256', $password));
    $res = $stmt->execute();

    if($res){
       echo "<div class='sucess'>
             <h3>L'utilisateur a été créée avec succés.</h3>
             <p>Cliquez <a href='home.php'>ici</a> pour retourner à la page d'accueil</p>
       </div>";
    }
}else{
?>
<form class="box" action="" method="post">
  <h1 class="box-logo box-title">
  </h1>
    <h1 class="box-title">Add user</h1>
  <input type="text" class="box-input" name="username" 
  placeholder="Nom d'utilisateur" required />
  
    <input type="text" class="box-input" name="email" 
  placeholder="Email" required />
  
  <div>
      <select class="box-input" name="type" id="type" >
        <option value="" disabled selected>Type</option>
        <option value="admin">Admin</option>
        <option value="user">User</option>
      </select>
  </div>
  
    <input type="password" class="box-input" name="password" 
  placeholder="Mot de passe" required />
  
    <input type="submit" name="submit" value="+ Add" class="box-button" />
</form>
<?php } ?>
</body>
</html>
