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

        if (!empty($_POST["nom_groupe"])&& !empty($_POST["id_fill"])   )
        {

          $nom_groupe=$_POST["nom_groupe"];
           $id_fill=$_POST["id_fill"];
         
          $search=$cnx->prepare("INSERT INTO groupe (`nom_groupe`, `id_fill` ) VALUES (:nom_groupe,:id_fill)");
          $search->bindParam(':nom_groupe', $nom_groupe);
           $search->bindParam(':id_fill', $id_fill);
          $search->execute();
        }
      }
?>



 <form method="POST" action=" ">
<div class="form-group ">
                      
                    <div class="form-group ">
                      <label for="address" class="control-label col-lg-2">nom_groupe <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="nom_groupe" name="nom_groupe" type="nom_groupe">
                      </div>
                    </div>

                     <select class="form-control" name="id_fill">
                               <?php

                               $search=$cnx->prepare("SELECT  id_fil, nom_filliere FROM `filliere` ");
                               $search->execute(); 
                                    while ($donne1=$search->fetch()){ 
                                 
                                    echo "  <option value='".  $donne1[0]."'>
                                    $donne1[1]
                              
                            </option>
                         "; 

                                  }

                            ?>
                        </select>
                                   
                   
                    <div class="form-group" style="margin-top:20px;">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" name="save">Save</button>
                        
                        <a class="btn btn-default" type="button" name="cancel" href="?page=groupe">cancel</a>
                         </form>
                      </div>
                    </div>
                 