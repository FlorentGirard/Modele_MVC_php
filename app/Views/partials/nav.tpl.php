<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= $router->generate('main-home') ?>">Title</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">
                    Accueil <span class="sr-only">(current)</span>
                </a>
                </li>
                <li class="nav-item">
                <?php
    
                    // si je possède les entrées "userId" et "userObject" dans mon tableau de session
                    // c'est que je suis authentifié, connecté

                    if( isset($_SESSION['userId']) && isset($_SESSION['userObject']) ): ?>
                        <!-- utilisateur connecté -->
                        <a class="nav-link" href="<?= $router->generate('security-logout') ?>">Déconnexion</a>

                    <?php else: ?>

                        <!-- utilisateur non connecté (visiteur) -->
                        <a class="nav-link" href="<?= $router->generate('security-login') ?>">Connexion</a>                    
                        
                    <?php endif; ?>
                </li>
               
            </ul>
             <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Rechercher">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Rechercher</button>
            </form> 
        </div>
    </div>
</nav>