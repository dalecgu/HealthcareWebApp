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

    $("#my-coach-panel .to-cd-chat").click(function () {
        $(".center.column > div").hide();
        $(".center.column .personal-cd").show();
        $("body").scrollTop(0);
        return false;
    });

    $("#my-doctor-panel .to-cd-chat").click(function () {
        $(".center.column > div").hide();
        $(".center.column .personal-cd").show();
        $("body").scrollTop(0);
        return false;
    });
});

$(function () {
    $(".personal-cd-intro #my-coach-panel .cd-layoff").click(function (event) {
        form_used = document.deleteCoach;
        var $window = $(".layoff-cd-window");
        $(".overlay").show();
        $window.css("top", $("body").scrollTop() + "px");
        $window.slideDown(500);
        $("body").css("overflow", "hidden");
        event.stopPropagation();
        return false;
    });

    $(".personal-cd-intro #my-doctor-panel .cd-layoff").click(function (event) {
        form_used = document.deleteDoctor;
        var $window = $(".layoff-cd-window");
        $(".overlay").show();
        $window.css("top", $("body").scrollTop() + "px");
        $window.slideDown(500);
        $("body").css("overflow", "hidden");
        event.stopPropagation();
        return false;
    });

    $(".layoff-cd-window .cancel").click(function () {
        $(".layoff-cd-window").slideUp(500, function () {
            $(".overlay").hide();
        });
        $("body").css("overflow", "auto");
        return false;
    });
});

$(function () {
    $("#my-coach-panel .to-find-cd").click(function (event) {
        var $window = $("#coach-list-window");
        $(".overlay").show();
        $window.css("top", ($("body").scrollTop + 100) + "px");
        $window.slideDown(500);
        $("body").css("overflow", "hidden");
        event.stopPropagation();
        return false;
    });

    $("#my-doctor-panel .to-find-cd").click(function (event) {
        var $window = $("#doctor-list-window");
        $(".overlay").show();
        $window.css("top", ($("body").scrollTop + 100) + "px");
        $window.slideDown(500);
        $("body").css("overflow", "hidden");
        event.stopPropagation();
        return false;
    });

    $(".cd-list-window .cancel").click(function () {
        $(this).parent().parent().parent().slideUp(500, function () {
            $(".overlay").hide();
        });
        $("body").css("overflow", "auto");
        return false;
    });

    $(".cd-info-panel .back").click(function () {
        $(this).parent().addClass("unvisible");
    });

    $(".cd-list-panel .cd-name").click(function(){
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
            document.basic.submit();

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
            document.basic.submit();

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
