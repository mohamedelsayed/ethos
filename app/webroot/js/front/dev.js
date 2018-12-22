jQuery(function () {
    open_orientation_popup();
    jQuery("#mesagepopboxorientationpopoup").on("click", ".closealert", function () {
        close_orientation_popup();
    });
    jQuery('.mesage-pop-bg').click(function () {
        close_orientation_popup();
    });
});
function open_orientation_popup() {
    if (jQuery("#mesagepopboxorientationpopoup").length) {
        jQuery("#mesagepopboxorientationpopoup").show();
    }
}
function close_orientation_popup() {
    if (jQuery("#mesagepopboxorientationpopoup").length) {
        jQuery("#mesagepopboxorientationpopoup").hide();
    }
}