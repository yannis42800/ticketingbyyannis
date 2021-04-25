<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="Contenu/style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title><?= $titre ?></title>
</head>
<body>
    <div id="global">
        <header>
        <div class="container">
        <div class="row">
        <div class="col-md-6">
            
    <a href="index.php"><h1 id="titreBlog">Gestionnaire des tickets</h1></a>
    </div>

<div class="col-md-6">

  <a href="index.php?action=etats"><h1 id="titreBlog">Gestionnaire des états</h1></a>
</div>
</div>
</div>
            <hr>
        </header>
        <div id="contenu">
            <?= $contenu ?>
        </div> <!-- #contenu -->
        <footer id="piedBlog">
            Ticketing réalisé par yannis avec PHP, HTML5 et CSS.
        </footer>
    </div> <!-- #global -->
</body>
</html>