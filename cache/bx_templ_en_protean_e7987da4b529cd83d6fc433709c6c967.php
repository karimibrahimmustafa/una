<script>
(function(w, d){
    var id='embedly-platform', n = 'script';
    if (!d.getElementById(id)){
        w.embedly = w.embedly || function() {(w.embedly.q = w.embedly.q || []).push(arguments);};
        var e = d.createElement(n); e.id = id; e.async=1;
        e.src = ('https:' === document.location.protocol ? 'https' : 'http') + '://cdn.embedly.com/widgets/platform.js';
        var s = d.getElementsByTagName(n)[0];
        s.parentNode.insertBefore(e, s);
    }
})(window, document);
<?php if($a['bx_if:key']['condition']){ ?>
$(document).ready(function () {
    embedly("defaults", {
        cards: {key: '<?php echo $a['bx_if:key']['content']['key'];?>'}
    });
    embedly('on', 'card.resize', function(iframe){
        var $card = $(iframe);
        var $card_parent = $card.parents('.fr-embedly');
        $card_parent.css('height', $card.height());
    });
});
<?php } ?>
function bx_embed_link(e)
{
    embedly('card', e);
}
</script>