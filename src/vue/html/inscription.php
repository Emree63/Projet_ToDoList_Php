<!DOCTYPE html>

<html>
    <head>
      <title>Page d'inscription</title>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="shortcut icon" href="./Vue/Images/gif.gif" type="../Images/gif">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- CSS only -->
      <link rel="stylesheet" href="./vue/css/style.css">
      <link rel="stylesheet" href="./vue/css/reset.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      </head>
    <body>
      <div class="main">
          <div class="model">
              <div class="main-logo">
                  <img src="./vue/Images/Logo.png" alt="logo">
              </div>
              <div class="login-card-header">
                  <h1>Inscrivez-vous</h1>    
              </div>
              <form method="POST" class="login-card-form">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <input type="text" name="nom-Form" placeholder="Nom" required autofocus>
                    </div>
                  </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                          <input type="text" name="prenom-Form" placeholder="Prenom" required autofocus>
                      </div>
                    </div>
                  </div>
                  <div class="form-item">
                      <input type="text" name="pseudo-Form" placeholder="Pseudo" required autofocus>
                  </div>
                  <div class="form-item">
                      <input type="text" name="mail-Form" placeholder="Mail" required autofocus>
                  </div>
                  <div class="form-item">
                      <input type="password" name="password-Form" placeholder="Password" required >
                  </div>
                  
                  <button type="submit" class="btn btn-primary">S'inscrire</button>
                  <!-- action !!!!!!!!!! --> 
                  <input type="hidden" name="action" value="validationFormulaire">
                  <?php
                  if (isset($dVueEreur)) {
                    foreach ($dVueEreur as $value){
                        echo $value;
                    }
                  }
                  ?>
                  <p class="text-center text-muted mt-5 mb-0">Déjà un compte?
                  <a href="login" class="fw-bold text-body"><u>Connectez-vous</u></a></p>
              
                </form>

          </div>
          
      </div>

    </body>

</html>