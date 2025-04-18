<?php
if (isset($_SESSION['user'])) {
  echo "<nav>
            <span>Bienvenue " . htmlspecialchars($_SESSION['user']['nom']) . "</span>
            <a href='../users/index.php'>Accueil</a>
            <a href='../logout.php'>Déconnexion</a>
          </nav>";
}
