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


<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
<table id="myTable" class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class="icon_profile"></i>Nom</th>
                    <th><i class="icon_calendar"></i> prenom</th>
                    <th><i class="icon_mail_alt"></i> Date</th>
                    <th><i class="icon_pin_alt"></i> password</th>
                    <th><i class="icon_mobile"></i> Email</th>
                     <th><i class="icon_mobile"></i> Tel</th>
                     <th><i class="icon_mobile"></i> profession</th>
                    <th> <a class="btn btn-primary"  href="?page=ajouterprofesseur"><i class="icon_plus_alt2"></i></a></th>
                  </tr>
                   <?php
                  $search=$cnx->prepare("select * from professeur");
                  $search->execute();
                  while ($donne1=$search->fetch()){ ?>
                  <tr>
                    <td><?php echo $donne1[1]?></td>
                    <td><?php echo $donne1[2]?></td>
                    <td><?php echo $donne1[3]?></td>
                    <td><?php echo $donne1[4]?></td>
                    <td><?php echo $donne1[5]?></td>
                     <td><?php echo $donne1[6]?></td>

                     <td>
                             <?php
                             //echo $donne1[7]."\n";
                               $search2=$cnx->prepare("SELECT libelle FROM `matiere` where code_matiere=$donne1[7]");
                               $search2->execute(); 
                                    while ($donne1=$search2->fetch()){ 
                                    echo "$donne1[0] "; 

                                  }
                                  ?>
</td>
                    <td>
                      <div class="btn-group">
                        
                        
                        <a class="btn btn-success" href="?page=modifier_professeur&id=<?php echo $donne1[0] ?>" ><i class="icon_check_alt2"></i></a>
                        <a class="btn btn-danger" href="?page=suprimer_professeur&id=<?php echo $donne1[0] ?>"><i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
                </tbody>
                <?php } ?>
              </table>
        
        <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<style>
#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
</style>