<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" href="./vue/Images/gif.gif" type="../Images/gif">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Erreur Page</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="./vue/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https:/stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php require($rep.$vues['NavBar']); ?>
     <div class="model">
        <h1>ERREUR !!!!!</h1>
        <?php
        if (isset($dVueEreur)) {
            foreach ($dVueEreur as $value){
                echo $value;
            }
        }
        ?>
    </div>

    </body> 
</html>