<?php
include("conexion.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$formularioInvalido = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validación del campo 'name'
    if (empty($_POST["name"]) || strlen($_POST["name"]) < 4 || !preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚüÜ]+(?:\s[a-zA-ZáéíóúÁÉÍÓÚüÜ]+)?(?:\s[a-zA-ZáéíóúÁÉÍÓÚüÜ]+)?$/", $_POST["name"])) {
        $_SESSION["name_error"] = "El nombre no es válido. Debe contener al menos 4 caracteres y solo letras sin espacios al inicio.";
        $formularioInvalido = true;
    } else {
        // Limpiamos el mensaje de error si el campo es válido
        unset($_SESSION["name_error"]);
    }

    // Validación del campo 'email'
    if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $_SESSION["email_error"] = "El correo electrónico no es válido. Debe tener un formato válido, por ejemplo: testdeemail@test.tst";
        $formularioInvalido = true;
    } else {
        // Limpiamos el mensaje de error si el campo es válido
        unset($_SESSION["email_error"]);
    }

    // Validación del campo 'phone'
    if (empty($_POST["phone"]) || strlen($_POST["phone"]) != 10 || !ctype_digit($_POST["phone"])) {
        $_SESSION["phone_error"] = "El teléfono no es válido. Debe contener exactamente 10 dígitos numéricos.";
        $formularioInvalido = true;
    } else {
        // Limpiamos el mensaje de error si el campo es válido
        unset($_SESSION["phone_error"]);
    }
    if (empty($_POST["password"])) {
        $_SESSION["password_error"] = "La contraseña es obligatoria.";
        $formularioInvalido = true;
    } else {
        // Limpiamos el mensaje de error si el campo es válido
        unset($_SESSION["password_error"]);
    }

    // Redireccionar de vuelta al formulario
    if ($formularioInvalido) {
        header("Location: index.php");
        exit();
    }
}


if (isset($_POST['register'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = trim($_POST['password']);
    $fecha = date("d/m/y");
    $consulta = "INSERT INTO datos(nombre, email, telefono, contraseña, fecha)
        VALUES('$name', '$email', '$phone', '$password', '$fecha')";
    $resultado = mysqli_query($conex, $consulta);
    if ($resultado) {
      ?>
      <h3 class="success">Tu registro se ha completado</h3>
      <?php
    }else {
      ?>
      <h3 class="error">Ocurrio un error</h3>
      <?php
    }
    $_POST["name"] = "";
    $_POST["email"] = "";
    $_POST["phone"] = "";
    $_POST["password"] = "";
}
?>