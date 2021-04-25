<div class="container">


    <div class="col-md-6">
        <h2>Editer un Billet</h2>
        <form method="post" action="index.php?action=editionBillet&id=<?= $billet['id'] ?>">
            <input type="hidden" name="id" value="<?= $billet['id']; ?>" />
            <div class="form-group">
                <input class="form-control" id="name"  name="titre" value="<?= $billet['titre']; ?>" type="text" placeholder="Le nom de l'etat" required />
            </div>
            <textarea name="contenu" id="contenu" cols="30" rows="10"><?= $billet['contenu']; ?></textarea>
            <input type="submit" value="Envoyer" name="submit" class="btn btn-primary" />
        </form>


    </div>
</div>