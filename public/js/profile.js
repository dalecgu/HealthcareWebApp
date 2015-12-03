/**
 *
 * Created by lance on 11/29/15.
 */

$(function () {
    $(".personal-cd-intro > nav > a").click(function () {
        $(this).siblings("a").removeClass("chosen");
        $(this).addClass("chosen");
        var target = $(this).attr("href");
        $(target).siblings("div").css("z-index", "1");
        $(target).css("z-index", "2");
        return false;
    });

    var profile_completion_percent = 0.66;
    $(".completion-percent").css("width", profile_completion_percent * 100 + '%');
    $(".completion-label").text(profile_completion_percent * 100 + "%");

    $(".to-complete-profile").click(function () {
        $(".center.column > div").hide();
        $(".center.column .personal-profile").show();
        $("body").scrollTop(0);
        return false;
    });

    $(document).on("click", "#my-coach-panel .to-cd-chat", function () {
        $(".center.column > div").hide();
        $(".center.column .personal-cd").show();
        $("body").scrollTop(0);
        type = 'coach';
        getHistory();
        return false;
    });

    $(document).on("click", "#my-doctor-panel .to-cd-chat", function () {
        $(".center.column > div").hide();
        $(".center.column .personal-cd").show();
        $("body").scrollTop(0);
        type = 'doctor';
        getHistory();
        return false;
    });
});

$(function () {
    $(document).on("click", ".personal-cd-intro #my-coach-panel .cd-layoff", function (event) {
        form_used = document.deleteCoach;
        var $window = $(".layoff-cd-window");
        $(".overlay").show();
        $window.css("top", $("body").scrollTop() + "px");
        $window.slideDown(500);
        $("body").css("overflow", "hidden");
        event.stopPropagation();
        return false;
    });

    $(document).on("click", ".personal-cd-intro #my-doctor-panel .cd-layoff", function (event) {
        form_used = document.deleteDoctor;
        var $window = $(".layoff-cd-window");
        $(".overlay").show();
        $window.css("top", $("body").scrollTop() + "px");
        $window.slideDown(500);
        $("body").css("overflow", "hidden");
        event.stopPropagation();
        return false;
    });

    $(document).on("click", ".layoff-cd-window .cancel", function () {
        $(".layoff-cd-window").slideUp(500, function () {
            $(".overlay").hide();
        });
        $("body").css("overflow", "auto");
        return false;
    });
});

$(function () {
    $(document).on("click", "#my-coach-panel .to-find-cd", function (event) {
        var $window = $("#coach-list-window");
        $(".overlay").show();
        $window.css("top", ($("body").scrollTop + 100) + "px");
        $window.slideDown(500);
        $("body").css("overflow", "hidden");
        event.stopPropagation();
        return false;
    });

    $(document).on("click", "#my-doctor-panel .to-find-cd", function (event) {
        var $window = $("#doctor-list-window");
        $(".overlay").show();
        $window.css("top", ($("body").scrollTop + 100) + "px");
        $window.slideDown(500);
        $("body").css("overflow", "hidden");
        event.stopPropagation();
        return false;
    });

    $(document).on("click", ".cd-list-window .cancel", function () {
        $(this).parent().parent().parent().slideUp(500, function () {
            $(".overlay").hide();
        });
        $("body").css("overflow", "auto");
        return false;
    });

    $(document).on("click", ".cd-info-panel .back", function () {
        $(this).parent().addClass("unvisible");
    });

    $(document).on("click", ".cd-list-panel .cd-name", function(){
        $(this).parent().parent().parent().parent().parent().siblings("#cd-info-"+cdid).removeClass("unvisible");
    })
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
    $("#birth-year").find("option[value="+year_now+"]").attr("selected", "selected");
    $("#birth-month").find("option[value="+month_now+"]").attr("selected", "selected");
    $("#birth-date").find("option[value="+date_now+"]").attr("selected", "selected");


    $("#basic").click(function () {
        var value = $(this).parent().next().find(".pf-item-value"),
            edit_value = $(this).parent().next().find(".pf-item-editable");
        if ($(this).text() == "编辑") {
            $(this).text("保存");
        }
        else {
            $(this).text("编辑");
            $.ajax({
                url: document.basic.action,
                type: 'put',
                data: {
                    '_token': document.basic._token.value,
                    'name': document.basic.name.value,
                    'nickname': document.basic.nickname.value,
                    'truename': document.basic.truename.value,
                    'location': document.basic.location.value,
                    'gendor': document.basic.gendor.value,
                    'year': document.basic.year.value,
                    'month': document.basic.month.value,
                    'date': document.basic.date.value,
                    'description': document.basic.description.value
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

    $("#contact").click(function () {
        var value = $(this).parent().next().find(".pf-item-value"),
            edit_value = $(this).parent().next().find(".pf-item-editable");
        if ($(this).text() == "编辑") {
            $(this).text("保存");
        }
        else {
            $(this).text("编辑");
            $.ajax({
                url: document.contact.action,
                type: 'put',
                data: {
                    '_token': document.contact._token.value,
                    'email': document.contact.email.value,
                    'qq': document.contact.qq.value
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

function fire () {
    $.ajax({
        url: form_used.action,
        type: 'delete',
        data: { '_token': csrf_token },
        success: function(data) {
            $(".layoff-cd-window").slideUp(500, function () {
                $(".overlay").hide();
            });
            $("body").css("overflow", "auto");
            if (form_used.name=="deleteCoach") {
                $("#my-coach-panel").children().remove();
                $("#my-coach-panel").append("\
                    <div class=\"none\">\
                        <p>你还没有教练，快去找一个教练吧～</p>\
                        <div class=\"my-cd-nav\">\
                            <a href=\"#\" class=\"to-find-cd\">查看</a>\
                        </div>\
                    </div>\
                ");
            } else if (form_used.name=="deleteDoctor") {
                $("#my-doctor-panel").children().remove();
                $("#my-doctor-panel").append("\
                    <div class=\"none\">\
                        <p>你还没有医生，快去找一个医生吧～</p>\
                        <div class=\"my-cd-nav\">\
                            <a href=\"#\" class=\"to-find-cd\">查看</a>\
                        </div>\
                    </div>\
                ");
            }
        },
        error: function(err) { alert("遇到了一点问题，不过没关系，忽略就好了嘛～"); }
    });
};

function addCoach() {
    $.post(
        form_used.action,
        {
            "_token": form_used._token.value,
            "coach_id": form_used.coach_id.value
        },
        function(data)
        {
            $("#coach-list-window").slideUp(500, function () {
                $(".overlay").hide();
            });
            $("body").css("overflow", "auto");
            $("#my-coach-panel").children().remove();
            $("#my-coach-panel").append("\
               <div class=\"normal\">\
                    <img src=\"/image/default_head.png\">\
                    <div class=\"intro\">\
                            <h3>" + eval(data).nickname + "</h3>\
                            <p>" + eval(data).description + "</p>\
                    </div>\
                    <div class=\"my-cd-nav\">\
                        <a href=\"#\" class=\"to-cd-chat\">会话</a>\
                        <a href=\"#\" class=\"cd-layoff\">解雇</a>\
                    </div>\
                </div>\
            ");
        },
        'json'
    ).error(
        function()
        {
            alert("遇到了一点问题，不过没关系，忽略就好了嘛～");
        }
    );
}

function addDoctor() {
    $.post(
        form_used.action,
        {
            "_token": form_used._token.value,
            "doctor_id": form_used.doctor_id.value
        },
        function(data)
        {
            $("#doctor-list-window").slideUp(500, function () {
                $(".overlay").hide();
            });
            $("body").css("overflow", "auto");
            $("#my-doctor-panel").children().remove();
            $("#my-doctor-panel").append("\
               <div class=\"normal\">\
                    <img src=\"/image/default_head.png\">\
                    <div class=\"intro\">\
                            <h3>" + eval(data).nickname + "</h3>\
                            <p>" + eval(data).description + "</p>\
                    </div>\
                    <div class=\"my-cd-nav\">\
                        <a href=\"#\" class=\"to-cd-chat\">会话</a>\
                        <a href=\"#\" class=\"cd-layoff\">解雇</a>\
                    </div>\
                </div>\
            ");
        },
        'json'
    ).error(
        function()
        {
            alert("遇到了一点问题，不过没关系，忽略就好了嘛～");
        }
    );
}

function getHistory() {
    $.get(
        "/individual/profile/chat",
        {
            'type': type
        },
        function(data)
        {
            $(".cd-chat-panel").children().remove();
            $("form#words").children("textarea").val('');
            var name = eval(data).name;
            var advices = eval(data).advices;
            $(".cd-chat-panel").append("\
                    <div class=\"chat-header\">\
                        <span class=\"name\">" + name + "</span>\
                    </div>\
                    <div class=\"chat-content\">\
                        <div class=\"chat-history\">\
                            <ul>\
                            </ul>\
                        </div>\
                        <div class=\"chat-input\">\
                            <nav>\
                                <a href=\"#\" class=\"fa fa-image\"></a>\
                                <a href=\"#\" class=\"fa fa-smile-o\"></a>\
                            </nav>\
                            <form action=\"/individual/profile/chat\" id=\"words\">\
                                <textarea id=\"chat-message\"></textarea>\
                            </form>\
                        </div>\
                    </div>\
                ")
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
}

$(function () {
    $(document).on('keydown', "form#words", function (event) {
        if(event.ctrlKey && event.keyCode == 13){
            $.post(
                $(this).prop('action'),
                {
                    "_token": csrf_token,
                    "type": type,
                    "content": $(this).children("textarea").val().replace("\n", "<br/>")
                },
                function(data)
                {
                    getHistory();
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

