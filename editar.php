<?php
    include("database.php");
    $con = connection();

    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id= '$id'";
    $query = mysqli_query($con, $sql); 
    $row = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
                <form id="userData" action="<?php $_SERVER["PHP_SELF"]?>" method="post">
                    <h1>Editar Producto</h1>
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <label class="formHead" for="">Nombre del Producto</label><br>
                    <input class="formInput" type="text" name="nProduct" placeholder="Ingresar Nombre" required><br>
                    <label class="formHead" for="">Ingresa una descripción</label><br>
                    <textarea class="formInput" name="infoProduct" rows="8" cols="60" required></textarea>
                    <label class="formInput">Ingresa el Precio</label>
                    <input type="number" name="priceP" required>
                    <input type="submit" name="submit" Value="register">
                </form>
</body>
</html>

<?php
    
    $con = connection();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nameChanged = $_POST["nProduct"];
    $infoChanged = $_POST["infoProduct"];
    $priceChanged = $_POST["priceP"];

    $sql = "UPDATE `products` SET 
            nameProduct = '$nameChanged', 
            infoProduct = '$infoChanged',
            priceProduct = '$priceChanged'
            WHERE `id` = $id";

    $query = mysqli_query($con, $sql);
    if ($query) {
    header("Location: user.php");
    };
}

?>