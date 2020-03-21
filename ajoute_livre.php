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
        $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        
        $uploadOk = 1;
    } else {
        echo "File is not an image. </br>";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
 //   echo "Sorry, file already exists.</br>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.</br>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.</br>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
   // echo "Sorry, your file was not uploaded.</br>"; 
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.</br>";
    }
}


        if (!empty($_POST["nom_li"])  && !empty($_POST["nom_auteur"]) && !empty($_POST["nbr_exempl"])&& !empty($_POST["id_ca"]) )

        {
          $nom_li=$_POST["nom_li"];
          $nom_auteur=$_POST["nom_auteur"];
          $nbr_exempl=$_POST["nbr_exempl"];
          $id_ca=$_POST["id_ca"];
      

          
      $search=$cnx->prepare("INSERT INTO livre (`nom_li`, `nom_auteur`, `nbr_exempl`, `id_ca` ,`image` ) VALUES (:nom_li,:nom_auteur,:nbr_exempl,:id_ca,`image`=:image)");
          $search->bindParam(':nom_li', $nom_li);
          $search->bindParam(':nom_auteur', $nom_auteur);
          $search->bindParam(':nbr_exempl', $nbr_exempl);
          $search->bindParam(':id_ca', $id_ca);
           $search->bindParam(':image', $target_file);
        
          $search->execute();
        }
      }
?>


<div href="" class="logo" style="font-size: 25px; margin:0px 0px 10px 50px;">ajouter <span class="lite">livre</span></div>
 <form method="POST" action=" "  enctype="multipart/form-data">

                    <div class="form-group ">
                      <label for="nom" class="control-label col-lg-2">Nom de livre<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="nom_li" name="nom_li" type="nom_li">
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="prenom" class="control-label col-lg-2">nom auteur <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="nom_auteur" name="nom_auteur" type="nom_auteur">
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="date" class="control-label col-lg-2">nbr_exempl <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input data-provide="datepicker"  id="nbr_exempl" name="nbr_exempl" type="nbr_exempl">
                      </div>
                    </div>
                   
                   
                     <div class="form-group ">
                      <label for="address" class="control-label col-lg-2">categorie livre <span class="required">*</span></label>
                      <div class="col-lg-10">
                       
                         <select class=" form-control" name="id_ca">
                            <?php

                               $search=$cnx->prepare("SELECT  id_ca, nom_categ FROM `categorie_livre` ");
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
                    </div>

                    <div class="form-group ">
                      <label for="username" class="control-label col-lg-2">image <span ></span></label>
                      <div class="col-lg-10">
          
   
    <input  class="form-control " type="file" name="fileToUpload" id="fileToUpload">

                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" name="save">Save</button>
                           <a class="btn btn-default" type="button" name="cancel" href="?page=listelivre">cancel</a>
                      </div>
                    </div> </form>