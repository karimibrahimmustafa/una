<!DOCTYPE html>
<html lang="<?php echo $this->parseSystemKey('lang', $mixedKeyWrapperHtml);?>">
<head>
    <?php echo $this->processInjection($this->aPage['name_index'], 'injection_head_begin'); ?>
    
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->parseSystemKey('page_charset', $mixedKeyWrapperHtml);?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
    <title><?php echo $this->parseSystemKey('page_header', $mixedKeyWrapperHtml);?></title>
    <base href="http://localhost/una2/" />

    <meta http-equiv="refresh" content="1;URL=<?php echo $a['url_relocate'];?>" />

    <bx_include_css_system />
    <bx_include_css />

    <bx_include_js_system />
    <bx_include_js />
    <?php echo $this->parseSystemKey('extra_js', $mixedKeyWrapperHtml);?>

    <?php echo $this->parseSystemKey('dol_images', $mixedKeyWrapperHtml);?>

    <?php echo $this->processInjection($this->aPage['name_index'], 'injection_head'); ?>
</head>
<body class="bx-def-font bx-def-color-bg-page" dir="<?php echo $this->parseSystemKey('lang_direction', $mixedKeyWrapperHtml);?>" <?php echo $this->processInjection($this->aPage['name_index'], 'injection_body'); ?> >

    <?php echo $a['page_main_code'];?>

</body>
</html>