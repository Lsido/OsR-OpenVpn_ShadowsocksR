// ------------------------------
// Browser Detection Plugin
// https://github.com/gabceb/jquery-browser-plugin/
// ------------------------------
!function(a,b){"use strict";var c,d;if(a.uaMatch=function(a){a=a.toLowerCase();var b=/(opr)[\/]([\w.]+)/.exec(a)||/(chrome)[ \/]([\w.]+)/.exec(a)||/(version)[ \/]([\w.]+).*(safari)[ \/]([\w.]+)/.exec(a)||/(webkit)[ \/]([\w.]+)/.exec(a)||/(opera)(?:.*version|)[ \/]([\w.]+)/.exec(a)||/(msie) ([\w.]+)/.exec(a)||a.indexOf("trident")>=0&&/(rv)(?::| )([\w.]+)/.exec(a)||a.indexOf("compatible")<0&&/(mozilla)(?:.*? rv:([\w.]+)|)/.exec(a)||[],c=/(ipad)/.exec(a)||/(iphone)/.exec(a)||/(android)/.exec(a)||/(windows phone)/.exec(a)||/(win)/.exec(a)||/(mac)/.exec(a)||/(linux)/.exec(a)||/(cros)/i.exec(a)||[];return{browser:b[3]||b[1]||"",version:b[2]||"0",platform:c[0]||""}},c=a.uaMatch(b.navigator.userAgent),d={},c.browser&&(d[c.browser]=!0,d.version=c.version,d.versionNumber=parseInt(c.version)),c.platform&&(d[c.platform]=!0),(d.android||d.ipad||d.iphone||d["windows phone"])&&(d.mobile=!0),(d.cros||d.mac||d.linux||d.win)&&(d.desktop=!0),(d.chrome||d.opr||d.safari)&&(d.webkit=!0),d.rv){var e="msie";c.browser=e,d[e]=!0}if(d.opr){var f="opera";c.browser=f,d[f]=!0}if(d.safari&&d.android){var g="android";c.browser=g,d[g]=!0}d.name=c.browser,d.platform=c.platform,a.browser=d}(jQuery,window);


// ------------------------------
// Variables
// ------------------------------

// AutoCollapse
// Doesn't matter how many items you many have in the header, it stays responsive :3
// Just hardcode the height of the header
var headerHeight = 50; // Also have the same height in @navbar-height in variables.less

var vFSLayout; //for Stretch Sidebars

// ------------------------------
// =UTILITY BELT
// Psst: Search for '=u' to come straight here. You're welcome.
// ------------------------------
var Utility = {
    str_replace: function(c, d, b) {
        var a = c.split(d);
        return a.join(b);
    },
    str_exists: function(b, c) {
        var a = b.split(c);
        if (a[0] === b) {
            return false;
        } else {
            return true;
        }
    },
    toggle_fullscreen: function(elem) {
        // can fullscreen any element
        if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
            if (elem.requestFullScreen) {
                elem.requestFullScreen();
            } else if (elem.mozRequestFullScreen) {
                elem.mozRequestFullScreen();
            } else if (elem.webkitRequestFullScreen) {
                elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
            } else if (elem.msRequestFullscreen) {
                elem.msRequestFullscreen();
            }
        } else {
            if (document.cancelFullScreen) {
                document.cancelFullScreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            }
        }
    },
    getViewPort: function() {
        var e = window, a = 'inner';
        if (!('innerWidth' in window)) {
            a = 'client';
            e = document.documentElement || document.body;
        }
        return {
            width: e[a + 'Width'],
            height: e[a + 'Height']
        };
    },
    getSidebarViewportHeight: function () {
        var h;
        if ($('body').hasClass('infobar-offcanvas')) {
          h = $(window).height();
        } else {
            h = $(window).height() - headerHeight;
        }
        return h;
    },
    sidebar_resizing: function() {
        if ($('#topnav').hasClass('navbar-fixed-top')) {
            $('.static-sidebar').css('top', headerHeight + 'px');
        } else {
            var scr = $('body').scrollTop();

            $('.static-sidebar').css('top', '0px');


            if (scr < headerHeight) {
                $('.static-sidebar').css('top',(headerHeight - scr) + 'px');
            } else {
                $('.static-sidebar').css('top','0px');
            }
        }

        enquire.register("screen and (max-width: 767px)", {
            match : function() {
                //small
                if (!($('body').hasClass('sidebar-scroll'))) { //if not already added
                    $('.static-sidebar').addClass('scroll-pane');
                    $('.static-sidebar > .sidebar').addClass('scroll-content');
                }
                Utility.initScroller();
            },
            unmatch : function() {
                //big
                if (!($('body').hasClass('sidebar-scroll'))) { //if not already added
                    $('.static-sidebar').removeClass('scroll-pane has-scrollbar');
                    $('.static-sidebar > .sidebar').removeClass('scroll-content').css('margin-right','');
                }
                Utility.initScroller();
            }
        });
    },
    // resizePageHeight: function() {
    //     var v = Utility.getViewPort().height;
    //     var f = $('footer').height();
    //     var h = 0;


    //    if ($('#layout-fixed').hasClass('ui-layout-container')) {
    //        // var f = $('footer').height();
    //        // $('.fixed-content-wrapper').height( $('.ui-layout-center').height() - f + 20 );

    //    } else {
    //         var c = $("#wrapper").height();

    //         if ($('#topnav').hasClass('navbar-fixed-top')) {
    //            h = headerHeight;
    //         }

    //         if (c > v) {
    //             $("#wrapper").height(c-h+f-20);
    //         }
    //    }
    // },
    getBrandColor: function (name) {
        // Store Brand colors in JS so it can be called from plugins
        var brandColors = {
            'default':      '#ecf0f1',
            'gray':         '#aaa',

            'inverse':      '#95a5a6',
            'primary':      '#3498db',
            'success':      '#2ecc71',
            'warning':      '#f1c40f',
            'danger':       '#e74c3c',
            'info':         '#1abcaf',

            'brown':        '#c0392b',
            'indigo':       '#9b59b6',
            'orange':       '#e67e22',
            'midnightblue': '#34495e',
            'sky':          '#82c4e6',
            'magenta':      '#e73c68',
            'purple':       '#e044ab',
            'green':        '#16a085',
            'grape':        '#7a869c',
            'toyo':         '#556b8d',
            'alizarin':     '#e74c3c'
        };

        if (brandColors[name]) {
            return brandColors[name];
        } else {
            return brandColors['default'];
        }
    },
    toggle_leftbar: function() {
        var menuCollapsed = localStorage.getItem('collapsed_menu');

        try {
            vFSLayout.toggle('west');
        } catch (e) {
            $('body').toggleClass('sidebar-collapsed');
        }

        if (menuCollapsed == "true")
            localStorage.setItem('collapsed_menu', "false");
        else if (menuCollapsed == "false")
            localStorage.setItem('collapsed_menu', "true");

        setTimeout(function(){                  // wait 500ms before calling resize
            $(window).trigger('resize');        // so toggle happens faster instead of
        }, 500);                                // sticking out
    },
    toggle_rightbar: function() {
        try {
            vFSLayout.toggle('east');
        } catch (e) {
            if ($('body').hasClass('infobar-overlay')) {
                $('.infobar-wrapper').css('transform','');
            }

            $('body').toggleClass('infobar-active');

            //in layout-boxed pages, toggle visibility instead of animation
            if ($('body').hasClass('layout-boxed')) {
                Utility.rightbarRightPos();
            }
            Utility.rightbarTopPos();
        }
    },
    rightbarTopPos: function() {
    var scr = $('body').scrollTop();

        if ($('body').hasClass('infobar-overlay')) {
            if ($('body>header, body.horizontal-nav>#wrapper>header').hasClass('navbar-fixed-top')) {
                if ($('body.infobar-overlay').hasClass('infobar-active')) {
                    $('.infobar-wrapper').css('transform','translate(0, 48px)');
                }
            } else {
                if ($('body.infobar-overlay').hasClass('infobar-active')) {
                    if (scr < headerHeight) {
                        $('.infobar-wrapper').css('transform','translate(0, '+ (48 - scr)+ 'px)');
                    } else {
                        $('.infobar-wrapper').css('transform','translate(0, 0)');
                    }
                }
            }
        }
    },
    // -------------------------------
    // Rightbar Right Position (in layout-boxed)
    // -------------------------------
    rightbarRightPos: function() {
        //Set Right position for fixed layouts
        $('.infobar-wrapper').css('right','0').hide();

        if ($('body').hasClass('layout-boxed')) {
            var $pc = $('#wrapper');
            var ending_right = ($(window).width() - ($pc.offset().left + $pc.outerWidth()));
            if (ending_right<0) ending_right=0;
            $('.infobar-active.infobar-overlay .infobar-wrapper').css('right',ending_right);

            $('.infobar-wrapper').show();
        }
    },
    // -------------------------------
    // Auto Collapse Large Menu
    // -------------------------------
    autocollapse: function() {
        var navbar = $('header.navbar');
        var menu = $('header.navbar .navbar-collapse');

        $('body').removeClass('topnav-collapsed');
        $('#topnav .navbar-left').addClass('in');
        $('#navbar-links-toggle').parent('li').hide();
        $(menu).insertAfter('header.navbar a.navbar-brand');


        if((navbar.innerHeight() > headerHeight) || ($(window).innerWidth()<786)) { // check if we've got 2 lines Or less than 786px

            $('body').addClass('topnav-collapsed');
            $('#topnav .navbar-left').removeClass('in');
            $('#navbar-links-toggle').parent('li').show();

            navbar.append(menu.detach());
        }
    },

    initScroller: function() {
        $(".scroll-pane").nanoScroller({ paneClass: 'scroll-track',  sliderClass: 'scroll-thumb', contentClass: 'scroll-content' });
    }

};
// ------------------------------
// =/U
// ------------------------------


// ------------------------------
// =PLUGINS. custom made shizzle, yo!
// ------------------------------
(function($) {

    // ------------------------------
    // ScrollSidebar
    // ------------------------------
    $.scrollSidebar = function(element, options) {
        var defaults = {};
        var plugin = this;

        plugin.settings = {};
        var $element = $(element),
            element = element;

    }
    $.fn.scrollSidebar = function(options) {
        return this.each(function() {
            if (undefined == $(this).data('scrollSidebar')) {
                var plugin = new $.scrollSidebar(this, options);
                $(this).data('scrollSidebar', plugin);
            };
        });
    };

    // ------------------------------
    // page-tabs
    // ------------------------------
    $.pagetabs = function(element, options) {
        var defaults = {};
        var plugin = this;

        plugin.settings = {};
        var $element = $(element),
            element = element;

        var istraped = false;
        plugin.init = function() {
              $.each ($('ul.nav-tabs a'), function() {
                  if($(this).closest('li').hasClass('tabdrop') && !$(this).closest('li').hasClass('hide'))
                    istraped = true;
                  if( (this.href.indexOf("mod=") > -1 && window.location.href.indexOf(this.href) > -1) || this.href == (window.location+'&msg').split('&msg')[0] ) {
                      $(this).closest('li').addClass('active');
                      istraped && $(this).closest('li').insertBefore("ul.nav-tabs li:eq(0)");
                      return false;
                  };
              });
        };
        plugin.init();
    }
    $.fn.pagetabs = function(options) {
        return this.each(function() {
            if (undefined == $(this).data('pagetabs')) {
                var plugin = new $.pagetabs(this, options);
                $(this).data('pagetabs', plugin);
            };
        });
    };


    // ------------------------------
    // Sidebar Accordion Menu
    // ------------------------------
    $.sidebarAccordion = function(element, options) {
        var defaults = {};
        var plugin = this;

        plugin.settings = {};
        var $element = $(element),
            element = element;

        plugin.init = function() {
            plugin.settings = $.extend({}, defaults, options);

            var menuCollapsed = localStorage.getItem('collapsed_menu');
            if (menuCollapsed === null) {
                localStorage.setItem('collapsed_menu', "false");
            }
            if (menuCollapsed === "true") {
                $('body').addClass('sidebar-collapsed');
            }

            $('body').on('click', 'ul.acc-menu a', function() {
                var LIs = $(this).closest('ul.acc-menu').children('li');
                $(this).closest('li').addClass('clicked');
                $.each( LIs, function(i) {
                    if( $(LIs[i]).hasClass('clicked') ) {
                        $(LIs[i]).removeClass('clicked');
                        return true;
                    }
                    $(LIs[i]).find('ul.acc-menu:visible').slideToggle();
                    $(LIs[i]).removeClass('open');
                });

                if (!$('body').hasClass('sidebar-collapsed') || $(this).parents('ul.acc-menu').length > 1) {
                    if($(this).siblings('ul.acc-menu:visible').length>0)
                        $(this).closest('li').removeClass('open');
                    else
                        $(this).closest('li').addClass('open');
                        $(this).siblings('ul.acc-menu').slideToggle({
                            duration: 200
                        });
                }
            });

            var targetAnchor;
            $.each ($('ul.acc-menu a'), function() {
                if( (this.href.indexOf("mod=") > -1 && window.location.href.indexOf(this.href) > -1) || this.href == (window.location+'&msg').split('&msg')[0] ) {
                    targetAnchor = this;
                    return false;
                };
            });

            var parent = $(targetAnchor).closest('li');
            while(true) {
                parent.addClass('active');
                parent.closest('ul.acc-menu').show().closest('li').addClass('open');
                parent = $(parent).parents('li').eq(0);
                if( $(parent).parents('ul.acc-menu').length <= 0 ) break;
            };

            var liHasUlChild = $('li').filter(function(){
                return $(this).find('ul.acc-menu').length;
            });
            $(liHasUlChild).addClass('hasChild');

        };
        plugin.init();
    }
    $.fn.sidebarAccordion = function(options) {
        return this.each(function() {
            if (undefined === $(this).data('sidebarAccordion')) {
                var plugin = new $.sidebarAccordion(this, options);
                $(this).data('sidebarAccordion', plugin);
            }
        });
    }


    // ------------------------------
    // Full Height Panel
    // ------------------------------
    $.fullHeightPanel = function(element, options) {
        var defaults = {};
        var plugin = this;
        plugin.settings = {};
        var $element = $(element),
            element = element;

        plugin.init = function() {
            plugin.settings = $.extend({}, defaults, options);

            try {
                fullHeightResizer();
            } catch(e) {
                // Do nothing
            }
        }

        var fullHeightResizer = function() {
            var t = Utility.getViewPort().height - $('.full-height-content').offset().top;
            var f = ($('footer').height() + parseInt($('.static-content').css('margin-bottom').replace('px', '')));

            if ($('.full-height-content.panel-body').size() === 1) {
                $('.full-height-content').height(t-f-41); //if full-height-panel
            } else {
                $('.full-height-content').height(t-f+10); //if full-height-body
            }
        }

        plugin.init();
    }
    $.fn.fullHeightPanel = function(options) {

        return this.each(function() {
            if (undefined == $(this).data('fullHeightPanel')) {
                var plugin = new $.fullHeightPanel(this, options);
                $(this).data('fullHeightPanel', plugin);
            }
        });
    }
})(jQuery);
// ------------------------------
// =/P
// ------------------------------


// ------------------------------
// =DOM Ready
// ------------------------------
$(document).ready(function () {

    // Add These To support nanoScroller
    if ($('body').hasClass('sidebar-scroll')) {
        $('.static-sidebar').addClass('scroll-pane');
        $('.sidebar').addClass('scroll-content');
    }


    // Scrollbar and reinitting scrollbars
    Utility.initScroller();
    $('.toolbar').on('shown.bs.dropdown', function () {Utility.initScroller();});
    $('.widget').on('shown.bs.collapse', function () {Utility.initScroller();});
    $('.widget').on('hidden.bs.collapse', function () {Utility.initScroller();});



    Utility.sidebar_resizing();

    // ------------------------------
    // Sidebar Accordion
    // ------------------------------
    $('body').sidebarAccordion();


    // ------------------------------
    // Full Height Panel
    // ------------------------------
    if ($('.full-height-content')) {
        $('body').fullHeightPanel();
    }

    // ------------------------------
    // Fixed Sidebar Layout
    // ------------------------------

    try {
        vFSLayout = $('#layout-fixed').layout({
            togglerLength_open:0, // hide toggle button
            west__minSize : 248,  // sidebar
            east__minSize : 248,   // infobar

            center__onresize:           Utility.initScroller,
            west__onresize:             Utility.initScroller,
            east__onresize:             Utility.initScroller
        });

        // Closes and opens left and rightbar in small or big screens
        enquire.register("screen and (max-width: 767px)", {
            match : function() {
                //small
                vFSLayout.close('west');
                vFSLayout.close('east');
            },
            unmatch : function() {
                //big
                vFSLayout.open('west');
                vFSLayout.open('east');
            },
            deferSetup : true
        });
    } catch(e) {
        // Code above is only executed in a page with #layout-fixed.
        // Requires js/jquery.layout.min.js to be loaded.
        // For more info, refer to documentation
    }

    // ------------------------------
    // Toggling Sidebars
    // ------------------------------
    $('#trigger-sidebar>a').click(function () {
        Utility.toggle_leftbar();
    });

    $('#trigger-fullscreen').click(function () {
        Utility.toggle_fullscreen(document.documentElement);
    });

    $('#trigger-infobar>a').click(function () {
        Utility.toggle_rightbar();
    });

    // ------------------------------
    // Megamenu
    // This code will prevent unexpected menu close
    // when using some components (like accordion, forms, etc)
    // ------------------------------
    $('body').on('click', '.yamm .dropdown-menu, .dropdown-menu-form', function(e) {
      e.stopPropagation()
    })

    // -------------------------------
    // For tabs inside dropdowns
    // -------------------------------
    $('.dropdown-menu a[data-toggle="tab"]').click(function (e) {
        e.stopPropagation();
        $(this).tab('show');
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
        $(this).closest('.dropdown').removeClass('active');
    });

    // -------------------------------
    // Back to Top button
    // -------------------------------
    $('#back-to-top').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });

    // -------------------------------
    // Panel Collapses
    // -------------------------------
    $('a.panel-collapse').click(function() {
        $(this).children().toggleClass("fa-chevron-down fa-chevron-up");
        $(this).closest(".panel-heading").next().slideToggle({duration: 200});
        $(this).closest(".panel-heading").toggleClass('rounded-bottom');
        return false;
    });

    // -------------------------------
    // Quick Start
    // -------------------------------
    $('#headerbardropdown').click(function() {
        $('#headerbar').css('top',0);
        return false;
    });

    $('#headerbardropdown').click(function(event) {
      $('html').one('click',function() {
        $('#headerbar').css('top','-1000px');
      });

      event.stopPropagation();
    });

    // -------------------------------
    // Project Switcher
    // -------------------------------

    // ADD SLIDEDOWN ANIMATION TO DROPDOWN //
    $('.project-switcher').on('show.bs.dropdown', function(e){
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown(200);
    });

    // ADD SLIDEUP ANIMATION TO DROPDOWN //
    $('.project-switcher').on('hide.bs.dropdown', function(e){
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp(200);
    });


    // -------------------------------
    // FireFox Shim
    // FireFox is the *only* browser that doesn't support position:relative for
    // block elements with display set to table-cell, which is needed for the footer.
    // TODO: Replace $.browser with Modernizer.
    // -------------------------------
    if ($.browser.mozilla) {
        $('footer').css('width',$('footer').parent().width());

        $(window).on('resize', function() {
            $('footer').css('width',$('footer').parent().width());
        });
    }

    // ---------------------------------
    // Faux Off-cavas effect on collapse
    // ---------------------------------
    if (!(vFSLayout)) {
        enquire.register("screen and (max-width: 767px)", {
            match : function() {  //smallscreen
                $('body').addClass('sidebar-collapsed');

                if ($('body').hasClass('sidebar-collapsed')) {
                    setWidthtoContent();
                }
                $(window).on('resize', setWidthtoContent);
            },
            unmatch : function() {  //bigscreen
                $('body').removeClass('sidebar-collapsed');

                $('.static-content').css('width','');
                $(window).off('resize', setWidthtoContent);
            }
        });
    }

    function setWidthtoContent() {
        var w = $('#wrapper').innerWidth();
        $('.static-content').css('width',(w)+'px');
    }

    // -------------------------------
    // Search on Top
    // -------------------------------
    $('.search-toggler').click( function() {
        $(this).siblings('#sidebar-search').toggleClass('open');
        $(this).find('i').toggleClass('fa-times fa-search');
    });


    $('#widget-search').click(function(event) {
      $('html').one('click',function() {
        $('#sidebar-search').removeClass('open');
        $('.search-toggler i').removeClass('fa-times').addClass('fa-search');
      });

      event.stopPropagation();
    });

    // Autocollapse
    Utility.autocollapse();

    if ($("#page-tabs").length > 0 )
      $('body').pagetabs();

    $(".static-content").css('margin-bottom',$('footer').css('height'));

    setTimeout('$("#loading").remove()',1000); 
    ;
});
// ------------------------------
// =/D No more D for you.
// ------------------------------


// ------------------------------
// Keyup
// ------------------------------
$(document).keyup(function(e) {

    // Infobar Close on Keypress Esc
    if (e.keyCode == 27) { // esc key
        try {
            vFSLayout.close('east');
        } catch (e) {
            if ($('body').hasClass('infobar-active')) {
                Utility.toggle_rightbar();
            }

        }
    }
});



// ------------------------------
// DOM Loaded
// ------------------------------
$(window).bind("load", function() {
    $('body').scrollSidebar();
    $(window).trigger('resize');
});


$(window).scroll(function(){
    Utility.sidebar_resizing();
});

$(window).resize(function(){
    //Utility.resizePageHeight();
    Utility.autocollapse();

    Utility.sidebar_resizing();
    // Utility.initScroller();
});
