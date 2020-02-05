<script defer type="text/javascript">
    var a = [{
            id: 'tour-welcome',
            title: 'Welcome to UNA Studio!',
            text: 'Studio is where you customise your site; add and manage apps; control languages and design; set membership levels and permissions; build pages and navigation, and a lot more. You are now in Studio Launcher.'
        },{
            id: 'tour-apps',
            title: 'Add and manage Apps',
            text: 'Apps are modules, languages, tools, templates - all the bits and pieces that make your site unique. You can download and install Apps and they will appear in Studio Launcher. Apps add and change functionality of your site.',
            sel: {element:$('.bx-std-widget-cont:has(.bx-std-widget-link[href*=store])').get(0), on:'bottom'}
        },{
            id: 'tour-designer',
            title: 'Start making your site special',
            text: 'Designer is the best place to start customisation. Change the site logo, choose design template and manage the “Cover Page”. Your site now shows Cover Page to all guest visitors. You can either customise it to turn it off to display a full homepage with content of your choice.',
            sel: {element:$('.bx-std-widget-cont:has(.bx-std-widget-link[href*=designer])').get(0), on:'bottom'}
        },{
            id: 'tour-dashboard',
            title: 'One look and you know it',
            text: 'Dashboard gives a quick overview of the site status. UNA version, space usage, hosting tools and cache.  Different Apps will add their blocks to Dashboard.',
            sel: {element:$('.bx-std-widget-cont:has(.bx-std-widget-link[href*=dashboard])').get(0), on:'bottom'}
        },{
            id: 'tour-builder_page',
            title: 'Build your site the way you want it',
            text: 'Pages allow you to edit the site by rearranging, adding and removing blocks on site pages. You can even create new custom pages of different types. You can also control visibility settings, SEO data, cacheing and page layouts.',
            sel: {element:$('.bx-std-widget-cont:has(.bx-std-widget-link[href*=builder_page])').get(0), on:'bottom'}
        },{
            id: 'tour-builder_permission',
            title: 'Define who can do what',
            text: 'Create and edit Membership Levels and associated Actions permissions.',
            sel: {element:$('.bx-std-widget-cont:has(.bx-std-widget-link[href*=builder_permission])').get(0), on:'bottom'}
        },{
            id: 'tour-builder_forms',
            title: 'Form and re-form your forms',
            text: 'Forms builder is a powerful tool that allows deep customisation of site database and forms. You can create and manage data lists, form fields and even display types (like Add/Edit/Delete). Your Forms will define the structure and theme of the site.',
            sel: {element:$('.bx-std-widget-cont:has(.bx-std-widget-link[href*=builder_forms])').get(0), on:'bottom'}
        },{
            id: 'tour-builder_menu',
            title: 'Show them around',
            text: 'Add and manage site navigation menus. You can edit links, re-order them, add new ones, change icons and control visibility according to membership permissions.',
            sel: {element:$('.bx-std-widget-cont:has(.bx-std-widget-link[href*=builder_menu])').get(0), on:'bottom'}
        },{
            id: 'tour-polyglot',
            title: 'Speak their language',
            text: '&quot;If you talk to a man in a language he understands, that goes to his head. If you talk to him in his language, that goes to his heart.&quot; Polyglot allows you to set site language and data format, edit site texts in all installed languages and even translate email templates.',
            sel: {element:$('.bx-std-widget-cont:has(.bx-std-widget-link[href*=polyglot])').get(0), on:'bottom'}
        },{
            id: 'tour-bx_accounts',
            title: 'You are more than Admin',
            text: 'UNA content and profiles are controlled by Admins and Moderators right on the site front-end, so you don’t have to worry about that in Studio. You do need to appoint your Admins and Moderators, though. And this is where you do it. If you also want to be the site Admin, just create your profile use “Set Membership” to upgrade it.',
            sel: {element:$('.bx-std-widget-cont:has(.bx-std-widget-link[href*=bx_accounts])').get(0), on:'bottom'}
        },{
            id: 'tour-reorganize',
            title: 'Move the Apps around',
            text: 'Activate reorganisation mode to rearrange Apps in Launcher or delete inactive ones altogether.',
            sel: '.bx-menu-tab-edit right'
        },{
            id: 'tour-favourites',
            title: 'Choose wisely',
            text: 'Your Studio may have hundreds of installed Apps. Choose the ones you access most often and use the Star to bring them up.',
            sel: '.bx-menu-tab-favorite right'
        },{
            id: 'tour-add-apps',
            title: 'Now DO add new Apps!',
            text: 'UNA comes with only a handful of core Apps. Choose, download and install Apps to add profiles types, modules, system tools, plugins, languages and design templates. You can activate and deactivate installed Apps. UNA is super-modular and incredibly flexible, letting you choose your own combination of functionality, settings and database structure to make the social site of your dreams real. Even without changing anything you will have the perfectly functioning social site!',
            sel: '.bx-menu-tab-extensions right'
        }
    ];

    glTour = new Shepherd.Tour({
        defaults: {
            classes: 'shepherd-theme-<?php echo $a['tour_theme'];?> bx-def-z-index-modal',
            showCancelLink: true,
            scrollTo: true
        }
    });

    Shepherd.on('cancel', function () {
        $.cookie('launcher-tour-hidden', 1, {expires: 9999});
    });

    for (var i=0 ; i<a.length ; i++) {

        if ('undefined' !== typeof(a[i].sel) && 'string' !== typeof(a[i].sel) && null == a[i].sel.element)
            continue;

        var aBtns = []
        if (0 == i || i == (a.length - 1))
            aBtns.push({
                text: 0 == i ? 'Exit' : 'Done',
                action: glTour.cancel,
                classes: 0 == i ? 'shepherd-button-secondary' : 'shepherd-button-primary'
            });

        if (i != (a.length - 1))
            aBtns.push({
                text: 'Next',
                action: glTour.next,
                classes: 'shepherd-button-primary'
            });

        var aOpts = {
            title: a[i].title,
            text: a[i].text,
            attachTo: a[i].sel,
            buttons: aBtns
        };
        glTour.addStep(a[i].id, aOpts);
    }

    if (!$.cookie('launcher-tour-hidden'))
        glTour.start();
</script>