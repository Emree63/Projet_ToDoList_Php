<div class="header">
  <div class="menu-bar">
        <nav class="navbar navbar-expand-lg bg-info fixed-top">
        <img src="./Vue/Images/LogoForHome.png" width="200">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <style>
              .fa {
                color: white;
                font-size: 26px;
              }
              .nav-link:hover {
                  border-bottom: 1px solid #fff;
              }
          </style>
          <ul class="navbar-nav ml-auto">
            <?php
            if(isset($_SESSION["idUtilisateur"]) and $_SESSION["idUtilisateur"]){ ?>
                <h4><a class="nav-item nav-link text-light" href="index.php?action=showPrivateList&userid=<?= $_SESSION["idUtilisateur"] ?>">Mes listes</a></h4>
                <h4><a class="nav-item nav-link text-light" href="index.php?action=logout">Se deconnecter</a></h4>
              <?php
              } else {
                ?> <h5><a class="nav-item nav-link text-light" href="index.php?action=redirectionLogin">Se connecter</a></h5>
                  <h5><a class="nav-item nav-link text-light" href="index.php?action=redirectionInscription">S'inscrire</a></h5>
                
                <?php
              }
            ?>
          </ul>
        </div>
      </nav>
    </div>
</div>




    
