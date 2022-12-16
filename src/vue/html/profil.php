<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" href="./vue/Images/gif.gif" type="../Images/gif">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Profil Page</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https:/stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </head>
  
  <body>
  <section style="background-color: white;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-info rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="VueListePublic">Home</a></li>
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>
      </div>
    </div>
      <div class="col-lg-15">
        <div class="card mb-1">
          <div class="card-body">
            <div class="col-sm-15 text-center">
              <p class="mb-0">Nom Prénom</p>
            </div>
            <div class="col-sm-14 text-center">
              <p class="text-muted mb-0"><?php echo $user->getNom().' '.$user->getPrenom()?></p>
            </div>
            <hr>
            <div class="col-sm-15 text-center">
              <p class="mb-0">Pseudo</p>
            </div>
            <div class="col-sm-14 text-center">
              <p class="text-muted mb-0"><?php echo $user->getPseudo()?></p>
            </div>
            <hr>
            <div class="col-sm-15 text-center">
              <p class="mb-0">Email</p>
            </div>
            <div class="col-sm-14 text-center">
              <p class="text-muted mb-0"><?php echo $user->getMail()?></p>
            </div>
            <hr>
            <div class="col-sm-15 text-center">
              <p class="mb-0">Nombre de liste</p>
            </div>
            <div class="col-sm-14 text-center">
              <p class="text-muted mb-0"><?php echo $nombreListe ?></p>
            </div>
          </div>
        </div>
        <div class="text-center">
          <br>
          <a type="button" class="btn btn-outline-info waves-effect" href="#" data-toggle="modal" data-target="#modalModifier">
              Changer mot de passe
          </a>
          <a type="button" class="btn btn-outline-danger waves-effect" href="#" data-toggle="modal" data-target="#modalSupp">
              Supprimer le compte
          </a>
          
          <!-- Modal Modifier -->
          <div class="modal fade" id="modalModifier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modification du mot de passe</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <form class="col" method="POST">
                  <div class="form-group">
                    <input type="password" class="form-control" name ="passwordCurrent" placeholder="Mot de passe actuel" required autofocus>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" name="newPassword" id="description" placeholder="Nouveau mot de passe" required autofocus>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" name="confirmNewPassword" id="description" placeholder="Confirmer le mot de passe" required autofocus>
                  </div>
                  <button type="submit" class="btn btn-primary pull-right">Terminer</button>
                  <input type="hidden" name="action" value="modifMdp">
                </form>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal Supprimer -->
          <div class="modal fade" id="modalSupp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Suppression du compte</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Êtes-vous sûr de vouloir supprimer votre compte ?
                </div>
                <div class="modal-footer">
                  <a href="supprimerCompte" class="btn btn-danger">Supprimer quand même</a>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>
  </div>
</section>
  </body>
</html>