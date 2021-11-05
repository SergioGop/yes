<?php 
    require_once("../config.php");
if(!empty($_POST)){
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $link = $_POST['link'];
    $click = $_POST['click'];
    $estatus = $_POST['estatus'];
    $categorie_id = $_POST['categorie_id'];

    $query = "insert into products 
    (name,brand,price,description,link,click,estatus,categorie_id) 
    values ('$name','$brand','$price','$description','$link','$click','$estatus',$categorie_id)";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    header("Location: index.php");
    exit;
} else {
    $query = "SELECT * FROM categories WHERE estatus=1";
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
    <title>Document</title>
</head>
<body>
    <h1>Crear producto</h1>

    <form method="post">
        <p>
            Nombre
            <input type="text" name="name" required>
        </p>
        <p>
            Marca
            <input type="text" name="brand" required>
        </p>
        <p>
            Precio
            <input type="text" name="price" required>
        </p>
        <p>
            descripcion
            <input type="text" name="description" required>
        </p>
         <p>
            Link
            <input type="text" name="link" required>
        </p>
        <p>
            Click
            <input type="text" name="click" required>
        </p>
        <p>
            Estatus
            <select name="estatus">
               <option value=1>Activo</option>
               <option value=0>Inctivo</option>
           </select>
        </p>
         <p>
            Categoria
            <select name="categorie_id" required>
                 <?php foreach($categorias as $categoria) { ?>
                    <option value="">Seleccionar</option>
                    <option value="<?php echo $categoria['categorie_id'] ?>">
                        <?php echo $categoria['name'] ?>
                    </option>
                <?php } ?>
            </select>
        </p>
        <input type="submit" value="Aceptar">
    </form>
    <p>
        <a href="index.php">Regresar</a>
    </p>
</body>
</html>
<?php } ?>