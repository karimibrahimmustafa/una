<?php if(is_array($a['bx_repeat:menu_items'])) for($i=0; $i<count($a['bx_repeat:menu_items']); $i++){ ?>
    <div id="bx-std-pmi-<?php echo $a['bx_repeat:menu_items'][$i]['name'];?>" class="bx-std-pmen-item bx-def-font-large <?php echo $a['bx_repeat:menu_items'][$i]['class_add'];?>">
        <a href="<?php echo $a['bx_repeat:menu_items'][$i]['link'];?>" target="<?php echo $a['bx_repeat:menu_items'][$i]['target'];?>" onclick="<?php echo $a['bx_repeat:menu_items'][$i]['onclick'];?>" title="<?php echo $a['bx_repeat:menu_items'][$i]['title_attr'];?>">
            <div class="bx-std-pmen-item-cnt">
                <?php if($a['bx_repeat:menu_items'][$i]['bx_if:icon']['condition']){ ?>
                    <div class="bx-std-pmen-item-bg"></div>
                    <i class="sys-icon <?php echo $a['bx_repeat:menu_items'][$i]['bx_if:icon']['content']['icon'];?> bx-def-margin-sec-right"></i>
                <?php } ?>
                <?php if($a['bx_repeat:menu_items'][$i]['bx_if:image']['condition']){ ?><img src="<?php echo $a['bx_repeat:menu_items'][$i]['bx_if:image']['content']['icon_url'];?>" /><?php } ?>
                <?php echo $a['bx_repeat:menu_items'][$i]['title'];?>
            </div>
        </a>                
    </div>                
<?php } else if(is_string($a['bx_repeat:menu_items'])) echo $a['bx_repeat:menu_items']; ?>
<div class="bx-clear"></div>