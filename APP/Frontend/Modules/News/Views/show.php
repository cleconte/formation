<p>Par <a href=<?php echo''.$this->app->router()->BuildRoute('Membre','index',array($id)).'' ;?>><em><?= $news['auteur'] ?></em></a>, le <?= $news['dateAjout']->format('d/m/Y à H\hi') ?></p>

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
              <?php echo '<a href='.$this->app->router()->BuildRoute('Tag','ShowTag',[$tag[2]]).'>'. $tag[0] .'</a>';?>
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

<?php echo '<p><a href='.$this->app->router()->BuildRoute('News','insertComment',[$news['id']]).'>Ajouter un commentaire</a></p>';?>



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


                    Posté par
                    <strong>
                            <?php echo '<a href='.$this->app->router()->BuildRoute('Membre','index',[$comment['auteur']]) ?>
                            <a href="Membre-<?= $comment['auteur'] ?>"><?= htmlspecialchars($comment['auteur']) ?></a>
                    </strong>
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
<button id="bt-voirplus" type="button" class="old-comment" onClick="loadOldComment()">
    Voir plus
</button>

    <button id="bt-voirplus" type="button" class="hidebutton" onClick="hideButton()">
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