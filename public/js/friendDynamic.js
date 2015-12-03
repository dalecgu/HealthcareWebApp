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

