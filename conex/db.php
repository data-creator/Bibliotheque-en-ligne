<?php 


$user='root';
$pass="";
$host="localhost";
$db="pfa_biblio";

try{
$cnx= new PDO("mysql:host=$host;dbname=$db",$user,$pass);
}


catch(PDOException $e){
  echo $e->getMessage();
}


 ?>