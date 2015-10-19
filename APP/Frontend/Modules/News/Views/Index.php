<?php
use App\Frontend\AppController;
foreach ($listeNews as $news)
{
  echo'<h2><a href='.AppController::BuildRoute('News','show',array($news['id'])).'>'.$news['titre'].'</a></h2>';
?>
  <p><?= nl2br($news['contenu']) ?></p>
  <?php
   if($this->app->user()->getAttribute('user')==$news['auteur'])
    {
      echo'<td><a href='.AppController::BuildRoute('News','update',array($news['id'])).'><img src="/images/update.png" alt="Modifier" /></a>
        <a href='.AppController::BuildRoute('News','delete',array($news['id'])).'><img src="/images/delete.png" alt="Supprimer" /></a></td>';
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
            $i++;
                echo '<a href='.AppController::BuildRoute('Tag','ShowTag',array($tag[2])).'> '.$tag[0] .'</a>';
          }
        }
        if($i==0)
        {
          echo 'il n\'y a pas de tag';
        }
      ?>
    </p>
  </fieldset>
  </br>
  <?php
}
?>

