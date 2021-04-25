<form method="post" action="index.php?action=editionEtat&id=<?php $etat['id']?>">
  <div class="form-group">
    <input class="form-control" id="nom_etat" name="nom_etat" value="<?= $etat['nom_etat'] ?>" type="text" placeholder="Titre de l'état" required />
  </div>
   <input type="hidden" name="id" value="<?= $etat['id'] ?>" />
 <input class="buttoncreation" type="submit" value="Modifier" />
</form>