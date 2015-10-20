<ul id="profilmenu">

    <li><?php echo '<a href='.$this->app->router()->BuildRoute('Membre','index',[$id ]).'>'?>Retour à son Profils</a></li>
    <li><?php echo '<a href='.$this->app->router()->BuildRoute('Membre','Comments',[$id ]).'>'?>Ses Commentaires</a></li>
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
