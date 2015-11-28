/**
 *
 * Created by lance on 10/19/15.
 */

$(function () {
    $(".container header .nav").click(function () {
        var $sideNav = $(".side-nav");
        if ($sideNav.is(":visible")) {
            $sideNav.animate({"left": "-15em"}, 500, function () {
                $(this).css("display", "none");
            });
        } else {
            $sideNav.css("display", "block");
            $sideNav.animate({"left": "0"}, 500);
        }
        return false;
    });

    $(".container header .fa-users").click(function () {
        var socialConnection = $(".social-connection");
        if (socialConnection.is(":visible")) {
            socialConnection.animate({"right": "-15em"}, 500, function () {
                $(this).css("display", "none");
            });
        } else {
            socialConnection.css("display", "block");
            socialConnection.animate({"right": "0"}, 500);
        }
        return false;
    });
});

//  发说说的框
$(function () {
    var $imgUploader = $(".release #img-upload");
    var $imgPreview = $(".release .img-preview");
    $imgUploader.bind("change", function () {
        var file = this.files[0];
        if (file) {
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function (e) {
                var urlData = this.result;
                var $new_item = $("<div class='img-preview-item'><a href='#' class='fa fa-close'></a></div>");
                var $new_item_image = $("<img src='" + urlData + "' alt=''>");
                $imgPreview.append($new_item.append($new_item_image));
                if (!$imgPreview.is(":visible")) {
                    $imgPreview.slideDown("normal");
                }
                if ($new_item_image.width > $new_item_image.height) {
                    $new_item_image.width($new_item.width());
                } else {
                    $new_item_image.height($new_item.height());
                }
                $new_item.find("a.fa").click(function () {
                    $new_item.remove();
                    if ($imgPreview.children().length == 0) {
                        $imgPreview.slideUp("normal");
                    }
                    return false;
                });
            }
        }
    });

    $(".social-connection > nav > a").click(function () {
        $(this).siblings("a").removeClass("chosen");
        $(this).addClass("chosen");
        var target = $(this).attr("href");
        $(target).siblings("div").css("z-index", "1");
        $(target).css("z-index", "2");
        return false;
    });
});