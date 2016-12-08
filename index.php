<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- required meta tags -->
    <title>Jumbled</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Bungee+Inline" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">

  </head>
 <script>
 function Redirect(url){
   location.href = url;
                      }
 </script>

    <?php
    $word = "";
    $wordERR = "";
    $flag=0;
    $another = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      if (empty($_POST["word"]))
           {
          $wordERR = "Please Enter a Word! :)";
           }

        else
          {
          $word = test_input($_POST["word"]);

          }

    }

    function test_input($data){
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
     }
      ?>

      <body>

    <nav class="navbar navbar-default" role="navigation" style="background-color:silver;">
      <a class="navbar-brand" href="index.php" style='margin-top:30px;color:white;font-size:45px;font-family:Luckiest Guy, cursive'>Jumbled</a>
    </nav>



      <div class="container">
        <?php ob_start(); ?>
        <center>
       <h1 style="font-family: 'Comfortaa', cursive;font-size:50px;">Unravel the jumbled word conundrum!</h1>
     </center>
       <br>
      <form class="form-horizontal" method = "post"  action = " <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> ">
        <div class="form-group">
          <div class="col-sm-2">
          </div>
          <div class="col-sm-8">
            <div class="input-group">
            <input type="text" class="form-control" id="pwd" placeholder="Solve the word .."  name = "word" value = "<?php echo htmlspecialchars($word);?>" style="height:54px;">
            <span class = "error"><?php echo "$wordERR";?> </span>
            <span class="input-group-btn">
            <button type="submit" class="btn btn-default" style="height:54px;">Go!</button>
          </span>
        </div>
          </div>
          <div class="col-sm-2">
          </div>
        </div>
      </form>
    </div>


<?php
//$l=strlen($word);
    if($word != NULL){
      ob_end_clean();
      $word = strtolower($word);
      $word=str_replace(" ","",$word);
      ?><div class="col-sm-2">
      </div>
      <div class="col-sm-8">
        <?php
      $string = $word;
      $stringParts = str_split($string);
      sort($stringParts);
      $word1 = implode('', $stringParts);
      $word = $word1;
      $myFile = "Dictionary.txt";
      $fh = fopen($myFile, 'r') or die('Could not open file');
      $lines = file($myFile);//file in to an array
      $count=0;
      foreach($lines as $check)
      {
      $check1 = $check; // Just a demonstration ..
      $check1 = str_split($check1);
      sort($check1);
      $check1 = implode('', $check1);
      $check1 = trim($check1);
      $check = trim($check);
      $found1=strcmp($check1,$word);
      ?><table><?php
      if($found1==0){
        $flag=1;
        if($count<1){
          if($check=="mazahir"){ ?>
          <h2 style="font-family: 'Lato', sans-serif;"><u><?php echo "Hey, 'Mazahir' here! Hope you liked my program<br>";  ?></u></h2>
          <?php }
          else{
            ?>
          <h2 style="font-family: 'Lato', sans-serif;"><u><?php echo "Solution : ".$check."<br>";  ?>
          </u></h1>
          <?php
        $count=$count+1;
            }
      }else{
        if($another==0){
          echo "<h1 style='font-family: Lato, sans-serif;'>Other Possibilities : </h1>";
          $another=1;
        }
        ?>
        <blockquote><u><p style="font-family: 'Lato', sans-serif;"><?php echo $check;  ?>
        </u></p></blockquote>
        <?php
      }
     }
      }
      if($flag==0){
        ?>
        <h1 style="font-family: Lato, sans-serif;font-size: 32px;"><?php echo "We're sorry, but we could not find an answer for that! <br>";  ?></h1>
        <?php
      }
    ?>
  <h2 style="font-family: 'Lato', sans-serif;"><a href="index.php"><input type  = "submit" value = "&nbsp Try Another Word! &nbsp" style="margin-left:81px; font-weight:bold; color:white; background-color:grey; font-size:120%;" /></a>
  </h2>
</center>

<?php } ?>

</div>
<?php echo "<br><br>"; ?>
    </body>

    </div>
      </div>
      <div class="col-sm-2">
      </div>
    </div>
    <hr>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <div class="text-center center-block">
        <p class="txt-railway">- jumbled.herokuapp.com -</p>
        <br />
            <a href="https://www.facebook.com/mazahir.haroon"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
          <a href="https://twitter.com/mazahirharoon"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
          <a href="https://github.com/MazahirHaroon"><i class="fa fa-github-square fa-3x social" aria-hidden="true"></i></a>
          <a href="mailto:mazahirharoon@gmail.com"><i class="fa fa-wordpress fa-3x social" aria-hidden="true"></i></a>
          <a href="mailto:mazahirharoon@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>


</div>
<hr>
</div>
  </html>
