
<ul id="profilmenu">
    <li><a href="../Membre-<?= $id ?>">Retour à son Profil</a></li>

    <?php if($auteur!=false)
    {?><li><a href="../Membre-<?= $id ?>/News">Ses News</a></li>
    <?php }?>
</ul>

<?php

if($number>0) {
    foreach ($comments as $comment) {
        ?>
        <fieldset>
            <legend>
                Posté par <strong><?= htmlspecialchars($comment['auteur']) ?></strong>
                le <?= $comment['date']->format('d/m/Y à H\hi') ?>

                <?php if ($user->isAuthenticated()) { ?> -
                    <a href="../admin/comment-update-<?= $comment['id'] ?>.html">Modifier</a> |
                    <a href="../admin/comment-delete-<?= $comment['id'] ?>.html">Supprimer</a>
                <?php } ?>

                sur cette <a href="../news-<?= $comment['news'] ?>.html">New</a>
            </legend>
            <p><?= nl2br(htmlspecialchars($comment['contenu'])) ?></p>
        </fieldset>
        <?php
    }
}
else
{
?>
    <h2>Il n'a pas écris de commentaire</h2>
    <p>Allez donc voir quelques news<td><a href="../"><img src="/images/update.png" alt="Accueil" /></a></p>
<?php
}?>
