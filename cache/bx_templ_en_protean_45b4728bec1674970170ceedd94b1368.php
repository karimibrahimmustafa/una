<ul id="bx-menu-footer" class="bx-menu-hor bx-menu-object-<?php echo $a['object'];?> bx-clearfix">
    <?php if(is_array($a['bx_repeat:menu_items'])) for($i=0; $i<count($a['bx_repeat:menu_items']); $i++){ ?>
        <li class="bx-def-margin-right-auto <?php echo $a['bx_repeat:menu_items'][$i]['class_add'];?>">
            <a href="<?php echo $a['bx_repeat:menu_items'][$i]['link'];?>" target="<?php echo $a['bx_repeat:menu_items'][$i]['target'];?>" onclick="<?php echo $a['bx_repeat:menu_items'][$i]['onclick'];?>" title="<?php echo $a['bx_repeat:menu_items'][$i]['title_attr'];?>">
                <?php if($a['bx_repeat:menu_items'][$i]['bx_if:image']['condition']){ ?><img title="<?php echo $a['bx_repeat:menu_items'][$i]['bx_if:image']['content']['title_attr'];?>" src="<?php echo $a['bx_repeat:menu_items'][$i]['bx_if:image']['content']['icon_url'];?>" /><?php } ?>
                <?php if($a['bx_repeat:menu_items'][$i]['bx_if:icon']['condition']){ ?><i class="sys-icon <?php echo $a['bx_repeat:menu_items'][$i]['bx_if:icon']['content']['icon'];?>"></i><?php } ?>
                <?php if($a['bx_repeat:menu_items'][$i]['bx_if:title']['condition']){ ?><?php echo $a['bx_repeat:menu_items'][$i]['bx_if:title']['content']['title'];?><?php } ?>
            </a>
        </li>
    <?php } else if(is_string($a['bx_repeat:menu_items'])) echo $a['bx_repeat:menu_items']; ?>
</ul>