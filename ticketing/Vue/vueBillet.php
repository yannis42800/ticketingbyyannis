<?php $titre = "Ticket - " . $billet['titre']; ?>
  <div class="container">
        <div class="row">
        <div class="col-md-6">
<article>
    <header>
        <h3 id="modifieretat" class="titreBillet"><?= $billet['titre'] ?> - Ticket <?= $billet['nom_etat'] ?></h1>
        <time><?= $billet['date_ticket'] ?></time>
    </header>
    <p><?= $billet['contenu'] ?></p>

</article>
<form  method="post" action="index.php?action=modifieretat">
<h3 id="modifieretat" >Modifier l'état du ticket : </h3>
<select name="etats" class="form-control" style="width: 50%;">
	<?php foreach($etats as $etat): ?>
		<option value="<?= $etat['id'] ?>"><?= $etat['nom_etat'] ?></option>
	<?php endforeach; ?>
</select>
<input type="hidden" name="id" value="<?= $billet['id'] ?>" />
<input  type="submit" class="btn btn-info" name="modifier_etat">
<br> 

</form>
<!--Modif-->
<!--<h3 id="modifieretat">Modifier Le ticket</h3>-->
<!--Supprimer billet-->
<!--<form method="post" action="index.php?action=supprimerbillet">
<input name="id" type="hidden" value="<?=$billet['id']?>">
<input type="submit" value="supprimer" class="btn btn-info">
</form>
-->
<!--Supprimer billet-->
<!--
<a class="btn btn-warning" href="index.php?action=editerBillet&id=<?= $billet['id'] ?>">Modifier ce ticket </a>
-->


</div>

        <div id="tebcom" class="col-md-6">
        <h2 id="modifieretat">Commentaires du ticket :</h2>
<?php foreach ($commentaires as $commentaire): ?>

    <p><?= $commentaire['auteur'] ?> dit :</p>
    <p><?= $commentaire['contenu'] ?></p>
    <hr>

<?php endforeach; ?>
<hr>

<header>
    <h1 id="titreReponses">Réponses à <?= $billet['titre'] ?></h1>
</header>
<form  method="post" action="index.php?action=commenter">
  <div class="form-group">
    <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" 
           required >
    <small id="emailHelp" class="form-text text-muted">Il faut mettre votre nom.</small>
  </div>
  <div class="form-group">
    <input id="txtCommentaire" name="contenu" rows="4" 
              placeholder="Votre commentaire" required>
  </div>
    <input type="hidden" name="id" value="<?= $billet['id'] ?>" />
  <button type="submit" class="btn btn-primary" name="ajouter_commenter" value="Commenter">Submit</button>
</form>



<hr>



</div>
</div>
</div>