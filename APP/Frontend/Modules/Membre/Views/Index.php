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
    {?><li><?php echo '<a href='.$this->app->router()->BuildRoute('Membre','News',[$id ]).'>'?>Ses News</a></li>
    <?php }?>
    <li><?php echo '<a href='.$this->app->router()->BuildRoute('Membre','Comments',[$id ]).'>'?>Ses Commentaires</a></li>
</ul>
