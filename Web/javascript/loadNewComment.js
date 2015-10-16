
jQuery(document).ready(function(){
    setInterval('loadNewComment()', 3000);
});

function buildComment(comment){

    return $('<fieldset></fieldset>')
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
}


function getComment(where){
    return {
        id : $('.comment:'+where+'').attr('data-id'),
        news_id : $('.news').attr('data-id')
    };
}

function hideButton(){
    $(".old-comment").css("visibility", "hidden");
}

function loadNewComment()    {
    var comment = getComment('first');
    loadCommentsUsingCommentId('/getNewComments',comment);
};

function loadOldComment()    {
    var comment = getComment('last');
    loadCommentsUsingCommentId('/getOldComments',comment);
};

function loadCommentsUsingCommentId(url,comment) {

    $.post(url, {newsid: comment.news_id, commentid: comment.id}, function (data)
    {
        pushComment(data);
    },'json');
}

function pushComment(data) {
    var firstComment = getComment('first');
    var lastComment = getComment('last');


    $.each(data, function (index, comment) {
        if (parseInt(firstComment.id) < parseInt(comment.id) ) {
            buildComment(comment).insertBefore('.comment:first');
            firstComment.id = comment.id;
        }
        else {
            buildComment(comment).insertAfter('.comment:last');
            lastComment.id = comment.id;
        }
    });

    if (data.no_more_comment) {
        hideButton();
    }
}


