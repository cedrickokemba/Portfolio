<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="connexion.css">
</head>
<body>
<div class="card">
  <h4 class="title">SE CONNECTER !</h4>
  <form action="login.php" method="post">
    <div class="field">
      <svg class="avatar-icon" viewBox="0 0 17 15">
        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"></path>
      </svg>
      <input autocomplete="off" id="logusername" placeholder="Nom d'utilisateur" class="input-field" name="username" type="text">
    </div>
    <div class="field">
      <svg class="input-icon" viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg">
      <path d="M80 192V144C80 64.47 144.5 0 224 0C303.5 0 368 64.47 368 144V192H384C419.3 192 448 220.7 448 256V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V256C0 220.7 28.65 192 64 192H80zM144 192H304V144C304 99.82 268.2 64 224 64C179.8 64 144 99.82 144 144V192z"></path></svg>
      <input autocomplete="off" id="logpass" placeholder="Mot de passe" class="input-field" name="password" type="password">
    </div>
    <button class="btn" type="button" onclick="window.location.href='register.php'">S'inscrire</button>
    <button class="btn" type="submit" value="Connexion" name="submit">Connectez-vous ici</button>
    <button class="btn" type="button" onclick="window.location.href='../index.php'">RETOUR</button>
  <?php if (! empty($message)) { ?>
      <p class="errorMessage"><?php echo $message; ?></p>
  <?php } ?>
  </form>
</div>
</body>
</html>