<?php

// modify dsn, user and pass for your dbms.
// import "product.sql" into your database to create product table.
$dsn = 'mysql:host=localhost;dbname=test;charset=utf8mb4';
$user = 'root' ;
$pass = '' ;

// Connect to DB
try {
   $db = new PDO( $dsn, $user, $pass);
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //print "<p>DB Connected</p>" ;
    } catch( Exception $ex) {  
       // log into a logfile.
       echo "<p>DB Connection Error</p>" ;
       exit;
}