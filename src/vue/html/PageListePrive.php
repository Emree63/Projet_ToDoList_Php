<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" href="./vue/Images/c.gif" type="../Images/gif">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <title>Home Page</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https:/stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </head>

  <body style="-webkit-user-select: none; /* Safari */
    -ms-user-select: none; /* IE 10 and IE 11 */
    user-select: none;">
    <?php require($rep.$vues['NavBar']); ?>
      <br>
      <br>
      <br>

      <button class="btn btn-default" data-toggle="modal" data-target="#formulaireAjoutListe">
          Ajouter une liste
            <img src="./vue/Images/plus.png" width="20" />
      </button>

       <div class="container">
                <div class="modal fade" id="formulaireAjoutListe">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Ajout d'une liste</h4>              
                        <button type="button" class="close" data-dismiss="modal">
                          <span>&times;</span>
                        </button>
                      </div>
                      <div class="modal-body row">
                        <form class="col" method="POST">
                          <div class="form-group">
                             <?php 
                                if(isset($dVueErreur['nom'])){?>
                                  <center><p class="text-danger"> <?php echo $dVueErreur['nom']?></p></center><?php
                                } 
                              ?> 
                            <label for="nom" class="form-control-label">Nom</label>
                            <input type="text" class="form-control" name ="nom-ajout-liste" id="nom" placeholder="Entrez un nom">
                          </div>
                          <div class="form-group">
                             <?php 
                                if(isset($dVueErreur['description'])){?>
                                  <center><p class="text-danger"> <?php echo $dVueErreur['description']?></p></center><?php
                                } 
                              ?> 
                            <label for="description" class="form-control-label">Description</label>
                            <input type="text" class="form-control" name="description-ajout-liste" id="description" placeholder="Entrez une description">
                          </div>
                          <button type="submit" class="btn btn-primary pull-right">Ajouter</button>
                          <input type="hidden" name="action" value="AjouterListePrive">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

  <?php
        foreach($listesPrive as $liste){
          if($liste->getIdUtilisateur() == $_SESSION['id']){

          $done = 0;
          $total = 0;
  ?>
  
  <!-- Affichage des listesPrive -->
  
  <div class="container py-2 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-8 col-xl-6">
        <div class="card rounded-3">
          <div class="card-body p-4">
            <div>
              <p class="mb-2">
                <span class="h2 me-2 text-info"><?= $liste->getNom()?>
                   <a href="index.php?action=SupprimerListePrive&idListe=<?= $liste->getId() ?>">
                      <button class="btn btn-default">
                        <img src="./vue/Images/trash.png" width="20" />
                      </button>
                  </a>
                    <button data-toggle="modal" data-target="#formulaireModif<?= $liste->getId()?>" class="btn btn-default">
                      <img src="./vue/Images/edit.png" width="20" />
                    </button>
       
                   <button data-toggle="modal" data-target="#formulaireAjout<?= $liste->getId()?>" class="btn btn-default">
                      <img src="./vue/Images/plus.png" width="20" />
                  </button>
                </span>
              </p>
              <p><span class="h5 me-2"><?= $liste->getDescription()?></span>
              <p class="text-muted pb-2"><?= $liste->getDateCreation()?> : <?= $liste->getIdUtilisateur()?></p>
            </div>


            <!-- Fenetre modal -->

            <div class="container">
                <div class="modal fade" id="formulaireAjout<?= $liste->getId()?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Ajout d'une tache</h4>              
                        <button type="button" class="close" data-dismiss="modal">
                          <span>&times;</span>
                        </button>
                      </div>
                      <div class="modal-body row">
                        <form class="col" method="POST">
                          <div class="form-group">
                            <?php 
                                if(isset($dVueErreur['nom'])){?>
                                  <center><p class="text-danger"> <?php echo $dVueErreur['nom']?></p></center><?php
                                } 
                              ?>
                            <label for="nom" class="form-control-label">Nom</label>
                            <input type="text" class="form-control" name ="nom-ajout" id="nom" placeholder="Entrez un nom">
                          </div>
                          <div class="form-group">
                            <?php 
                                if(isset($dVueErreur['description'])){?>
                                  <center><p class="text-danger"> <?php echo $dVueErreur['description']?></p></center><?php
                                } 
                              ?> 
                            <label for="description" class="form-control-label">Description</label>
                            <input type="text" class="form-control" name="description-ajout" id="description" placeholder="Entrez une description">
                          </div>
                          <button type="submit" class="btn btn-primary pull-right">Ajouter</button>
                          <input type="hidden" name="action" value="AjouterTachePrive">
                          <input type="hidden" name="idListe" value="<?= $liste->getId() ?>">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

           

            <div class="container">
                <div class="modal fade" id="formulaireModif<?= $liste->getId()?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Modification</h4>              
                        <button type="button" class="close" data-dismiss="modal">
                          <span>&times;</span>
                        </button>
                      </div>
                      <div class="modal-body row">
                        <form class="col" method="POST">
                          <div class="form-group">
                            <?php 
                                if(isset($dVueErreur['nom'])){?>
                                  <center><p class="text-danger"> <?php echo $dVueErreur['nom']?></p></center><?php
                                } 
                              ?>
                            <label for="nom" class="form-control-label">Nouveau nom</label>
                            <input type="text" class="form-control" name ="nom-modif-liste" id="nom" placeholder="<?= $liste->getNom() ?>">
                          </div>
                          <div class="form-group">
                            <?php 
                                if(isset($dVueErreur['description'])){?>
                                  <center><p class="text-danger"> <?php echo $dVueErreur['description']?></p></center><?php
                                } 
                              ?> 
                            <label for="description" class="form-control-label">Nouvelle description</label>
                            <input type="text" class="form-control" name="description-modif-liste" id="description" placeholder="<?= $liste->getDescription() ?>">
                          </div>
                          <button type="submit" class="btn btn-primary pull-right">Modifier</button>
                          <input type="hidden" name="action" value="ModifierListePrive">
                          <input type="hidden" name="idListe" value="<?= $liste->getId() ?>">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

            <!-- Tache -->
            
            <ul class="list-group rounded-0">
               <?php
              foreach($taches as $tache){

                if($tache->getIdListe() == $liste->getId()){
                  if($tache->getEstValide() == 1){
                    $done = $done + 1;
                  }
                  $total = $total + 1;
               ?>
              <li class="list-group-item border-0 d-flex align-items-center ps-0">
                <form name="action" action="index.php?action=checkPrive" method="POST">
                  <input class="form-check-input me-3" type="checkbox" onChange="submit();"
                  <?php if($tache->getEstValide() == 1) echo "checked" ?>>
                  <input type="hidden" name="idTache" value="<?= $tache->getId() ?>" >
                </form>
                <?= $tache->getNom() ?> : <?= $tache->getDescription() ?>

                  <a href="index.php?action=SupprimerTachePrive&idTache=<?= $tache->getId() ?>">
                    <button class="btn btn-default">
                      <img src="./vue/Images/trash.png" width="18" />
                    </button>
                  </a>
              </li>
               <?php
                }
              }
               ?>
            </ul>
          </div>
           <div class="progress">
              <?php
                if($total != 0){
                    $pourcentage = $done * 100 / $total;
                } else{
                  $pourcentage = 0;
                }
                ?>
                  <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo"$pourcentage" ?>%;"></div>
              </div>
        </div>
      </div>
    </div>
  </div>
 <?php
    }
  }
?> 

      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item"> 
            <a class="page-link" href="#">Previous</a>
           </li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
  </body>

<!-- Footer -->
<footer class="text-center text-lg-start bg-light ">
  <br>
  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
          <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
        </svg> Project
          </h6>
          <p>
            2nd year project, consisting of making a To do List in php
            , which contains visitors or users, who can add,
             delete, see tasks...
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <img src="https://img.shields.io/badge/HTML-000?style=for-the-badge&logo=html5&logoColor=orange&color=f8f9fa">
            </img>
          </p>
          <p>
          <img src="https://img.shields.io/badge/CSS-000?style=for-the-badge&logo=Css3&logoColor=blue&color=f8f9fa">
            </img>
          </p>
          <p>
          <img src="https://img.shields.io/badge/PHP-000?style=for-the-badge&logo=php&logoColor=purple&color=f8f9fa">
            </img>
          </p>
          <p>
          <img src="https://img.shields.io/badge/JavaScript-000?style=for-the-badge&logo=javascript&logoColor=yellow&color=f8f9fa">
            </img>   
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p>
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
          </svg>
            emre.kartal@etu.uca.fr
          </p>
          <p>
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
              <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
            </svg>
            rayhan.hassou@etu.uca.fr
          </p>

          <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin" viewBox="0 0 16 16">
  <path d="M4.146.146A.5.5 0 0 1 4.5 0h7a.5.5 0 0 1 .5.5c0 .68-.342 1.174-.646 1.479-.126.125-.25.224-.354.298v4.431l.078.048c.203.127.476.314.751.555C12.36 7.775 13 8.527 13 9.5a.5.5 0 0 1-.5.5h-4v4.5c0 .276-.224 1.5-.5 1.5s-.5-1.224-.5-1.5V10h-4a.5.5 0 0 1-.5-.5c0-.973.64-1.725 1.17-2.189A5.921 5.921 0 0 1 5 6.708V2.277a2.77 2.77 0 0 1-.354-.298C4.342 1.674 4 1.179 4 .5a.5.5 0 0 1 .146-.354zm1.58 1.408-.002-.001.002.001zm-.002-.001.002.001A.5.5 0 0 1 6 2v5a.5.5 0 0 1-.276.447h-.002l-.012.007-.054.03a4.922 4.922 0 0 0-.827.58c-.318.278-.585.596-.725.936h7.792c-.14-.34-.407-.658-.725-.936a4.915 4.915 0 0 0-.881-.61l-.012-.006h-.002A.5.5 0 0 1 10 7V2a.5.5 0 0 1 .295-.458 1.775 1.775 0 0 0 .351-.271c.08-.08.155-.17.214-.271H5.14c.06.1.133.191.214.271a1.78 1.78 0 0 0 .37.282z"/>
</svg> Groupe 4</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="#">ToDoList.com</a>
  </div>
  <!-- Copyright -->
</footer>



</html>