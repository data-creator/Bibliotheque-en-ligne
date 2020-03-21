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


<html lang="en"><head>
<meta charset="UTF-8">
<title>CodePen - Book Filter</title>

<link rel="stylesheet" href="css/style.css">
<script>
  window.console = window.console || function(t) {};
</script>
<script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
</head>
<body translate="no">
<meta charset="utf-8">


<title>Bookstore Search Bar</title>


<section id="main">
<div class="container-fuild">
<div class="row">
<div class="col-md-12">
<h1 class="h1 text-center">Top Books</h1>

<div id="myBtnContainer" class="col-md-12">



<table>
  
 <tr>   
      <td><button class="btn    " onclick="filterSelection('all')"> Show all</button>

 <?php

               $search=$cnx->prepare("SELECT  id_ca, nom_categ FROM `categorie_livre` ");
              $search->execute();

              // $donne1[1]
                                    while ($donne1=$search->fetch()){ 
                                 

      echo '<td><button class="btn" onclick="filterSelection(';
      echo "'";
      echo $donne1[1]."'";
      echo ')">';
      echo $donne1[1].'</button></td>';           

                                  }

                             
                          
                            ?>
</tr>
  </table>
    </div>

<div class="dropdown">
<button class="dropbtn">Dropdown</button>
<div class="dropdown-content">
<a onclick="filterSelection('all')"> Show all</a>


 <?php

               $search=$cnx->prepare("SELECT  id_ca, nom_categ FROM `categorie_livre` ");
              $search->execute();

              // $donne1[1]
                                    while ($donne1=$search->fetch()){ 
                                 

      echo '<a onclick="filterSelection(';
      echo "'";
      echo $donne1[1];
      echo "'";
      echo ')">';           
      echo $donne1[1];
      echo '</a>';
                                  }

                             
                          
                            ?>

</div>
</div>


<div id="book-shelf" class="row row-eq-height">

<?php

               $search=$cnx->prepare("SELECT `id_li`, `nom_li`, `nom_auteur`, `id_ca`, `image` FROM `livre` ");
              $search->execute();

              // $donne1[1]
                                    while ($donne1=$search->fetch()){ 
                                      
                                 $search2=$cnx->prepare("SELECT  `nom_categ` FROM `categorie_livre` WHERE `id_ca`=:id");
                                  $search2->bindParam(':id',$donne1[3]);
                                  $search2->execute();
                                  $donne2=$search2->fetch();
                  
            echo '<article class="col-md-3 col-sm-6 filterDiv '.$donne2[0];
            echo'">';

                                    
                  echo '<img src="../'.$donne1[4].'">';
                  echo '<p class="text-center">'.$donne1[2];
                  echo"<br>";
                  echo "<em>$donne1[2]</em>";
                  echo "</p>";
                  echo "</article>";
                                  }

                             
                          
                            ?>
<!-- 
<article class="col-md-3 col-sm-6 filterDiv crimeDrama thriller novel show">
<img src="https://res.cloudinary.com/dtj4lxtyr/image/upload/v1519649198/bc-15th_affair_fs9zas.jpg">
<p class="text-center">The 15th Affair: The New Women's Murder Club Novel
<br>
<em>James Patterson</em>
</p>
</article>
<article class="col-md-3 col-sm-6 filterDiv fiction novel">
<img src="https://res.cloudinary.com/dtj4lxtyr/image/upload/v1519649180/bc-before_the_fall_xn9ry4.jpg">
<p class="text-center">Before the Fall
<br>
<em>Noah Hawley</em>
</p>
</article>
<article class="col-md-3 col-sm-6 filterDiv childFiction novel">
<img src="https://res.cloudinary.com/dtj4lxtyr/image/upload/v1519649214/bc-diary_of_a_wimpy_kid_odilob.jpg">
<p class="text-center">Diary of a Wimpy Kid: Double Down
<br>
<em>Jeff Kinney</em>
</p>
</article>
<article class="col-md-3 col-sm-6 filterDiv childFiction fantasy play">
<img src="https://res.cloudinary.com/dtj4lxtyr/image/upload/v1519649183/bc-harry_potter_pwzilg.jpg">
<p class="text-center">Harry Potter and the Cursed Child, Parts 1 &amp; 2
<br>
<em>J.K. Rowling</em>
</p>
</article>
<article class="col-md-3 col-sm-6 filterDiv nonFiction critique">
<img src="https://res.cloudinary.com/dtj4lxtyr/image/upload/v1519649182/bc-hillbilly_elegy_ipelvr.jpg">
<p class="text-center">Hillbilly Elegy: A Memoir of a Family and Culture in Crisis
<br>
<em>J.D. Vance</em>
</p>
</article>
<article class="col-md-3 col-sm-6 filterDiv history critique">
<img src="https://res.cloudinary.com/dtj4lxtyr/image/upload/v1519649169/bc-killing_the_rising_sun_qw2dcx.jpg">
<p class="text-center">Killing the Rising Sun: How America Vanquished World War II Japan
<br>
<em>Bill O'Reilly</em>
</p>
</article>
<article class="col-md-3 col-sm-6 filterDiv thriller novel show">
<img src="https://res.cloudinary.com/dtj4lxtyr/image/upload/v1519649174/bc-the_black_widow_esmzpi.jpg">
<p class="text-center">The Black Widow
<br>
<em>Daniel Silva</em>
</p>
</article>
<article class="col-md-3 col-sm-6 filterDiv fiction novel">
<img src="https://res.cloudinary.com/dtj4lxtyr/image/upload/v1519649205/bc-the_jack_reacher_thriller_xwdyi7.jpg">
<p class="text-center">Night School: A Jack Reacher Novel
<br>
<em>Lee Child</em>
</p>
</article>
<article class="col-md-3 col-sm-6 filterDiv crimeDrama novel">
<img src="https://res.cloudinary.com/dtj4lxtyr/image/upload/v1519649196/bc-the_last_mile_fqj7tu.jpg">
<p class="text-center">The Last Mile
<br>
<em>David Baldacci</em>
</p>
</article>
<article class="col-md-3 col-sm-6 filterDiv crimeDrama novel">
<img src="https://res.cloudinary.com/dtj4lxtyr/image/upload/v1519649194/bc-the_whistler_ofw7y6.jpg">
<p class="text-center">The Whistler
<br>
<em>John Grisham</em>
</p>
</article>
<article class="col-md-3 col-sm-6 filterDiv fiction novel">
<img src="https://res.cloudinary.com/dtj4lxtyr/image/upload/v1519649201/bc-truly_madly_guilty_zlsdzb.jpg">
<p class="text-center">Truly Madly Guilty
<br>
<em>Liane Moriarty</em>
</p>
</article>
<article class="col-md-3 col-sm-6 filterDiv autoBiograpghy memoir">
<img src="https://res.cloudinary.com/dtj4lxtyr/image/upload/v1519649191/bc-when_breath_becomes_air_gi50fe.jpg">
<p class="text-center">When Breath Becomes Air
<br>
<em>Paul Kalanithi</em>
</p>
</article>
<article class="col-md-3 col-sm-6 filterDiv crimeDrama thriller novel show">
<img src="https://res.cloudinary.com/dtj4lxtyr/image/upload/v1519649187/bc-fool_me_once_mcfhvf.jpg">
<p class="text-center">Fool Me Once
<br>
<em>Harlan Coben</em>
</p>
</article>
<article class="col-md-3 col-sm-6 filterDiv autoBiograpghy history memoir">
<img src="https://res.cloudinary.com/dtj4lxtyr/image/upload/v1519649167/bc-crisis_of_character_zubxes.jpg">
<p class="text-center">Crisis of Character
<br>
<em>Gary. J Byrne</em>
</p>
</article>
<article class="col-md-3 col-sm-6 filterDiv crimeDrama thriller novel show">
<img src="https://res.cloudinary.com/dtj4lxtyr/image/upload/v1519649169/bc-wrong_side_of_goodbye_ey7p5w.jpg">
<p class="text-center">The Wrong Side of Goodbye
<br>
<em>Michael Connelly</em>
</p>
</article>
<article class="col-md-3 col-sm-6 filterDiv autoBiograpghy romance memoir ">
<img src="https://res.cloudinary.com/dtj4lxtyr/image/upload/v1519649186/bc-magnolia_story_txiz5r.jpg">
<p class="text-center">The Magnolia Story
<br>
<em>Chip and Joanna Gaines</em>
</p>
</article>
<article class="col-md-3 col-sm-6 filterDiv fiction novel">
<img src="https://res.cloudinary.com/dtj4lxtyr/image/upload/v1519649188/bc-the_nest_dp5xhm.jpg">
<p class="text-center">The Nest
<br>
<em>Cynthia D'Aprix Sweeney</em>
 </p>
</article>
<article class="col-md-3 col-sm-6 filterDiv romance fiction novel">
<img src="https://res.cloudinary.com/dtj4lxtyr/image/upload/v1519649185/bc-one_with_you_qurgwu.jpg">
<p class="text-center">One With You: A Crossfire Novel
<br>
<em>Sylvia Day</em>
</p>
</article>
<article class="col-md-3 col-sm-6 filterDiv crimeDrama thriller novel show">
<img src="https://res.cloudinary.com/dtj4lxtyr/image/upload/v1519649174/bc-the_obsession_wbnqtf.jpg">
<p class="text-center">The Obsession
<br>
<em>Nora Roberts</em>
</p>
</article>
<article class="col-md-3 col-sm-6 filterDiv mystery novel">
<img src="https://res.cloudinary.com/dtj4lxtyr/image/upload/v1519649212/bc-everything_we_keep_cid3l9.png">
<p class="text-center">Everything We Keep
<br>
<em>Kerry Lonsdale</em>
</p>
</article>
-->
</div>
</div>
</div>
</div>
</section>
<footer>

</footer>
<script type="text/javascript" src="js/main.js">
  </script>


<script id="rendered-js">

"use strict";"object"!=typeof window.CP&&(window.CP={}),window.CP.PenTimer={programNoLongerBeingMonitored:!1,timeOfFirstCallToShouldStopLoop:0,_loopExits:{},_loopTimers:{},START_MONITORING_AFTER:2e3,STOP_ALL_MONITORING_TIMEOUT:5e3,MAX_TIME_IN_LOOP_WO_EXIT:2200,exitedLoop:function(o){this._loopExits[o]=!0},shouldStopLoop:function(o){if(this.programKilledSoStopMonitoring)return!0;if(this.programNoLongerBeingMonitored)return!1;if(this._loopExits[o])return!1;var t=this._getTime();if(0===this.timeOfFirstCallToShouldStopLoop)return this.timeOfFirstCallToShouldStopLoop=t,!1;var i=t-this.timeOfFirstCallToShouldStopLoop;if(i<this.START_MONITORING_AFTER)return!1;if(i>this.STOP_ALL_MONITORING_TIMEOUT)return this.programNoLongerBeingMonitored=!0,!1;try{this._checkOnInfiniteLoop(o,t)}catch(e){return this._sendErrorMessageToEditor(),this.programKilledSoStopMonitoring=!0,!0}return!1},_sendErrorMessageToEditor:function(){try{if(this._shouldPostMessage()){var o={action:"infinite-loop",line:this._findAroundLineNumber()};parent.postMessage(o,"*")}else this._throwAnErrorToStopPen()}catch(t){this._throwAnErrorToStopPen()}},_shouldPostMessage:function(){return document.location.href.match(/boomerang/)},_throwAnErrorToStopPen:function(){throw"We found an infinite loop in your Pen. We've stopped the Pen from running. Please correct it or contact support@codepen.io."},_findAroundLineNumber:function(){var o=new Error,t=0;if(o.stack){var i=o.stack.match(/boomerang\S+:(\d+):\d+/);i&&(t=i[1])}return t},_checkOnInfiniteLoop:function(o,t){if(!this._loopTimers[o])return this._loopTimers[o]=t,!1;if(t-this._loopTimers[o]>this.MAX_TIME_IN_LOOP_WO_EXIT)throw"Infinite Loop found on loop: "+o},_getTime:function(){return+new Date}},window.CP.shouldStopExecution=function(o){var t=window.CP.PenTimer.shouldStopLoop(o);return!0===t&&console.warn("[CodePen]: An infinite loop (or a loop taking too long) was detected, so we stopped its execution. Sorry!"),t},window.CP.exitedLoop=function(o){window.CP.PenTimer.exitedLoop(o)};

      filterSelection("all");
function filterSelection(c) {
  //Intializing variables
  var x, i;
  //searches the page for the divs with the filterDiv class
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {if (window.CP.shouldStopExecution(0)) break;
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }window.CP.exitedLoop(0);
}

// Show filtered elements
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {if (window.CP.shouldStopExecution(1)) break;
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }window.CP.exitedLoop(1);
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {if (window.CP.shouldStopExecution(2)) break;
    while (arr1.indexOf(arr2[i]) > -1) {if (window.CP.shouldStopExecution(3)) break;
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }window.CP.exitedLoop(3);
  }window.CP.exitedLoop(2);
  element.className = arr1.join(" ");
}

// Add active class to the current control button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {if (window.CP.shouldStopExecution(4)) break;
  btns[i].addEventListener("click", function () {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace("active", " ");
    this.className += " active";
  });
}window.CP.exitedLoop(4);
      //# sourceURL=pen.js
    </script>


</body></html>