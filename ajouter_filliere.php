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

if (isset($_POST["save"])) 
      {
        extract($_POST);

        if (!empty($_POST["nom_filliere"]))
        {
          
          $nom_filliere=$_POST["nom_filliere"];
         
          $search=$cnx->prepare("INSERT INTO filliere ( `nom_filliere` ) VALUES (:nom_filliere)");
        
          $search->bindParam(':nom_filliere', $nom_filliere);
        
          $search->execute();
         
        }
      }
?>



 <form method="POST" action=" ">
<div class="form-group ">
                    
                    <div class="form-group " style="margin-left: 10px;">
                      <label for="address" class="control-label col-lg-2">nom_filliere <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="nom_filliere" name="nom_filliere" type="num_raa">
                      </div>
                    </div>

                   
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" name="save">Save</button>
                        
                        <a class="btn btn-default" type="button" name="cancel" href="?page=filliere">cancel</a>
                         </form>
                      </div>
                    </div>
                 