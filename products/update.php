<?php 
require_once("../config.php");
if(!empty($_POST)){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $estatus = $_POST['estatus'];
    $query = "update categories set name = '$name', estatus=$estatus where categorie_id = $id;";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    header("Location: index.php");
    exit;
} else {

    $id = $_GET['id'];
    $query = "select * from categories where categorie_id = $id;";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $category = $stmt->fetch();
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
        <input type="hidden" name="id" value="<?php echo $category['categorie_id'];?>">
        <p>
            Nombre
            <input type="text" name="name" value="<?php echo $category['name'];?>" required>
        </p>
        <p>
            Estatus
           <select name="estatus">
               <option value=1 <?php if($category['estatus']==1) { echo "selected"; } ?>>Activo</option>
               <option value=0 <?php if($category['estatus']==0) { echo "selected"; } ?>>Inctivo</option>
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