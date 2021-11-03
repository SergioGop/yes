<?php 
if(!empty($_POST)){

    require_once("../config.php");
    $name = $_POST['name'];
    $query = "insert into categories(name) values('$name');";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    header("Location: index.php");
    exit;
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Crear categoría</h1>

    <form method="post">
        <p>
            Nombre
            <input type="text" name="name" required>
        </p>
        <input type="submit" value="Aceptar">
    </form>
    <p>
        <a href="index.php">Regresar</a>
    </p>
</body>
</html>
<?php } ?>