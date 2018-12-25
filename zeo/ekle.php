<?php


session_start();


     if ( empty($_SESSION["user"])) {
        header("Location: login.php");
        exit ;
  } 
    
    
    $user = $_SESSION["user"];
    $userId = $user['id'];
    
    
    
require_once './db.php';
if(isset($_POST['ekle'])){
    
    extract($_POST);
    
    $sql = "insert into list (userId, onem, konu, zaman, durum, id) values(?,?,?,?,?,?)";
    $stmt = $db->prepare($sql);
    $stmt -> execute([$userId, $onem, $konu, $zaman, 0, $id]);
    
    sleep(3);

    header("Location: index.php");
    
    
    
}


?>

<html>
    <head>
        <meta charset="UTF-8">
    <title></title>
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <script src="jquery-2.1.1.js" type="text/javascript"></script>
    <style>
        #ok {
            text-align: center;
            opacity: 0;
        }
    </style>
</head>
<body>
    <form action="" method="post">
    <h1>Ekleme</h1>
    <table>
        
             <tr>
            <td>
                ID:
            </td>
            <td>
        <input type="text" name="id">
            </td>
        </tr>
       
         <tr>
            <td>
                Önem:
            </td>
            <td>
        <input type="text" name="onem">
            </td>
        </tr> <tr>
            <td>
                Konu:
            </td>
            <td>
        <input type="text" name="konu">
            </td>
        </tr>
        <tr>
            <td>
                Zaman:
            </td>
            <td>
        <input type="date" name="zaman">
            </td>
        </tr>
        <tr>
             <td colspan="2">
        <input type="submit" name="ekle" value="EKLE" id="ekle">
            </td>
        </tr>
    </table>
    </form>
<div id="ok">
    <p>Ekleme başarılı, ana sayfaya yönlendiriliyorsunuz...</p>
</div>
</body>
<script>


$("#ekle").click(function() {
    
    $("#ok").animate({opacity: '1'}, 1000);
    

    
    });



</script>
</html>
