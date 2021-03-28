<?php
    require("connection.php");

    if(isset($_GET["id"])) {
        $person_id = $_GET["id"];
    }
    else {
        $person_id = 0;
    };

    $query = "SELECT avatar, name, health, attack, defense, weapon, armor, bio, color FROM characters WHERE id= :id ";
    $result = $conn->prepare($query);
    $result->bindParam(":id", $person_id);
    $result->execute();
    $rows = $result->fetch();

    // echo "<pre>";
    // var_dump($rows);
    // echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Character - <?php echo $rows["name"]; ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="resources/css/style.css" rel="stylesheet"/>
</head>
<body>
<header><h1><?php echo $rows["name"]; ?></h1>
    <a class="backbutton" href="index.php"><i class="fas fa-long-arrow-alt-left"></i> Terug</a></header>
<div id="container">
    <div class="detail">
        <div class="left">
            <img class="avatar" src="resources/images/<?php echo $rows["avatar"]; ?>">
            <div class="stats" style="background-color: <?php echo $rows["color"]; ?>">
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fas fa-heart"></i></span><?php echo $rows["health"]; ?></li>
                    <li><span class="fa-li"><i class="fas fa-fist-raised"></i></span><?php echo $rows["attack"]; ?></li>
                    <li><span class="fa-li"><i class="fas fa-shield-alt"></i></span><?php echo $rows["defense"]; ?></li>
                </ul>
                <ul class="gear">
                    <li><b>Weapon</b>: <?php echo $rows["weapon"]; ?></li>
                    <li><b>Armor</b>: <?php echo $rows["armor"]; ?></li>
                </ul>
            </div>
        </div>
        <div class="right">
            <p>
                <?php echo $rows["bio"]; ?>
            </p>
        </div>
        <div style="clear: both"></div>
    </div>
</div>
<footer>&copy; Ventur van Rooijen 2020</footer>
</body>
</html>