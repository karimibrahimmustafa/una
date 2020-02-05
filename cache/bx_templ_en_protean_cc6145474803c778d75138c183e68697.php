<?php if(is_array($a['bx_repeat:row'])) for($i=0; $i<count($a['bx_repeat:row']); $i++){ ?>
    <hr class="bx-def-hr" />
    <div class="sys-profile-switch-row bx-def-padding-leftright bx-def-padding-sec-topbottom">
        <div class="sys-profile-switch-row-unit"><?php echo $a['bx_repeat:row'][$i]['unit'];?></div>
        <div class="sys-profile-switch-row-control">
            <?php if($a['bx_repeat:row'][$i]['bx_if:inactive']['condition']){ ?>
                <a class="bx-btn bx-btn-small" href="<?php echo $a['bx_repeat:row'][$i]['bx_if:inactive']['content']['url_switch'];?>"><?php echo $a['bx_repeat:row'][$i]['bx_if:inactive']['content']['button_title'];?></i></a>
            <?php } ?>
        </div>
    </div>
<?php } else if(is_string($a['bx_repeat:row'])) echo $a['bx_repeat:row']; ?>