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

        if (!empty($_POST["num_raa"]))
        {
        
          $num_raa=$_POST["num_raa"];
         
          $search=$cnx->prepare("INSERT INTO rayon (`num_ra` ) VALUES (:num_raa)");
        
          $search->bindParam(':num_raa', $num_raa);
        
          $search->execute();

        }
      }
?>



 <form method="POST" action=" ">
<div class="form-group ">
                    
                    <div class="form-group ">
                      <label for="address" class="control-label col-lg-2">numero de rayon <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="num_raa" name="num_raa" type="num_raa">
                      </div>
                    </div>

                   
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" name="save">Save</button>
                        
                        <a class="btn btn-default" type="button" name="cancel" href="?page=rayon">cancel</a>
                         </form>
                      </div>
                    </div>
                 