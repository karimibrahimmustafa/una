<script defer type="text/javascript">
<!--    
    glTour = new Shepherd.Tour({
        defaults: {
            classes: 'shepherd-theme-<?php echo $a['tour_theme'];?> bx-def-z-index-modal',
            showCancelLink: true,
            scrollTo: true
        }
    });

    Shepherd.on('cancel', function () {
        $.cookie('homepage-tour-hidden', 1, {expires: 9999});
    });

    glTour.addStep('tour-homepage', {
        title: 'This is the Homepage',
        text: 'At first there isn&apos;t much here. Install more Apps via Studio, add more blocks via Studio > Pages > Homepage, create profiles, appoint admins, post some content and your site will come alive!',
        buttons: [{
            text: 'Exit',
            action: glTour.cancel,
            classes: 'shepherd-button-secondary'
        },{
            text: 'Next',
            action: glTour.next,
            classes: 'shepherd-button-primary'
        }]
    });

    glTour.addStep('tour-account-menu', {
        title: 'Get to know your Account Menu',
        text: 'Add and manage profiles, check notifications, access account settings. Admins and Moderators can use it to access Dash with links to site content and profiles management.',
        attachTo: '#bx-menu-toolbar-item-account bottom',
        buttons: [{
            text: 'Done',
            action: glTour.cancel,
            classes: 'shepherd-button-primary'
        }]
    });

    if (!$.cookie('homepage-tour-hidden'))
        glTour.start();
-->
</script>