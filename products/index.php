<?php
require_once("../config.php");

    $query = "select products.*, categories.name as category_name
	            from products
	            inner join categories on products.categorie_id = categories.categorie_id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $products = $stmt->fetchAll();
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
    <h1>Productos</h1>
    <a href="create.php">Crear</a>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Precio</th>
                <th>Descripcion</th>
                <th>Link</th>
                <th>Click</th>
                <th>Estatus</th>
                <th>Categoria</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $product) { ?>
                <tr>
                    <td><?php echo $product['product_id'] ?></td>
                    <td><?php echo $product['name'] ?></td>
                    <td><?php echo $product['brand'] ?></td>
                    <td><?php echo $product['price'] ?></td>
                    <td><?php echo $product['description'] ?></td>
                    <td><?php echo $product['link'] ?></td>
                    <td><?php echo $product['click'] ?></td>
                    <td><?php echo $product['estatus'] ?></td>
                    <td><?php echo $product['category_name'] ?></td>
                    <td><a href="update.php?id=<?php echo $product['product_id'] ?>">Editar</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>