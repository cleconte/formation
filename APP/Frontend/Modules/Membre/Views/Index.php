<fieldset>
    <legend>
        <strong><?Php echo 'Profil de '.htmlspecialchars($member->username()) ?></strong>
        <?php echo' niveau de priorité : '.htmlspecialchars($member->priority())?>



    </legend>
    <?php if($auteur!=false)
    {?>

        <p>Adresse mail : <?php echo htmlspecialchars($member->mail()) ?></p>
        <p>Description : <?php echo htmlspecialchars($member->description()) ?></p>
        <?php
    }
    else{
        ?>
        <p>Cette personne n'est pas un membre</p>
    <?php
    }?>

</fieldset>

<ul id="profilmenu">
    <?php if($auteur!=false)
    {?><li><a href="../Membre-<?= $id ?>/News">Ses News</a></li>
    <?php }?>
    <li><a href="../Membre-<?= $id ?>/Comments">Ses Commentaires</a></li>
</ul>
