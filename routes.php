<?php
require_once('Core/Router.php');
// Routage application
\Router::connect('/', ['controller' => 'AppController', 'action' => 'indexAction']);
\Router::connect('/index', ['controller' => 'AppController', 'action' => 'indexAction']);
\Router::connect('/index.php', ['controller' => 'AppController', 'action' => 'indexAction']);
\Router::connect('/Error/404', ['controller' => 'ErrorController', 'action' => 'errorAction']);
\Router::connect('/Films', ['controller' => 'AppController', 'action' => 'filmAction']);
\Router::connect('/Selection', ['controller' => 'AppController', 'action' => 'selectionAction']);
\Router::connect('/Abonnements', ['controller' => 'AppController', 'action' => 'abonnementAction']);
if (isset($_GET['q'])) {
  \Router::connect('/Films?q=' . $_GET['q'], ['controller' => 'AppController', 'action' => 'getFilmAction']);
}
if (isset($_GET['f'])) {
  \Router::connect('/Films/Details?f=' . $_GET['f'], ['controller' => 'FilmController', 'action' => 'DetailFilmAction']);
}
if (isset($_GET['f'])) {
  \Router::connect('/read?f=' . $_GET['f'], ['controller' => 'HistoriqueController', 'action' => 'addHistoryAction']);
}

// Routage profil
\Router::connect('/user/login', ['controller' => 'UserController', 'action' => 'loginAction']);
\Router::connect('/user/register', ['controller' => 'UserController', 'action' => 'registerAction']);
\Router::connect('/user/profil', ['controller' => 'UserController', 'action' => 'profilAction']);
\Router::connect('/user/add-film', ['controller' => 'UserController', 'action' => 'addFilmAction']);
\Router::connect('/user/added-film', ['controller' => 'UserController', 'action' => 'addedFilmAction']);
\Router::connect('/user/history', ['controller' => 'UserController', 'action' => 'historyAction']);
\Router::connect('/user/deconnexion', ['controller' => 'UserController', 'action' => 'deconnexionAction']);
\Router::connect('/user/add-history', ['controller' => 'UserController', 'action' => 'addHistoryAction']);
\Router::connect('/user/account-info', ['controller' => 'UserController', 'action' => 'accountSettingAction']);
\Router::connect('/user/all-genre', ['controller' => 'GenreController', 'action' => 'genreFilmAction']);
\Router::connect('/user/add-genre', ['controller' => 'GenreController', 'action' => 'addGenreAction']);
\Router::connect('/user/del-account', ['controller' => 'UserController', 'action' => 'delUserAction']);
//Route modification profil
if (isset($_GET['f'])) {
  \Router::connect('/user/modif-genre?f=' . $_GET['f'], ['controller' => 'GenreController', 'action' => 'modifGenreAction']);
}
if (isset($_GET['f'])) {
  \Router::connect('/user/Modif?f=' . $_GET['f'], ['controller' => 'UserController', 'action' => 'ModifFilmAction']);
}
if (isset($_GET['f'])) {
  \Router::connect('/user/Del?f=' . $_GET['f'], ['controller' => 'UserController', 'action' => 'DelFilmAction']);
}
if (isset($_GET['f'])) {
  \Router::connect('/user/del-history?f=' . $_GET['f'], ['controller' => 'HistoriqueController', 'action' => 'delHistoriqueAction']);
}

if (isset($_GET['f'])) {
  \Router::connect('/user/del-genre?f=' . $_GET['f'], ['controller' => 'GenreController', 'action' => 'delGenreAction']);
}
