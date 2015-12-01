/**
 *
 * Created by lance on 11/30/15.
 */

$(function () {
//        Layout Resize
    var height = $(".customer-list").height() + 100;
    $(".chat-panel").css("height", height + "px");
    $(window).resize(function () {
        var height = $(".customer-list").height() + 100;
        $(".chat-panel").css("height", height + "px");
    });

//        Search Style
    var $search_input = $(".sb-search-input");
    $(".sb-search-submit").click(function (event) {
        if (!$search_input.is(":visible")) {
            $search_input.css("width", "0").css("display", "block");
            $search_input.animate({"width": "175px", "padding": "0 5px"}, 500);
            $(".sb-search .fa-search").addClass("active");
            event.stopPropagation();
            return false;
        } else {
            alert("search: " + $search_input.val());
            $search_input.animate({"width": "0", "padding": "0"}, 500, function () {
                $search_input.css("display", "none").val("");
                $(".sb-search .fa-search").removeClass("active");
            });
            event.stopPropagation();
            return false;
        }
    });
    $search_input.click(function (event) {
        event.stopPropagation();
        return false;
    });
    $("body").click(function () {
        if ($search_input.is(":visible")) {
            $search_input.animate({"width": "0", "padding": "0"}, 500, function () {
                $search_input.css("display", "none").val("");
                $(".sb-search .fa-search").removeClass("active");
            })
        }
    });
});

$(function () {
    $(".customer-list li").click(function () {
        $(this).siblings("li").removeClass("chosen");
        $(this).addClass("chosen");
        alert("chat with " + $(this).find(".name").text());
    });
});

$(function () {
    $(".right.group .fa-bell").click(function () {
        var $window = $(".notification-window");
        $(".overlay").show();
        $window.css("top", $("body").scrollTop() + "px");
        $window.slideDown(500);
        $("body").css("overflow", "hidden");
        event.stopPropagation();
        return false;
    });
});

$(".overlay").click(function () {
    $(".notification-window").slideUp(500, function () {
        $(".overlay").hide();
    });
});

$(function () {
    $("form#words").bind('keydown', function (event) {
        if(event.ctrlKey && event.keyCode == 13){
            $.post(
                $(this).prop('action'),
                {
                    "_token": $('meta[name="_token"]').attr('content'),
                    "user_id": $(this).children("input").val(),
                    "content": $(this).children("textarea").val()
                },
                function(){
                    alert("ok");
                },
                'json'
            );
            return false;
        }
    });
});
