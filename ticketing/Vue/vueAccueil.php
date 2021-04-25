<?php $titre = 'Gestionnaire des tickets'; ?>
<?php foreach ($billets as $billet): ?>
    <article id="card">
        <div id="ticket">
        <header>
            <?php if ($billet['TIC_ETAT'] == 1 || $billet['TIC_ETAT'] == 2) { ?>
                <h1 class="titreBillet"><a href="index.php?action=billet&id=<?= $billet['id_billet'] ?>"><?= $billet['TIC_TITRE'] ?></a> | <?php if ($billet['TIC_ETAT'] == 1) { ?>
                    <span class="btn btn-success"><?= $billet['nom_etat'] ?></span>
                <?php } elseif ($billet['TIC_ETAT'] == 2) { ?>
                   <span class="btn btn-warning"><?= $billet['nom_etat'] ?></span>
                   <?php } ?></h1>
               <?php } else { ?>
                <h1 class="titreBillet"><a href="index.php?action=billet&id=<?= $billet['id_billet'] ?>"><?= $billet['TIC_TITRE'] ?> | <span class="btn btn-danger"><?= $billet['nom_etat'] ?></span>
                    <?php } ?></h1>
                    <time id="time"><?= $billet['TIC_DATE'] ?></time>
        </header>
                <p><?= $billet['TIC_CONTENU'] ?></p>
        </div>
    </article>
            <hr/>
        <?php endforeach; ?>
    
    
        <h2 id="h2">Ajouter un nouveau ticket</h2>
        <form id="fromajout" method="post" action="index.php?action=ajouter">
        <div class="form-group">
        <label for="titre" id="titrelabel">Titre de la demande</label>
        <input type="text" name="titre" class="form-control" id="titre" placeholder="Enter la demande"required >
        </div>
        <div class="form-group">
        <label for="txtCommentaire" id="commentairelabel">Votre demande</label>
        <input type="text" name="demande" class="form-control" id="txtCommentaire" placeholder="Votre demande" rows="4"  required >
        </div>
        <button style="margin-left: 45%" type="submit" name="valider_ticket" class="btn btn-primary">Commenter</button>
        </form>