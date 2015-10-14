<?php
foreach ($listeNews as $news)
{
?>
  <h2><a href="news-<?= $news['id'] ?>.html"><?= $news['titre'] ?></a></h2>
  <p><?= nl2br($news['contenu']) ?></p>
  <?php
   if($this->app->user()->getAttribute('user')==$news['auteur'])
    {
      echo'<td><a href="news-update-', $news['id'], '.html"><img src="/images/update.png" alt="Modifier" /></a>
        <a href="news-delete-', $news['id'], '.html"><img src="/images/delete.png" alt="Supprimer" /></a></td>';
    }
?>
  <fieldset>
    <legend>
      <strong>TAG</strong>
    </legend>

    <p>
      <?php
      $i = 0;
        foreach($tags as $tag)
        {
          if($tag[1]== $news['id']&&$i<5)
          {
            echo ' ' . $tag[0] ;$i++;
          }
        }
        if($i==0)
        {
          echo'il n\'y a pas de tag';
        }
      ?>
    </p>
  </fieldset>
  </br>
  <?php
}
?>

