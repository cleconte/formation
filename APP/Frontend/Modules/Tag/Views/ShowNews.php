<?php
if(isset($undefined)){
?>
 <p> Le Tag demandé n'existe pas </p>
 <?php
}
else{?>

    <h1><strong>Tag : </strong><?= $nametag ?> </h1>


    <?php
        if(empty($ListNewsTag)){?>
            <fieldset>
                <p>il n'y a pas de news associée</p>
            </fieldset
            <?php
        }
        foreach ($ListNewsTag as $news ) {

            ?>

            <h2><a href="news-<?= $news['id'] ?>.html"><?= $news['titre'] ?></a></h2>
            <fieldset>
                <p><?= nl2br($news['contenu']) ?></p>
            </fieldset>
            <tr></tr>
            </br>
          <?php
           if($this->app->user()->getAttribute('user')==$news['auteur'])
            {
              echo'<td><a href="news-update-', $news['id'], '.html"><img src="/images/update.png" alt="Modifier" /></a>
                <a href="news-delete-', $news['id'], '.html"><img src="/images/delete.png" alt="Supprimer" /></a></td>';
        }
    }

}
?>
