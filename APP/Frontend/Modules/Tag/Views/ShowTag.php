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

            <h2><a href=<?php echo''.$this->app->router()->BuildRoute('News','show',array($news['id'])).'' ;?>><?= $news['titre'] ?></a></h2>
            <fieldset>
                <p><?= nl2br($news['contenu']) ?></p>
            </fieldset>
            <tr></tr>
            </br>
          <?php
           if($this->app->user()->getAttribute('user')==$news['auteur'])
            {
              echo'<td><a href='.$this->app->router()->BuildRoute('News','update',array($news['id'])).'><img src="/images/update.png" alt="Modifier" /></a>
                <a href='.$this->app->router()->BuildRoute('News','delete',array($news['id'])).'><img src="/images/delete.png" alt="Supprimer" /></a></td>';
        }
    }

}
?>
