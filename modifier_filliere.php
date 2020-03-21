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
        if (!empty($_POST["nom_fillieree"])) 
          {
            $nom_filliere=$_POST["nom_fillieree"];
            
            $id=$_GET["id"];

          $search=$cnx->prepare("UPDATE `filliere` SET `nom_filliere`=:nom_fillieree WHERE id_fil=:id");

            $search->bindParam(':nom_fillieree', $nom_filliere);
             $search->bindParam(':id', $id);
             $search->execute();
          }
        }
?>




 <form method="POST" action=" ">
<div class="form-group ">
                    
                    <div class="form-group " style="margin-left: 10px;">
                      <label for="address" class="control-label col-lg-2">nom_filliere <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="nom_fillieree" name="nom_fillieree" type="nom_fillieree">
                      </div>
                    </div>

                   
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" name="save">Save</button>
                        
                        <a class="btn btn-default" type="button" name="cancel" href="?page=filliere">cancel</a>
                         </form>
                      </div>
                    </div>
                 