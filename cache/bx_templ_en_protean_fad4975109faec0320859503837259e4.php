<script type="text/javascript" language="javascript">
    var sUrlRoot = 'http://localhost/una2/';

    $(document).ready(function () {
        bx_time('<?php echo $this->parseSystemKey('lang_country', $mixedKeyWrapperHtml);?>');
    });

    (function(w) {
        var dpr = (w.devicePixelRatio === undefined ? 1 : Math.round(w.devicePixelRatio));
        if ($.cookie('devicePixelRatio') == dpr || dpr < 2)
            return;
        $.cookie('devicePixelRatio', dpr, {expires: 365, path: '/'});
        window.location.reload();
    })(window);

    var oMediaPhone = window.matchMedia('(max-width:720px)');
    var oMediaPhone2 = window.matchMedia('(min-width:533px) and (max-width:720px)');
    var oMediaTablet = window.matchMedia('(min-width:720px) and (max-width:<?php echo $this->parseSystemKey('page_width', $mixedKeyWrapperHtml);?>)');
    var oMediaTablet2 = window.matchMedia('(min-width:533px) and (max-width:<?php echo $this->parseSystemKey('page_width', $mixedKeyWrapperHtml);?>)');
    var oMediaDesktop = window.matchMedia('(min-width:<?php echo $this->parseSystemKey('page_width', $mixedKeyWrapperHtml);?>)');

    function fMediaCallback(e) {
        if (oMediaPhone.matches)
            $('html').addClass('bx-media-phone');
        else
            $('html').removeClass('bx-media-phone');
        
        if (oMediaPhone2.matches)
            $('html').addClass('bx-media-phone2');
        else
            $('html').removeClass('bx-media-phone2');
        
        if (oMediaTablet.matches)
            $('html').addClass('bx-media-tablet');
        else
            $('html').removeClass('bx-media-tablet');
        
        if (oMediaTablet2.matches)
            $('html').addClass('bx-media-tablet2');
        else
            $('html').removeClass('bx-media-tablet2');

        if (oMediaDesktop.matches)
            $('html').addClass('bx-media-desktop');
        else
            $('html').removeClass('bx-media-desktop');
    }

    oMediaPhone.addListener(fMediaCallback);
    oMediaPhone2.addListener(fMediaCallback);
    oMediaTablet.addListener(fMediaCallback);
    oMediaTablet2.addListener(fMediaCallback);
    oMediaDesktop.addListener(fMediaCallback);

    fMediaCallback(null);

</script>