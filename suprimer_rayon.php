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
			$search=$cnx->prepare("DELETE FROM `rayon` WHERE `id_ra`=:id");
			 $search->bindParam(':id', $id);
			$search->execute();
		}

		echo"<script>document.location = 'master.php?page=rayon&title=rayon' </script>";
		
?>