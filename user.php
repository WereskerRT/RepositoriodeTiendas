 <?php
    include("header.html");
    
    include("database.php");

    $con = connection(); 
    
    $sql = "SELECT * FROM `products`";
    $query = mysqli_query($con, $sql);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style_user.css">
</head>
<body>
    <main>
        <div id="fieldRecord">
            <legend>Ingreso de Usuario</legend>
            <fieldset>
                <form id="userData" action="<?php $_SERVER["PHP_SELF"]?>" method="post">
                    <label class="formHead" for="">Nombre del Producto</label><br>
                    <input class="formInput" type="text" name="nProduct" placeholder="Ingresar Nombre" required><br>
                    <label class="formHead" for="">Ingresa una descripción</label><br>
                    <textarea class="formInput" name="inProduct" rows="8" cols="60" required></textarea>
                    <label class="formInput">Ingresa el Precio</label>
                    <input type="number" name="priceP">
                    <input type="submit" name="submit" Value="register">
                </form>
            </fieldset>
        </div>
        <table>
            <thread>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Info</th>
                    <th>Precio</th>
                </tr>
            </thread>
            <tbody>
                <?php while($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th><?= $row['id'] ?></th>
                        <th><?=  $row['nameProduct'] ?></th>
                        <th><?=  $row['infoProduct'] ?></th>
                        <th><?=  $row['priceProduct'] ?></th>
                        <th><a href="editar.php?id=<?= $row['id'] ?>">Editar</a></th>
                        <th><a href="eliminar.php?id=<?= $row['id'] ?>">Eliminar</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
<?php 

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $nProduct = filter_input(INPUT_POST, "nProduct", FILTER_SANITIZE_SPECIAL_CHARS);
    $infoProduct = filter_input(INPUT_POST, "inProduct", FILTER_SANITIZE_SPECIAL_CHARS);
    $priProduct = $_POST["priceP"];

    $sql = "INSERT INTO products (id, nameProduct, infoProduct, priceProduct)
            VALUES (NULL, '$nProduct', '$infoProduct', '$priProduct')";
    $query = mysqli_query($con, $sql);

    if ($query) {
    header("Location: user.php");
    };
    }
?>
<?php
    include("footer.html");
?>