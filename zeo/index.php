<html>
    <head>
        <meta charset="UTF-8">
    <title></title>
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <script src="jquery-2.1.1.js" type="text/javascript"></script>
</head>
<body>
    <?php
      session_start();

     if ( empty($_SESSION["user"])) {
        header("Location: login.php");
        exit ;
  } 
    
    
    $user = $_SESSION["user"];
    $id = $user['id'];
    
    
    require_once './db.php';
    
    echo "<div id='ekle'><a href='ekle.php'><img src='add-icon.png'></a></div>";
    
    echo "<h1>Yapılacaklar<h1>";
    
    $sql = "select * from list";
    $stmt = $db->query($sql);
    
    echo "<table><tr><td>Önem</td><td>Konu</td><td>Zaman</td><td>Durum</td><td>Değiştir</td><td>Sil</td></tr>";
    
    foreach ($stmt as $item){
        if($item['userId'] == $id){
        echo "<tr>";
        echo "<td>".$item['onem']."</td>";
        echo "<td>".$item['konu']."</td>";
        echo "<td>".$item['zaman']."</td>";
        if($item['durum'] != 1){
          echo "<td><a href='yap.php?id={$item['id']}'>Yap</a></td>";
        }else {
            echo "<td id='yapildi'>YAPILDI</td>";
        }
        echo "<td><a href='degis.php?id={$item['id']}'><img src='edit.png'></a></td>";
        echo "<td><a href='sil.php?id={$item['id']}' ><img src='del.png'></a></td>";
        echo "</tr>";    
        }
    }

    echo "</table>";
    
    ?>
</body>

</html>
