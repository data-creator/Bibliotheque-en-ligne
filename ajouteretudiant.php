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

        if (!empty($_POST["nom"])  && !empty($_POST["prenom"]) && !empty($_POST["date"])&& !empty($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["tel"]) && !empty($_POST["code_groupe"]))

        {
          $nom=$_POST["nom"];
          $prenom=$_POST["prenom"];
          $date=$_POST["date"];
          $password=$_POST["password"];
          $email=$_POST["email"];
          $tel=$_POST["tel"];
         $code_groupe=$_POST["code_groupe"];

          
          $search=$cnx->prepare("INSERT INTO etudiant (`nom`, `prenom`, `datee`, `password`, `email`, `tel`,`code_groupe`) VALUES (:nom,:prenom,:datee,:password,:email,:tel,:code_groupe)");
          $search->bindParam(':nom', $nom);
          $search->bindParam(':prenom', $prenom);
          $search->bindParam(':datee', $date);
          $search->bindParam(':password', $password);
          $search->bindParam(':email', $email);
          $search->bindParam(':tel', $tel);
          $search->bindParam(':code_groupe', $code_groupe);
          $search->execute();
        }
      }
?>


<div href="" class="logo" style="font-size: 25px; margin:0px 0px 10px 50px;">ajouter <span class="lite"> etudiant </span></div>
 <form method="POST" action=" ">
 
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
                      <label for="date" class="control-label col-lg-2">Date <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input data-provide="datepicker"  id="date" name="date" type="date">
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="confirm_password" class="control-label col-lg-2">password <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="password" name="password" type="password">
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="email" class="control-label col-lg-2">Email <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="email" name="email" type="email">
                      </div>
                    </div>

                          <div class="form-group ">
                      <label for="username" class="control-label col-lg-2">Tel <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="tel" name="tel" type="tel">
                      </div>
                    </div>
                     <div class="form-group ">
                      <label for="address" class="control-label col-lg-2">groupe <span class="required">*</span></label>
                      <div class="col-lg-10">
                       
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

                    <div class="form-group ">
                      <label for="agree" class="control-label col-lg-2 col-sm-3">sexe<span class="required">*</span></label>
                      <div class="col-lg-10 col-sm-9">
                        <input type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="agree">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" name="save">Save</button>
                           <a class="btn btn-default" type="button" name="cancel" href="?page=listeetudiant">cancel</a>
                      </div>
                    </div> </form>