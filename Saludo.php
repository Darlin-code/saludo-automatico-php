<?php
    session_start();
    
    //Validando el nombre del usuario.
    if (isset($_POST["nombre"])) {
        if (is_numeric($_POST["nombre"])) {
            unset($_SESSION["nombre"]);
            $_SESSION["error"] = "<p style='color: red;'>Ingrese su nombre.</p>";
            header("Location: Saludo-completo-v2.php");
            return;
        } else {
            $_SESSION["nombre"] = htmlentities($_POST["nombre"]);
            header("Location: Saludo-completo-v2.php");
            return;
        }
    }

    //Verificando la hora actual.
    function Saludo() {
        date_default_timezone_set("America/Santo_Domingo");
        $fecha = getdate();
        
        switch($fecha["hours"]) {
            case $fecha["hours"] > 18 || $fecha["hours"] === 0 || $fecha["hours"] < 5:
                return "Buenas noches, ";
            break;
            case $fecha["hours"] >= 5 && $fecha["hours"] <= 12:
                return "Buenos dias, ";
            break;
            case $fecha["hours"] > 12 && $fecha["hours"] <= 18:
                return "Buenas tardes, ";
            break;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saludo completo v2</title>
</head>
<body>
    <form action="" method="post">
        <label for="name">
            Nombre: <input type="text" name="nombre" id="name">
        </label>
        <button type="submit">Enviar</button>
    </form>
    <?php
        if (isset($_SESSION["error"])) {
            echo $_SESSION["error"];
            unset($_SESSION["error"]);
        }

        if (isset($_SESSION["nombre"])) {
            echo "<hr>" . Saludo() . $_SESSION["nombre"];
        }
    ?>
</body>
</html>
