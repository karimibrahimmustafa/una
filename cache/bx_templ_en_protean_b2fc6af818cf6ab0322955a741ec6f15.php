<ul id="bx-menu-main-submenu" class="bx-menu-main-submenu bx-menu-object-<?php echo $a['object'];?> bx-clearfix">
    <?php if(is_array($a['bx_repeat:menu_items'])) for($i=0; $i<count($a['bx_repeat:menu_items']); $i++){ ?>
        <li class="bx-def-padding-sec-right bx-def-padding-sec-left bx-def-color-bg-hl-hover <?php echo $a['bx_repeat:menu_items'][$i]['class_add'];?>"><a href="<?php echo $a['bx_repeat:menu_items'][$i]['link'];?>" target="<?php echo $a['bx_repeat:menu_items'][$i]['target'];?>" onclick="<?php echo $a['bx_repeat:menu_items'][$i]['onclick'];?>"><?php echo $a['bx_repeat:menu_items'][$i]['title'];?></a></li>
    <?php } else if(is_string($a['bx_repeat:menu_items'])) echo $a['bx_repeat:menu_items']; ?>
</ul>