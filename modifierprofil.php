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

if (isset($_POST["modifier"])) 
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

        if (!empty($_POST["nom"])  && !empty($_POST["prenom"]) && !empty($_POST["email"])&& !empty($_POST["password"]))

        {
          $nom=$_POST["nom"];
          $prenom=$_POST["prenom"];
          $password=$_POST["password"];
          $email=$_POST["email"];

             $search=$cnx->prepare("UPDATE `admin` SET `nom`=:nom,`prenom`=:prenom,`email`=:ema,`password`=:pass,`image`=:image WHERE id=1");          
 
          $search->bindParam(':nom', $nom);
          $search->bindParam(':prenom', $prenom);
          $search->bindParam(':ema', $email);
          $search->bindParam(':pass', $password);
          $search->bindParam(':image', $target_file);
          $search->execute();
        }
      }
?>


<div href="" class="logo" style="font-size: 25px; margin:0px 0px 10px 30px;">modifier <span class="lite">mon profil</span></div>
 <form method="POST" action=" " enctype="multipart/form-data">
 
                    <div class="form-group ">
                      <label for="nom" class="control-label col-lg-2">Nom <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="nom" name="nom" type="nom">
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="prenom" class="control-label col-lg-2">prenom <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="prenom" name="prenom" type="text">
                      </div>
                    </div>
                   <div class="form-group ">
                      <label for="email" class="control-label col-lg-2">Email <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="email" name="email" type="email">
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="confirm_password" class="control-label col-lg-2">password <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="password" name="password" type="password">
                      </div>
                    </div>
                    

                          <div class="form-group ">
                      <label for="username" class="control-label col-lg-2">image <span ></span></label>
                      <div class="col-lg-10">
          
   
    <input  class="form-control " type="file" name="fileToUpload" id="fileToUpload">

                      </div>
                    </div>
                     

                    <div class="form-group ">
                      <label for="agree" class="control-label col-lg-2 col-sm-3">sexe<span class="required">*</span></label>
                      <div class="col-lg-10 col-sm-9">
                        <input type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="agree">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit"href="?page=modifierprofil" name="modifier">modifier</button>
                           <a class="btn btn-default" type="button" name="cancel" href="?page=listeetudiant">cancel</a>
                      </div>
                    </div> </form>