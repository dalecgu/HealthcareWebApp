/**
 *
 * Created by lance on 11/30/15.
 */

$(function () {
    $(".f-interact .fa-comments").click(function () {
        $(this).parent().siblings(".f-comments").toggle(500);
        return false;
    });
});

$(document).on("click", ".fa-thumbs-up", function () {
    var t = $(this);
    var reply_id = t.attr('class').substr(21);
    $.post(
        '/moment/'+reply_id+'/agree',
        {
            "_token": csrf_token
        },
        function(data)
        {
            var originText = t.text();
            t.text(originText.replace("赞", "已赞"));
            originText = t.text();
            var origin = t.text();
            origin = origin.substring(origin.indexOf('(')+1, origin.length-1);
            t.text(originText.replace(origin, parseInt(origin)+1));
        },
        'json'
    ).error(
        function()
        {
            alert("遇到了一点问题，不过没关系，忽略就好了嘛～");
        }
    );
});

$(function () {
    $("form.comments").bind('keydown', function (event) {
        if(event.ctrlKey && event.keyCode == 13){
            $.post(
                $(this).prop('action'),
                {
                    "_token": $(this).find("input[name='_token']").val(),
                    "content": $(this).find("textarea").val().replace("\n", "<br/>")
                },
                function(data)
                {
                    location.reload();
                },
                'json'
            ).error(
                function()
                {
                    alert("遇到了一点问题，不过没关系，忽略就好了嘛～");
                }
            );
            return false;
        }
    });
});