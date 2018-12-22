<?php if ($has_orientation) { ?>
    <div id="mesagepopboxorientationpopoup" class="mesage-pop" >
        <div id="mesagecontent">
            <h4>
                <span id="orientation_popup_title"><?php echo $orientation['title']; ?></span>
                <div id="closeorientationypopoup" class="closealert">X</div>
            </h4>
            <div class="orientationpopoupbody" id="orientationpopoupbody">
                <?php echo $orientation['body']; ?>
                <a target="_blank" href="<?php echo $orientation['url']; ?>" style="text-decoration:none;">
                    <div class="Send white_green_button" style="margin: auto;width: 50%;float: initial">Click here</div>
                </a>
            </div>
        </div>
        <div class="mesage-pop-bg"></div>
    </div>
<?php } ?>
