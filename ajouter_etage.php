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

        if (!empty($_POST["num_et"]) && !empty($_POST["id_ra"]) )
        {
          
          $num_et=$_POST["num_et"];
           $id_ra=$_POST["id_ra"];
         
          $search=$cnx->prepare("INSERT INTO etage (`num_et`, `id_ra`) VALUES (:num_et,:id_ra)");
        
          $search->bindParam(':num_et', $num_et);
           $search->bindParam(':id_ra', $id_ra);
        
          $search->execute();
         
        }
      }
?>



 <form method="POST" action=" ">

                    <div class="form-group ">
                      <label for="address" class="control-label col-lg-2">numero de etage <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="num_et" name="num_et" type="num_et">
                      </div>
                    </div>
                     <form method="POST" action=" ">


                   <div class="form-group ">
                      <label for="address" class="control-label col-lg-2">numero rayon <span class="required">*</span></label>

                      <div class="col-lg-10">

                        <select class=" form-control" name="id_ra">
                               <?php

                               $search=$cnx->prepare("SELECT   id_ra ,num_ra FROM `rayon` ");
                               $search->execute(); 
                                    while ($donne1=$search->fetch()){ 
                                 
                                    echo "  <option value='".  $donne1[0]."'>
                                    $donne1[1]
                              
                            </option>
                         "; 

                                  }

                             
                          
                            ?>
                        </select>
                      </div>

                   
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" name="save">Save</button>
                        
                        <a class="btn btn-default" type="button" name="cancel" href="?page=etage">cancel</a>
                       
                         </form>
                      </div>
                    </div>
                 




