<?php 

include('../scripts/connection.php');
$users_query = $connection->query("SELECT * FROM user");

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
    <link rel="stylesheet" href="../styles/userList.css">
    <script src="https://kit.fontawesome.com/b6283481d8.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include("../components/sideBar.php") ?>    
    <div class="content">
        <h3>Kullanıcı Listesi.</h3>
        <?php 
            while($user = $users_query->fetch_assoc()){
                $fullName = $user['Name']." ".$user['Surname'];
                echo '
                <div class="userContainer">
                    <div class="baseContainer">
                        <i class="fa-solid fa-user"></i>
                        <div class="userInfo">
                        <label for="" class="title">'.$fullName.'</label>
                        <label for="" class="description">'.$user['Email'].'</label>
                        </div>
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
