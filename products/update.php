<?php 
    require_once("../config.php");
if(!empty($_POST)){
    
     $id = $_POST['product_id'];
     $name = $_POST['name'];
     $brand = $_POST['brand'];
     $price = $_POST['price'];
     $description = $_POST['description'];
     $link = $_POST['link'];
     $click = $_POST['click'];
     $estatus = $_POST['estatus'];
     $categorie_id = $_POST['categorie_id'];

     $query = "update products set name='$name', brand='$brand', 
                    price='$price', 
                    description='$description',
                    link='$link',
                    click='$click',
                    estatus='$estatus',
                    categorie_id='$categorie_id'
                    WHERE product_id = $id;
                    ";
     $stmt = $conn->prepare($query);
     $stmt->execute();
     header("Location: index.php");
     exit;
} else {
    $id = $_GET['id'];
    $query = "SELECT * FROM products WHERE product_id = $id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $product = $stmt->fetch();

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
    <title>Document</title>
</head>
<body>
    <h1>Editar producto</h1>

    <form method="post">
        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
        <p>
            Nombre
            <input type="text" name="name" value="<?php echo $product['name']; ?>" required>
        </p>
        <p>
            Marca
            <input type="text" name="brand" value="<?php echo $product['brand']; ?>" required>
        </p>
        <p>
            Precio
            <input type="text" name="price" value="<?php echo $product['price']; ?>" required>
        </p>
        <p>
            descripcion
            <input type="text" name="description" value="<?php echo $product['description']; ?>" required>
        </p>
         <p>
            Link
            <input type="text" name="link" value="<?php echo $product['link']; ?>" required>
        </p>
        <p>
            Click
            <input type="text" name="click" value="<?php echo $product['click']; ?>" required>
        </p>
        <p>
            Estatus
            <select name="estatus">
               <option value=1 <?php if($product['estatus']==1){ echo "selected"; }?> >Activo</option>
               <option value=0 <?php if($product['estatus']==0){ echo "selected"; }?> >Inactivo</option>
           </select>
        </p>
         <p>
            Categoria
            <select name="categorie_id" required>
                 <?php foreach($categorias as $categoria) { ?>
                    <option value="">Seleccionar</option>
                    <option value="<?php echo $categoria['categorie_id'] ?>" <?php if($product['categorie_id']==$categoria['categorie_id']){ echo "selected"; }?>>
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