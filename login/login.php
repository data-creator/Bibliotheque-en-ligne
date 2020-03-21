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

if (isset($_POST["inscrire"])) 
      {
        extract($_POST);


        if (!empty($_POST["nom"])  && !empty($_POST["prenom"]) && !empty($_POST["datee"])&& !empty($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["tel"]) && !empty($_POST["code_groupe"]))
        {
echo "sdjfh";
          $nom=$_POST["nom"];
          $prenom=$_POST["prenom"];
          $datee=$_POST["datee"];
          $password=$_POST["password"];
          $email=$_POST["email"];
          $tel=$_POST["tel"];
         $code_groupe=$_POST["code_groupe"];

          
          $search=$cnx->prepare("INSERT INTO etudiant (`nom`, `prenom`, `datee`, `password`, `email`, `tel`,`code_groupe`) VALUES (:nom,:prenom,:datee,:password,:email,:tel,:code_groupe)");
          $search->bindParam(':nom', $nom);
          $search->bindParam(':prenom', $prenom);
          $search->bindParam(':datee', $datee);
          $search->bindParam(':password', $password);
          $search->bindParam(':email', $email);
          $search->bindParam(':tel', $tel);
          $search->bindParam(':code_groupe', $code_groupe);
          $search->execute();
        }
      }
?>


<!DOCTYPE html>
<html>
<head>
  <title></title>
  <!-- //////////////////////////////////// -->
  <!-- mobile -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/css.css">

  
</head>
   <!-- ///////>
///////////////////////////// -->
  <body <!-- navbar -->
<div class="container">
  <div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4"></div>
    <div class="col-lg-4"></div>
  </div>

  <div class="row">
    <div class="col-lg-4">
    </div>

    <div class="col-lg-4 os">
    <div class="row">
      <div class="col-lg-6"> 
  <form class="fo" method="POST" action="">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" name="email2" class="form-control"  placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="Password_1" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" name="connecter">connecter</button>
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary ii" data-toggle="modal" data-target="#exampleModalScrollable">
  s'inscrire
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true"  >
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content" style="padding: 15px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">inscription dans la bibliotheque</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
</form>
      <!-- inscrire -->

<form action="" method="POST">

  <div class="form-group">
    <label for="formGroupExampleInput">votre nom</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="nom" placeholder="nom">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">votre prenom</label>
    <input type="text" name="prenom" class="form-control" id="formGroupExampleInput2" placeholder="prenom">
  </div>

<div class="form-group">
    <label for="formGroupExampleInput">votre Date de naissance</label>
    <input type="date" name="datee" class="form-control" id="formGroupExampleInput" placeholder="datee">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">votre password</label>
    <input type="password" name="password" class="form-control" id="formGroupExampleInput2" placeholder="password">
  </div>

 <div class="form-group">
    <label for="formGroupExampleInput2">votre @mail</label>
    <input type="email" name="email" class="form-control" id="formGroupExampleInput2" placeholder="email">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">votre Telephone</label>
    <input type="tel" name="tel" class="form-control" id="formGroupExampleInput" placeholder="tel">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">votre groupe</label>
     <select class=" form-control" name="code_groupe">
                            <?php

                               $search=$cnx->prepare("SELECT  code_groupe, nom_groupe FROM `groupe` ");
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

  <div>votre photo <input type="file" name=""></div>






      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="inscrire" class="btn btn-primary">inscrire</button>
      </div>
</form>

      <div class="col-lg-6"></div>
    </div>
     



</div>
    <div class="col-lg-4"></div>
  </div>

</div>

 

  <!-- //////////////////////////////////// -->
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.JS"></script>
  <!-- //////////////////////////////////// -->
</body>


</html>


