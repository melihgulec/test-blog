<?php 

include('../scripts/connection.php');

$categoryId = $_GET['categoryId'];

$getCategoryData = $connection->query("SELECT * FROM categories WHERE id = '".$categoryId."'");
$category = $getCategoryData->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/normalize.css">
    <link rel="stylesheet" href="../styles/panel.css">
    <link rel="stylesheet" href="../styles/categoryEdit.css">
    <script src="https://kit.fontawesome.com/b6283481d8.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function editCategory() {
            var categoryName = document.getElementById("categoryName").value;

            $.post("../scripts/panelCategoryActions.php", {categoryId: <?php echo $category['id'] ?>, categoryName: categoryName, actionId: 1},
                function(data) {
                    $('#results').html(data);
            });
        }
    </script>
</head>
<body>
    <?php include("../components/sideBar.php") ?>    
    <div class="content">
        <h3>Kategori Düzenle</h3>
        <label for="categoryId" class="inputLabel">Kategori ID</label>
        <input type="text" name="categoryId" id="categoryId" value="<?php echo $category['id']; ?>" readonly>
        <label for="categoryName" class="inputLabel">Kategori Adı</label>
        <input type="text" name="categoryName" id="categoryName" value="<?php echo $category['Name']; ?>">
        <button class="editButton" onclick="editCategory()">Düzenle</button>
    </div>
    <div id="results"></div>
</body>
</html>