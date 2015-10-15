<p>Par <a href="../Membre-<?= $id ?>" ><em><?= $news['auteur'] ?></em></a>, le <?= $news['dateAjout']->format('d/m/Y à H\hi') ?></p>

<h2><?= $news['titre'] ?></h2>

<p><?= nl2br($news['contenu']) ?></p>

<fieldset>
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
<fieldset>
  <legend>


    Posté par <strong><a href="Membre-<?= $comment['auteur'] ?>"><?= htmlspecialchars($comment['auteur']) ?></a></strong> le <?= $comment['date']->format('d/m/Y à H\hi') ?>

    <?php if ($user->isAuthenticated()) {?> -
      <a href="../admin/comment-update-<?= $comment['id'] ?>.html">Modifier</a> |
      <a href="../admin/comment-delete-<?= $comment['id'] ?>.html">Supprimer</a>

    <?php } ?>
  </legend>
  <p><?= nl2br(htmlspecialchars($comment['contenu'])) ?></p>
</fieldset>
<?php
}
?>
<p><a href="commenter-<?= $news['id'] ?>.html">Ajouter un commentaire</a></p>


<input type="submit" id="test" value="Recharger" />


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<script type="text/javascript">



    $('#test').click(function() {
        var newsid = '<?php echo $news['id']; ?>';
        alert( newsid);

        var commentlastid = '<?php echo $comments[0]['id']; ?>';
        alert( commentlastid);


        $.post( '/getNewComments', {newsid: newsid, commentlastid: commentlastid }, function( data ) {
            alert( data );
        }
        });
    });
</script>