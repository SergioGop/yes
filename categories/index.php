<?php
require_once("../config.php");

    $query = "SELECT * FROM categories";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $categorias = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YES</title>
</head>
<body>
    <h1>Categorías</h1>
    <a href="create.php">Crear</a>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($categorias as $categoria) { ?>
                <tr>
                    <td><?php echo $categoria['categorie_id'] ?></td>
                    <td><?php echo $categoria['name'] ?></td>
                    <td><?php echo $categoria['estatus'] ?></td>
                    <td><a href="update.php?id=<?php echo $categoria['categorie_id'] ?>">Editar</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>