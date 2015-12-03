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
        $(".chat-header .name").text($(".customer-list .chosen .name").text());
        selected_customer_id = $(".customer-list .chosen").attr("id").substr(8);
        $.get(
            "/coachdoctor/advice",
            {
                "user_id": selected_customer_id
            },
            function(data)
            {
                $(".chat-content .chat-history ul").children().remove();
                $("form#words").children("textarea").val('');
                var advices = eval(data).advices;
                for (var i = 0; i < advices.length; i++) {
                    var advice = advices[i];
                    if (advice.advisor_id==auth_user_id) {
                        $(".chat-content .chat-history ul").append("\
                            <li class=\"me chat-item clearfix\">\
                                <img src=\"/image/default_head.png\" class=\"head\">\
                                <div class=\"words\">\
                                    <p>" + advice.content + "</p>\
                                </div>\
                            </li>\
                        ");
                    } else {
                        $(".chat-content .chat-history ul").append("\
                            <li class=\"other chat-item clearfix\">\
                                <img src=\"/image/default_head.png\" class=\"head\">\
                                <div class=\"words\">\
                                    <p>" + advice.content + "</p>\
                                </div>\
                            </li>\
                        ");
                    }
                };
            },
            'json'
        ).error(
            function()
            {
                alert("遇到了一点问题，不过没关系，忽略就好了嘛～");
            }
        );
        return false;
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
                    "_token": $(this).find("input[name='_token']").val(),
                    "user_id": selected_customer_id,
                    "content": $(this).children("textarea").val().replace("\n", "<br/>")
                },
                function(data)
                {
                    $(".chat-content .chat-history ul").children().remove();
                    $("form#words").children("textarea").val('');
                    var advices = eval(data).advices;
                    for (var i = 0; i < advices.length; i++) {
                        var advice = advices[i];
                        if (advice.advisor_id==auth_user_id) {
                            $(".chat-content .chat-history ul").append("\
                                <li class=\"me chat-item clearfix\">\
                                    <img src=\"/image/default_head.png\" class=\"head\">\
                                    <div class=\"words\">\
                                        <p>" + advice.content + "</p>\
                                    </div>\
                                </li>\
                            ");
                        } else {
                            $(".chat-content .chat-history ul").append("\
                                <li class=\"other chat-item clearfix\">\
                                    <img src=\"/image/default_head.png\" class=\"head\">\
                                    <div class=\"words\">\
                                        <p>" + advice.content + "</p>\
                                    </div>\
                                </li>\
                            ");
                        }
                    };
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

$(function () {
    $(".cbp-tm-menu > li").bind("mouseover", function(){
        $(this).find(".cbp-tm-submenu").addClass("cbp-tm-show");
    }).bind("mouseout", function () {
        $(this).find(".cbp-tm-submenu").removeClass("cbp-tm-show");
    });

});
