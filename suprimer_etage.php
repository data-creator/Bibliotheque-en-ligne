<?php 
/////cnx
    $servernam="localhost";
    $usernam="root";
    $pas="";
      try
      {
        $cnx=new PDO("mysql:host=$servernam;dbname=pfa_biblio",$usernam,$pas);
        $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch(PDOException $E)
      {
        echo $E->getMessage();
      }
 
?>



<?php
////////SUPPRIMER
		if (isset($_GET["id"])) 
		{
			$id=$_GET["id"];
			$search=$cnx->prepare("DELETE FROM `etage` WHERE `id_et`=:id");
			 $search->bindParam(':id', $id);
			$search->execute();
		}

		echo"<script>document.location = 'master.php?page=etage&title=etage' </script>";
		
?>