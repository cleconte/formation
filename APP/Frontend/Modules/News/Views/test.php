<button id="charger">Charger et traiter les données</button>
<div id="r">Cliquez sur "Charger et traiter les données" pour lancer la lecture et le traitement des données JSON</div>



<script src="jquery.js"></script>
<script>
    $(function() {
        $('#charger').click(function() {
            $.getJSON('fichier.json', function(donnees) {
                $('#r').html('<p><b>Nom</b> : ' + donnees.nom + '</p>');
                $('#r').append('<p><b>Age</b> : ' + donnees.age + '</p>');
                $('#r').append('<p><b>Ville</b> : ' + donnees.ville + '</p>');
                $('#r').append('<p><b>Domaine de compétences</b> : ' + donnees.domaine + '</p>');
            });
        });
    });
</script>





var newsid = '<?php echo $news['id']; ?>';
alert( newsid);

var commentlastid = '<?php echo $comments[0]['id']; ?>';
alert( commentlastid);
<?php
/**
 * Created by PhpStorm.
 * User: cleconte
 * Date: 15/10/2015
 * Time: 15:35
 */