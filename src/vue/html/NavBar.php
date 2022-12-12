<div class="header">
  <div class="menu-bar">
        <nav class="navbar navbar-expand-lg bg-info ">
        <img src="./vue/Images/LogoForHome.png" width="200">
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
            if(isset($_SESSION['id'])){ ?>
              <h5><a class="nav-item nav-link text-light" href="VueListePublic">Listes Publiques</a></h5>
              <h5><a class="nav-item nav-link text-light" href="#">Mes listes</a></h5>
              <h5><a class="nav-item nav-link text-light" href="MonProfil">Mon Profil</a></h5>
              <h5><a class="nav-item btn btn-outline-light" href="logout">Se déconnecter</a></h5>
            <?php
              } else {
                ?> <h5><a class="nav-item btn btn-outline-light" href="login">Se connecter</a></h5>
                  <h5><a class="nav-item nav-link text-light" href="inscription">S'inscrire</a></h5>
                
                <?php
              }
            ?>
          </ul>
        </div>
      </nav>
    </div>
</div>




    
