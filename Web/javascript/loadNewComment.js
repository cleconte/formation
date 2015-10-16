
jQuery(document).ready(function(){
    setInterval('affiche_last()', 3000);
});

function affichercommentaire(comment){

    var pistache = $('<fieldset></fieldset>')
        .addClass('comment')
        .attr('data-id',comment.id)
        .append(
        $('<legend></legend>')
            .append(
            'Poste par ',
            $('<a></a>')
                .attr('href','/member-' + comment.auteur + '.html')
                .html( comment.auteur)
                .css('font-weight','bold'),
            ' le ' + comment.date
        ),
        $('<p></p>')
            .html(comment.contenu)
    );
    return pistache;
}


function getvariablecomments(where){

    var newsid = $('.news').attr('data-id');
    var commentoldid = $('.comment:'+where+'').attr('data-id');

    variable = [newsid,commentoldid];
    return variable;
}

function cacherbouton(){
    $(".old-comment").css("visibility", "hidden");
}

function affiche_last()    {

    var variable = getvariablecomments('first');
    $.post('/getNewComments', {newsid: variable[0], commentid: variable[1]}, function (data) {

        $.each(data, function (index, comment) {

            affichercommentaire(comment).insertBefore('.comment:first');
        })

    },'json');
};


function affiche_old()    {
    var variable = getvariablecomments('last');

    $.post('/getOldComments', {newsid: variable[0], commentid: variable[1]}, function (data)
    {
        $.each(data, function (index, comment)
        {
            if(index<5) {
                affichercommentaire(comment).insertAfter('.comment:last');
            }

            indexmax=index;
        })
        if(indexmax!=5){
            cacherbouton();
        }
    },'json');
};
