<?php 

include('../scripts/connection.php');
$categories_query = $connection->query("SELECT * FROM categories");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/normalize.css">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/panel.css">
    <link rel="stylesheet" href="../styles/categoriesList.css">
    <script src="https://kit.fontawesome.com/b6283481d8.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include("../components/sideBar.php") ?>    
    <div class="content">
        <h3>Kategori Listesi.</h3>
        <?php 
            while($categorie = $categories_query->fetch_assoc()){
                echo '
                <div class="categoriesContainer">
                    <div class="categorieInfo">
                        <label for="" class="title">'.$categorie['Name'].'</label>
                        <label for="" class="description">'.$categorie['id'].'</label>
                    </div>
                    <div class="iconGroup">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <i class="fa-solid fa-trash"></i>
                    </div>
                </div>
                ';
            }
        ?>
        
    </div>
</body>
</html>
