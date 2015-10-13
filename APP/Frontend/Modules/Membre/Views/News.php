<ul id="profilmenu">
    <li><a href="../Membre-<?= $id ?>">Retour à son Profil</a></li>
    <li><a href="../Membre-<?= $id ?>/Comments">Ses Commentaires</a></li>
</ul>

<?php
if($number>0)
{
    foreach ($listeNews as $news) {
        ?>
        <h2><a href="../news-<?= $news['id'] ?>.html"><?= $news['titre'] ?></a></h2>
        <p><?= nl2br($news['contenu']) ?></p>
        <?php if ($this->app->user()->getAttribute('user') == $news['auteur']) {
            echo '<td><a href="../news-update-', $news['id'], '.html"><img src="/images/update.png" alt="Modifier" /></a>
    <a href="../news-delete-', $news['id'], '.html"><img src="/images/delete.png" alt="Supprimer" /></a></td>';
        } ?>
        <?php
    }
}
else
{?>
    <h2>Il n'a pas écris de news</h2>
    <p>Allez en écrire une ici<td><a href="../news-insert.html"><img src="/images/update.png" alt="Écrire" /></a></p>

<?php
}?>
