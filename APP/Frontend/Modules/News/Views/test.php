
<?php /*
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






<script type="text/javascript">


    $.each(data, function() {
        $.each(this, function(name, value) {
            /// do stuff
            console.log(name + '=' + value);
        });
    });

    <fieldset>
    <legend>
Posté par <strong><a href="Membre-<?= $comment['auteur'] ?>"><?= htmlspecialchars($comment['auteur']) ?></a></strong> le <?= $comment['date']->format('d/m/Y à H\hi') ?>

<?php if ($user->isAuthenticated()) {?>
    <a href="../admin/comment-update-<?= $comment['id'] ?>.html">Modifier</a>
    <a href="../admin/comment-delete-<?= $comment['id'] ?>.html">Supprimer</a>
<?php } ?>
</legend>
<p><?= nl2br(htmlspecialchars($comment['contenu'])) ?></p>
</fieldset>"


$.ajax({
dataType: 'json',
type: 'POST',
url: '/getNewComments',
success: function(orders) {
$.each(orders, function(i, order) {
alert(orders);
$orders.append('<li>my order</li>');
});
}


}); alert('test');

$.post('/getNewComments', {newsid: newsid, commentlastid: commentlastid}, function (data) {
alert(data);
prePopulate: $.parseJSON(data);
$.each(data, function (index, value) {
alert(key + ": " + value);
var text = _showCommentDiv.prepend('', '<fieldset class="comment"><legend>Poste par: <a href="/member-' + value.auteur + '.html">' + value.auteur + '</a> le ' + value.date + '</legend><p>' + value.contenu + '</p></fieldset>');

$(".inner").append(text);
}),'json';

});


[{
"id":"33","0":"33",
"news":"49","1":"49",
"auteur":"test6","2":"test6",
"contenu":"testafficher json","3":"testafficher json",
"date":"2015-10-15 17:09:07","4":"2015-10-15 17:09:07"}]
</script>



_showCommentDiv.prepend('', '<fieldset class="comment"><legend>Poste par: <a href="/member-' + value.auteur + '.html">' + value.auteur + '</a> le ' + dateStr + '</legend><p>' + value.contenu + '</p></fieldset>');


*/?>