<p>Par <a href="../Membre-<?= $id ?>" ><em><?= $news['auteur'] ?></em></a>, le <?= $news['dateAjout']->format('d/m/Y à H\hi') ?></p>

<h2><?= $news['titre'] ?></h2>

<p><?= nl2br($news['contenu']) ?></p>

<fieldset class="news" data-id="<?=$news['id']?>">
  <legend>
    <strong>TAG</strong>
  </legend>
  <p><?php
      $i = 0;
      foreach($tags as $tag)
      {
          if($tag[1]== $news['id']&&$i<5)
          {
              $i++;
              ?>
                <a href="Tag-<?= $tag[2] ?>"><?= ' ' . $tag[0] ?></a>
              <?php
          }
      }
      if($i==0)
      {
          echo'il n\'y a pas de tag';
      }?>
  </p>
</fieldset>
</br>

<p><a href="commenter-<?= $news['id'] ?>.html">Ajouter un commentaire</a></p>


<h3>Commentaires</h3>

<?php if ($news['dateAjout'] != $news['dateModif']) { ?>
  <p style="text-align: right;"><small><em>Modifiée le <?= $news['dateModif']->format('d/m/Y à H\hi') ?></em></small></p>
<?php } ?>

<?php
if (empty($comments))
{
?>
<p>Aucun commentaire n'a encore été posté. Soyez le premier à en laisser un !</p>
<?php
}

    foreach ($comments as $comment)
    {

            ?>
            <fieldset class="comment" data-id="<?= $comment['id']; ?>">
                <legend>


                    Posté par <strong><a
                            href="Membre-<?= $comment['auteur'] ?>"><?= htmlspecialchars($comment['auteur']) ?></a></strong>
                    le <?= $comment['date']->format('d/m/Y à H\hi') ?>

                    <?php if ($user->isAuthenticated()) { ?>
                        <a href="../admin/comment-update-<?= $comment['id'] ?>.html">Modifier</a>
                        <a href="../admin/comment-delete-<?= $comment['id'] ?>.html">Supprimer</a>

                    <?php } ?>
                </legend>
                <p><?= nl2br(htmlspecialchars($comment['contenu'])) ?></p>
            </fieldset>
            <?php
    }
?>
<?php if ($anycomments) { ?>
<button id="bt-voirplus" type="button" class="old-comment" onClick="affiche_old()">
    Voir plus
</button>

    <button id="bt-voirplus" type="button" class="hidebutton" onClick="cacherbouton()">
        cacher
    </button>
<?php } ?>

</br>



<script type="text/javascript">






</script>

<!--
:eq( 4 )
=> 5eme élément


-->