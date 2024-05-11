<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Registro</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <form method="post">

    <h2>Hola</h2>
    <p>Inicia tu registro</p>

    <div class="conten-input">
        <div class="input-wrapper">
          <input type="text" name="name" placeholder="Nombre">
          <img class="input-icon" src="images/name.svg" alt="">
        </div>
        <?php if (isset($_SESSION["name_error"])): ?>
          <small class="alert"><?php echo $_SESSION["name_error"]; ?></small>
          <?php unset($_SESSION["name_error"]); ?>
        <?php endif; ?>
    </div>

    <div class="conten-input">
        <div class="input-wrapper">
        <input type="email" name="email" placeholder="Email">
        <img class="input-icon" src="images/email.svg" alt="">
        </div>
        <?php if (isset($_SESSION["email_error"])): ?>
            <small class="alert"><?php echo $_SESSION["email_error"]; ?></small>
            <?php unset($_SESSION["email_error"]); ?>
        <?php endif; ?>
    </div>

    <div class="conten-input">
        <div class="input-wrapper">
        <input type="tel" name="phone" placeholder="Telefono">
        <img class="input-icon" src="images/phone.svg" alt="">
        </div>
        <?php if (isset($_SESSION["phone_error"])): ?>
            <small class="alert"><?php echo $_SESSION["phone_error"]; ?></small>
            <?php unset($_SESSION["phone_error"]); ?>
        <?php endif; ?>
    </div>
    <div class="conten-input">
        <div class="input-wrapper">
        <input type="password" name="password" placeholder="Contraseña">
        <img class="input-icon" src="images/password.svg" alt="">
        </div>
        <?php if (isset($_SESSION["password_error"])): ?>
            <small class="alert"><?php echo $_SESSION["password_error"]; ?></small>
            <?php unset($_SESSION["password_error"]); ?>
        <?php endif; ?>
    </div>
    <input class="btn" type="submit" name="register" value="Enviar">

</form> 

  <?php
      include("registrar.php");
  ?>

</body>
</html>