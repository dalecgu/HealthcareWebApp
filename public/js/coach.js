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

$(function () {
    $(".profile .to-edit-profile").click(function () {
        var $window = $(".profile-edit-window");
        $(".overlay").show();
        $window.css("top", $("body").scrollTop() + "px");
        $window.slideDown(500);
        $("body").css("overflow", "hidden");
        event.stopPropagation();
        return false;
    });
});

$(".overlay").click(function () {
    if($(".notification-window").is(":visible")){
        $(".notification-window").slideUp(500, function () {
            $(".overlay").hide();
        });
    }
    if($(".profile-edit-window").is(":visible")){
        $(".profile-edit-window").slideUp(500, function () {
            $(".overlay").hide();
        });
    }
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
    $(".profile .menu").bind("mouseover", function () {
        $(this).find(".submenu").addClass("shown");
    }).bind("mouseout", function () {
        $(this).find(".submenu").removeClass("shown");
    });

});

$(function () {
    var i = 0;
    for (i = 2014; i >= 1900; i--) {
        $("#birth-year").append($("<option value='" + (i + 1) + "'>" + (i + 1) + "</option>"));
    }
    for (i = 0; i < 12; i++) {
        $("#birth-month").append($("<option value='" + (i + 1) + "'>" + (i + 1) + "</option>"));
    }
    for (i = 0; i < 31; i++) {
        $("#birth-date").append($("<option value='" + (i + 1) + "'>" + (i + 1) + "</option>"));
    }
    $("#birth-year").find("option[value='1995']").attr("selected", "selected");
    $("#birth-month").find("option[value='11']").attr("selected", "selected");
    $("#birth-date").find("option[value='21']").attr("selected", "selected");

    $(".pf-head-edit").click(function () {
        var value = $(this).parent().next().find(".pf-item-value"),
            edit_value = $(this).parent().next().find(".pf-item-editable");
        if ($(this).text() == "编辑") {
            $(this).text("保存");
        }
        else {
            $(this).text("编辑");
            $.ajax({
                url: document.profile.action,
                type: 'put',
                data: {
                    '_token': document.profile._token.value,
                    'nickname': document.profile.nickname.value,
                    'age': document.profile.age.value,
                    'location': document.profile.location.value,
                    'gendor': document.profile.gendor.value,
                    'company': document.profile.company.value,
                    'description': document.profile.description.value
                },
                success: function(data) {
                },
                error: function(err) { alert("遇到了一点问题，不过没关系，忽略就好了嘛～"); }
            });

            edit_value.not(".selects").each(function () {
                $(this).attr("valid_val", $(this).val());
            });

            edit_value.filter('.selects').each(function () {
                var val = "",
                    selects = $(this).find("select");
                selects.each(function () {
                    val += $(this).val() + "-";
                });
                $(this).attr("valid_val", val.substr(0, val.length - 1));
            });

            value.each(function () {
                $(this).text($(this).parent().find(".pf-item-editable").attr("valid_val"));
            });
        }
        value.toggle();
        edit_value.toggle();
        return false;
    });
});
