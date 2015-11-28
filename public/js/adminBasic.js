/**
 *
 * Created by lance on 11/17/15.
 */

$(function () {
    $(".cbp-tm-menu > li").bind("mouseover", function(){
        $(this).find(".cbp-tm-submenu").addClass("cbp-tm-show");
    }).bind("mouseout", function () {
        $(this).find(".cbp-tm-submenu").removeClass("cbp-tm-show");
    })

})
