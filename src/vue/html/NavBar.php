<div class="header">
  <div class="menu-bar" >
    <section class="fixed-top">
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
                  <h5><a class="nav-item nav-link text-light" href="listePrive">Mes listes</a></h5>
                  <h5><a class="nav-item nav-link text-light" href="MonProfil">Mon Profil</a></h5>
                  <?php if($_SESSION['role']=='admin'){?>
                    <h5><a class="nav-item nav-link text-warning" href="users">Les utilisateurs</a></h5>
                  <?php } ?>
                  <h5><button class="nav-item btn btn-outline-light" onclick="myFunction()">Se déconnecter</button></h5>

                  <script>
                  function myFunction() {
                    let text = "Voulez-vous vraiment vous déconnecter?!\n";
                    if (confirm(text) == true) {
                      location.replace("logout")
                    } else {
                      
                    }
                  }
                  </script>
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
        </section>
    </div>
</div>




    
