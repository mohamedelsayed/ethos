<?php if (isset($disclaimer)) { ?>
    <div id="mesagepopboxadmissiondisclaimerpopoup" class="mesage-pop" >
        <div id="mesagecontent">
            <h4>
                <span id="disclaimer_popup_title"><?php echo $disclaimer['title']; ?></span>
                <div id="closedisclaimerypopoup" class="closealert gg-close"></div>
            </h4>
            <div class="disclaimerpopoupbody" id="disclaimerpopoupbody">
                <?php echo $disclaimer['body']; ?>
            </div>
        </div>
        <div class="mesage-pop-bg"></div>
    </div>
<?php } ?>