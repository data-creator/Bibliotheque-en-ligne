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
  //MODIFIER

  if (isset($_POST['save'])) 
        {
        if (!empty($_POST["libelle"])) 
          {
            $libelle=$_POST["libelle"];
            
            $id=$_GET["id"];

          $search=$cnx->prepare("UPDATE `matiere` SET `libelle`=:libelle WHERE code_matiere=:id");

            $search->bindParam(':libelle', $libelle);
            $search->bindParam(':id', $id);
             $search->execute();
          }
        }
?>




 <form method="POST" action=" ">
<div class="form-group ">
                    
                    <div class="form-group ">
                      <label for="address" class="control-label col-lg-2">libelle <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="libelle" name="libelle" type="num_raa">
                      </div>
                    </div>

                   
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" name="save">Save</button>
                        
                        <a class="btn btn-default" type="button" name="cancel" href="?page=matiere">cancel</a>
                         </form>
                      </div>
                    </div>
                 