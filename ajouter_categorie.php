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

        if (!empty($_POST["nom_categ"]))
        {
        
          $nom_categ=$_POST["nom_categ"];
         
          $search=$cnx->prepare("INSERT INTO categorie_livre (`nom_categ`, `image`) VALUES (:nom_categ,:image)");
        
          $search->bindParam(':nom_categ', $nom_categ);
         $search->bindParam(':image', $target_file);
          $search->execute();

        }
      }
?>



 <form method="POST" action=" "  enctype="multipart/form-data">
<div class="form-group ">
                    
                    <div class="form-group ">
                      <label for="address" class="control-label col-lg-2">nom de categorie <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="nom_categ" name="nom_categ" type="nom_categ">
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
                        
                        <a class="btn btn-default" type="button" name="cancel" href="?page=categorie">cancel</a>
                         </form>
                      </div>
                    </div>
                 