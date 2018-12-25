<?php


session_start();

require_once './db.php';


     if ( empty($_SESSION["user"])) {
        header("Location: login.php");
        exit ;
  } 
  
  
    
    
    $user = $_SESSION["user"];
    $userId = $user['id'];
    
  $id = $_GET["id"] ;
  $stmt = $db->prepare("select * from list where id=? and userId = ?");
  $stmt->execute([$id, $userId]);
  $stmt = $stmt->fetch() ;  
    
//    $sql = "select * from list where userId=$userId and id={$_GET['id']}";
//    $stmt = $db->query($sql);
    $onem = $stmt['onem'];
    $durum = $stmt['durum'];
    $id = $stmt['id'];
    $zaman = $stmt['zaman'];
    $konu = $stmt['konu'];
   
    
    
    
require_once './db.php';
if(isset($_POST['degis'])){
    
    extract($_POST);
    
    $sql = "update list set id=?, onem=?, konu=?, zaman=? where userId=? and id=?";
    $stmt = $db->prepare($sql);
    $stmt -> execute([$id, $onem, $konu, $zaman, $userId, $id ]);
    
    header("Location: index.php");
    
    
    
}


?>

<html>
    <head>
        <meta charset="UTF-8">
    <title></title>
    <link href="style.css" rel="stylesheet" type="text/css"/>
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
        <input type="text" name="id" value="<?php echo $id; ?>">
            </td>
        </tr>
       
         <tr>
            <td>
                Önem:
            </td>
            <td>
        <input type="text" name="onem" value="<?php echo $onem; ?>">
            </td>
        </tr> <tr>
            <td>
                Konu:
            </td>
            <td>
        <input type="text" name="konu" value="<?php echo $konu; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Zaman:
            </td>
            <td>
        <input type="date" name="zaman" value="<?php echo $zaman; ?>">
            </td>
        </tr>
        <tr>
             <td colspan="2">
        <input type="submit" name="degis" value="Değiştir">
            </td>
        </tr>
    </table>
    </form>
</body>
</html>
