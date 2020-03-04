/**  PIXWELL MAN SCRIPT */
var PIXWELL_MAIN_SCRIPTS = (function (Module, $) {
    'use strict';

    Module.$body = $('body');
    Module.$ios = /(iPad|iPhone|iPod)/g.test(navigator.userAgent);
    Module.$document = $(document);
    Module.$html = $('html, body');
    Module.$window = $(window);
    Module.$ajax = {};
    Module.wPoint = {};
    Module.$singleScrollDelay = 1;
    Module.$stickyScrollDelay = 1;
    Module.$lastPos = 0;

    Module.init = function () {
        this.getSettings();
        this.mainMenuPos();
        this.reCalcMenuPos();
        this.calcFullScreenFeat();
        this.stickyNavigation();
        this.quickFilter();
        this.carouselSlider();
        this.carouselWideSlider();
        this.bigSlider();
        this.bigNavSlider();
        this.toggleOffCanvas();
        this.stickySidebar();
        this.searchBoxToggle();
        this.bodyImageLoaded();
        this.backTop();
        this.offCanvasLoad();
        this.navLiveSearch();
        this.subMenuEffects();
        this.categoryHeaderBg();
        this.singleInfiniteLoadNext();
        this.mobileStickyNav();
        this.masonryPPCol3();
        this.masonryPPCol4();
        this.masonryFwP1();

        this.documentReload();
    };

    Module.documentReload = function () {
        this.paginationNextPrev();
        this.loadMore();
        this.paginationInfinite();
        this.scrollUpdateProcess();
        this.videoAutoPlay();
        this.showPostComment();
        this.scrollToComment();
        this.showSingleFeat();
        this.singleParallaxFeat();
        this.postGallerySlider();
        this.postGalleryLightBox();
        this.tooltips();
        this.productQuantity();
        this.bookMarkTipsy();
        this.masonryFW1();
        this.masonryCT1();
        this.usersRating();
    };

    Module.getSettings = function () {
        this.$themeSettings = $.parseJSON(themeSettings);
        this.slidePrev = '<i class="rbi rbi-angle-left"></i><span>' + this.$themeSettings.textPrev + '</span>';
        this.slideNext = '<i class="rbi rbi-angle-right"></i><span>' + this.$themeSettings.textNext + '</span>';
    };

    Module.getRTL = function () {
        return this.$body.hasClass('rtl');
    };

    Module.backTop = function () {
        if (this.$body.hasClass('is-backtop')) {
            $().UItoTop({
                containerID: 'back-top',
                easingType: 'easeOutQuart',
                text: '<i class="rbi rbi-arrow-up"></i>',
                containerHoverID: 'back-top-inner',
                scrollSpeed: 800
            });
        }
    };

    /** sticky nav */
    Module.stickyNavigation = function () {

        var self = this;
        var stickyNav = $('#sticky-nav');
        var navOuter = $('.navbar-outer');
        if (self.$body.hasClass('sticky-nav') && stickyNav.length > 0 && navOuter.length > 0 && self.$window.width() >= 992) {
            var smartSticky = false;
            var showPos = navOuter.offset().top + navOuter.height() + 70;
            stickyNav.css('top', '-' + stickyNav.height() + 'px');
            if (self.$body.hasClass('smart-sticky')) {
                smartSticky = true;
            }
            if (window.addEventListener) {
                window.addEventListener('scroll', function () {
                    self.stickyProcess(stickyNav, showPos, smartSticky);
                }, false);
            } else if (window.attachEvent) {
                window.attachEvent('onscroll', function () {
                    self.stickyProcess(stickyNav, showPos, smartSticky);
                });
            }
        }
    };

    /** sticky mobile menu */
    Module.mobileStickyNav = function () {
        var self = this;
        var mobileStickyNav = $('#mobile-sticky-nav');
        var navOuter = $('.navbar-outer');
        if (self.$body.hasClass('sticky-nav') && mobileStickyNav.length > 0 && self.$window.width() < 992) {
            var smartSticky = false;
            var showPos = navOuter.offset().top + navOuter.height() + 70;
            if (self.$body.hasClass('smart-sticky')) {
                smartSticky = true;
            }
            mobileStickyNav.css('top', '-' + mobileStickyNav.height() + 'px');
            if (window.addEventListener) {
                window.addEventListener('scroll', function () {
                    self.stickyProcess(mobileStickyNav, showPos, smartSticky);
                }, false);
            } else if (window.attachEvent) {
                window.attachEvent('onscroll', function () {
                    self.stickyProcess(mobileStickyNav, showPos, smartSticky);
                });
            }
        }
    };

    /** sticky process */
    Module.stickyProcess = function (stickyNav, showPos, smartSticky) {

        if (this.$stickyScrollDelay % 3 == 1) {
            var scrollTop = this.$window.scrollTop();
            if (!smartSticky) {
                if (scrollTop > showPos && !stickyNav.hasClass('is-show')) {
                    stickyNav.addClass('is-show');
                } else if (scrollTop < showPos && stickyNav.hasClass('is-show')) {
                    stickyNav.removeClass('is-show');
                }
            } else {
                var direction;
                if (scrollTop !== this.lastPos) {
                    if (scrollTop > this.lastPos) {
                        direction = 'down';
                    } else {
                        direction = 'up';
                    }
                    this.lastPos = scrollTop;
                }
                if (scrollTop > showPos) {
                    if (direction == 'up' && !stickyNav.hasClass('is-show')) {
                        stickyNav.addClass('is-show');
                    } else if (direction == 'down' && stickyNav.hasClass('is-show')) {
                        stickyNav.removeClass('is-show');
                    }
                } else if (scrollTop < showPos && stickyNav.hasClass('is-show')) {
                    stickyNav.removeClass('is-show');
                }
            }
            this.$stickyScrollDelay = 1;
        } else {
            this.$stickyScrollDelay++;
        }
    };


    /* carousel slider */
    Module.carouselSlider = function () {
        var self = this;
        var elements = $('.carousel-feat-3, .carousel-feat-7, .carousel-feat-10');
        if (elements.length > 0) {
            var config = {
                items: 3,
                loop: true,
                center: true,
                dots: self.$themeSettings.sliderDot,
                navText: [self.slidePrev, self.slideNext],
                autoplay: self.$themeSettings.sliderPlay,
                autoplayTimeout: self.$themeSettings.sliderSpeed,
                navElement: 'div role="presentation"',
                nav: true,
                rtl: self.getRTL(),
                navClass: [
                    'rb-owl-prev',
                    'rb-owl-next'
                ],
                autoplaySpeed: 500,
                responsive: {
                    0: {items: 1},
                    768: {items: 2},
                    992: {items: 3}
                }
            };

            elements.each(function () {
                var el = $(this);
                el.on('initialized.owl.carousel', function () {
                    el.prev('.load-animation').fadeOut(150, function () {
                        $(this).remove();
                        el.removeClass('per-load');
                    });
                });

                el.owlCarousel(config);
            })
        }
    };

    /* carousel wide slider */
    Module.carouselWideSlider = function () {
        var self = this;
        var elements = $('.carousel-feat-9, .carousel-feat-12');
        if (elements.length > 0) {
            var config = {
                items: 5,
                loop: true,
                center: false,
                dots: self.$themeSettings.sliderDot,
                navText: [self.slidePrev, self.slideNext],
                autoplay: self.$themeSettings.sliderPlay,
                autoplayTimeout: self.$themeSettings.sliderSpeed,
                navElement: 'div role="presentation"',
                nav: true,
                rtl: self.getRTL(),
                navClass: [
                    'rb-owl-prev',
                    'rb-owl-next'
                ],
                autoplaySpeed: 500,
                responsive: {
                    0: {items: 1},
                    768: {items: 2},
                    992: {items: 3},
                    1024: {items: 4},
                    1400: {items: 5}
                }
            };

            elements.each(function () {
                var el = $(this);
                el.on('initialized.owl.carousel', function () {
                    el.prev('.load-animation').fadeOut(150, function () {
                        $(this).remove();
                        el.removeClass('per-load');
                    });
                });

                el.owlCarousel(config);
            })
        }
    };

    //hover effect
    Module.subMenuEffects = function () {
        var rbMenus = $('.rb-menu');
        if (rbMenus.length > 0) {
            rbMenus.each(function () {
                var menu = $(this);

                // remove effect mega menu
                var subMegaItems = menu.children('.is-mega-menu');
                subMegaItems.find('.sub-menu, .menu-item-has-children').andSelf().addClass('mega-tree');
                var subParents = menu.find('.menu-item-has-children');
                subParents.not('.mega-tree').addClass('animation-menu');

                var subMenus = menu.find('.sub-menu');
                if (subMenus.length > 0) {
                    $(subMenus).each(function () {
                        var subItem = $(this);
                        if (!subItem.hasClass('mega-tree')) {
                            var itemItem = subItem.children('li').children('a');
                            var index = 0;
                            $(itemItem).each(function () {
                                var item = $(this);
                                var delay = 200 + 35 * index;
                                item.css('transition-delay', delay + 'ms');
                                item.css('-webkit-transition-delay', delay + 'ms');
                                index++;
                            });
                        }
                    });
                }

                if (!menu.hasClass('is-clicked')) {
                    subParents.on('mouseenter', function () {
                        var self = $(this);
                        if (self.hasClass('animation-menu')) {
                            self.addClass('hovering-menu');
                            self.removeClass('no-delay');
                        }
                        return false;
                    }).on('mouseleave', function () {
                        var self = $(this);
                        if (self.hasClass('animation-menu')) {
                            self.removeClass('hovering-menu');
                            self.addClass('no-delay');
                        }
                        return false;
                    });
                }
            });
        }
    };


    /* big slider */
    Module.bigSlider = function () {

        var self = this;
        var elements = $('.slider-feat-4, .slider-feat-5, .slider-feat-14');
        if (elements.length > 0) {
            var config = {
                items: 1,
                loop: true,
                dots: self.$themeSettings.sliderDot,
                navText: [self.slidePrev, self.slideNext],
                autoplay: self.$themeSettings.sliderPlay,
                autoplayTimeout: self.$themeSettings.sliderSpeed,
                nav: false,
                rtl: self.getRTL(),
                navClass: [
                    'rb-owl-prev',
                    'rb-owl-next'
                ],
                navElement: 'div role="presentation"',
                autoplaySpeed: 500,
                responsive: {
                    768: {
                        nav: true
                    }
                }
            };

            elements.each(function () {
                var el = $(this);
                el.on('initialized.owl.carousel', function () {
                    el.prev('.load-animation').fadeOut(150, function () {
                        $(this).remove();
                        el.removeClass('per-load');
                    });
                });

                el.owlCarousel(config);
            })
        }
    };

    /** slider width nav */
    Module.bigNavSlider = function () {
        var self = this;
        var elements = $('.slider-feat-13');
        if (elements.length > 0) {
            var config = {
                items: 1,
                loop: true,
                dots: self.$themeSettings.sliderDot,
                dotsData: true,
                autoplay: self.$themeSettings.sliderPlay,
                autoplayTimeout: self.$themeSettings.sliderSpeed,
                nav: false,
                animateOut: 'rb-slideout',
                rtl: self.getRTL(),
                autoplaySpeed: 500
            };

            elements.each(function () {
                var el = $(this);
                el.on('initialized.owl.carousel', function () {
                    el.prev('.load-animation').fadeOut(150, function () {
                        $(this).remove();
                        el.removeClass('per-load');
                    });
                });
                el.owlCarousel(config);
            })
        }
    };

    Module.offCanvasLoad = function () {
        $('#off-canvas-section').removeClass('is-hidden');
    };

    Module.toggleOffCanvas = function () {
        var self = this;
        var triggerBtn = $('.off-canvas-trigger');
        var closeBtn = $('#off-canvas-close-btn');
        var siteMask = $('.site-mask');

        triggerBtn.on('click || tap', function (e) {
            e.preventDefault();
            e.stopPropagation();
            self.$body.toggleClass('mobile-js-menu');
            return false;
        });

        siteMask.on('click || tap', function () {
            self.$body.toggleClass('mobile-js-menu');
            return false;
        });

        closeBtn.on('click || tap', function () {
            self.$body.toggleClass('mobile-js-menu');
            return false;
        });

        var nav = $('.off-canvas-menu');
        var navSub = nav.find('li.menu-item-has-children > a');
        navSub.append('<aside class="explain-menu"><i class="rbi rbi-angle-down"></i></aside>');
        $('.explain-menu').on('click', function () {
            var item = $(this).closest('.menu-item-has-children');
            item.children('.sub-menu').slideToggle(200);
            setTimeout(function () {
                item.toggleClass('hovering-menu');
                if (item.hasClass('hovering-menu')) {
                    item.removeClass('no-delay');
                } else {
                    item.addClass('no-delay');
                    item.find('.sub-menu').hide();
                }
            }, 150);

            return false;
        });
    };

    //search box toggle
    Module.searchBoxToggle = function () {
        var self = this;
        $('.nav-search-link').off('click').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            var target = $(this).next('.navbar-search-popup');
            self.$body.find('.show-searchform').not(target).removeClass('show-searchform');
            target.toggleClass('show-searchform');
        });
    };

    //sticky sidebar
    Module.stickySidebar = function () {
        var sidebars = $('.sidebar-sticky').not('.sb-infinite');
        if (sidebars.length > 0) {
            this.$body.imagesLoaded(function () {
                RubyStickySidebar.stick(sidebars);
            });
        }
    };

    //tooltips
    Module.tooltips = function () {
        var self = this;
        if (self.$body.hasClass('is-tooltips') && false === self.$ios) {
            if (self.$body.hasClass('is-tooltips-touch')) {
                if (false === self.ios) {
                    self.tooltipsProcess()
                }
            } else {
                self.tooltipsProcess()
            }
        }
    };

    //tooltips process
    Module.tooltipsProcess = function () {

        if (window.innerWidth < 992) {
            return false;
        }

        var self = this;
        var tooltips_n = self.$body.find('.tooltips-n');
        var tooltips_w = self.$body.find('.tooltips-w');
        var tooltips_s = self.$body.find('.tooltips-s');
        var tooltips_e = self.$body.find('.tooltips-e');
        var tooltipsCart = self.$body.find('.cart-tooltips .add-to-cart');

        var direct_e = 'e';
        var direct_w = 'w';

        if (this.getRTL()) {
            direct_e = 'w';
            direct_w = 'e';
        }

        if (tooltips_n.length > 0) {
            tooltips_n.each(function () {
                var current = $(this);
                if (!current.hasClass('tipsy-loaded')) {
                    current.children('a, .tipsy-el').tipsy({fade: true, opacity: 1, trigger: 'hover', gravity: 'n'});
                    current.addClass('tipsy-loaded')
                }
            })
        }

        if (tooltips_w.length > 0) {
            tooltips_w.each(function () {
                var current = $(this);
                if (!current.hasClass('tipsy-loaded')) {
                    current.children('a').tipsy({fade: true, opacity: 1, trigger: 'hover', gravity: direct_w});
                    current.addClass('tipsy-loaded')
                }
            })
        }

        if (tooltips_s.length > 0) {
            tooltips_s.each(function () {
                var current = $(this);
                if (!current.hasClass('tipsy-loaded')) {
                    current.children('a').tipsy({fade: true, opacity: 1, trigger: 'hover', gravity: 's'});
                    current.addClass('tipsy-loaded')
                }
            })
        }

        if (tooltips_e.length > 0) {
            tooltips_e.each(function () {
                var current = $(this);
                if (!current.hasClass('tipsy-loaded')) {
                    current.children('a').tipsy({fade: true, opacity: 1, trigger: 'hover', gravity: direct_e});
                    current.addClass('tipsy-loaded')
                }
            })
        }

        if (!tooltipsCart.hasClass('tipsy-loaded')) {
            tooltipsCart.tipsy({
                trigger: 'hover',
                fade: true, opacity: 1, gravity: direct_e, title: function () {
                    var added = $(this).find('.added_to_cart');
                    if (added.length > 0) {
                        return added.text();
                    }
                    return $(this).find('.ajax_add_to_cart').text();
                }
            });
            tooltipsCart.addClass('tipsy-loaded')
        }
    };

    /** bookmark tipsy */
    Module.bookMarkTipsy = function () {
        var tipsyBookmarks = $('.read-it-later');
        tipsyBookmarks.each(function () {
            var current = $(this);
            if (!current.hasClass('tipsy-loaded')) {
                current.tipsy({
                    fade: true,
                    opacity: 1,
                    gravity: 's',
                    title: function () {
                        return $(this).data('title');
                    }
                });
                current.addClass('tipsy-loaded');
            }
        });
    };

    // category header background
    Module.categoryHeaderBg = function () {
        var self = this;

        var headerBGWrap = $('#category-header-bg');
        if (headerBGWrap.length > 0) {
            var background = headerBGWrap.data('background');
            var wrapper = headerBGWrap.parent('.header-holder');
            var topPos = wrapper.offset().top;
            var headerHeight = wrapper.height();

            if (background) {
                headerBGWrap.css('background-image', 'url(' + background + ')');
                setTimeout(function () {
                    headerBGWrap.addClass('is-show');
                }, 1);
                self.initParallax(headerBGWrap, topPos, headerHeight, 3);
                if (window.addEventListener) {
                    window.addEventListener('scroll', function () {
                        self.parallaxCalcAnimation(headerBGWrap, topPos, headerHeight, 3);
                    }, false);
                } else if (window.attachEvent) {
                    window.attachEvent('onscroll', function () {
                        self.parallaxCalcAnimation(headerBGWrap, topPos, headerHeight, 3);
                    });
                }
            }
        }
    };

    // init transform
    Module.initParallax = function (wrapper, posTop, elHeight, percent) {

        if (!this.$body.hasClass('is-parallax-feat') || wrapper.hasClass('parallax-init')) {
            return;
        }
        var scrollTop = this.$document.scrollTop();
        if (Math.abs(scrollTop - posTop) <= elHeight) {
            var parallaxMove = Math.round((scrollTop - posTop) / percent);
            wrapper.css('transform', 'translate3d(0,' + parallaxMove + 'px, 0)');
            wrapper.css('-webkit-transform', 'translate3d(0,' + parallaxMove + 'px, 0)');
        }
    };

    // calc parallax
    Module.parallaxCalcAnimation = function (wrapper, posTop, elHeight, percent) {
        var scrollTop = this.$document.scrollTop();
        if (Math.abs(scrollTop - posTop) <= elHeight) {
            var parallaxMove = Math.round((scrollTop - posTop) / percent);
            wrapper.css('transform', 'translate3d(0,' + parallaxMove + 'px, 0)');
            wrapper.css('-webkit-transform', 'translate3d(0,' + parallaxMove + 'px, 0)');
        }
    };

    /** single featured parallax */
    Module.singleParallaxFeat = function () {
        var self = this;
        if (!self.$body.hasClass('is-parallax-feat')) {
            return;
        }
        var singleParallax = $('.parallax-thumb');
        if (singleParallax.length > 0) {
            singleParallax.each(function () {
                var el = $(this);
                if (!el.hasClass('loaded-parallax')) {
                    var wrapper = el.find('.p-thumb');
                    var posTop = el.offset().top;
                    var elHeight = el.height();
                    self.initParallax(wrapper, posTop, elHeight, 4);
                    setTimeout(function () {
                        el.addClass('loaded-parallax');
                    }, 500);
                    if (window.addEventListener) {
                        window.addEventListener('scroll', function () {
                            self.parallaxCalcAnimation(wrapper, posTop, elHeight, 4);
                        }, false);
                    } else if (window.attachEvent) {
                        window.attachEvent('onscroll', function () {
                            self.parallaxCalcAnimation(wrapper, posTop, elHeight, 4);
                        });
                    }
                }
            })
        }
    };

    /** fade in featured image */
    Module.showSingleFeat = function () {
        var singleParallax = $('.parallax-thumb');
        if (singleParallax.length > 0) {
            singleParallax.each(function () {
                var el = $(this);
                el.imagesLoaded(function () {
                    if (!el.hasClass('feat-loaded')) {
                        el.addClass('feat-loaded')
                    }
                });
            });
        }
    };


    /** featured thumbnail height calc */
    Module.calcFullScreenFeat = function () {
        var self = this;
        var singleParallax = $('.parallax-thumb');
        var winHeight = this.$window.height();
        if (singleParallax.length > 0) {
            singleParallax.each(function () {
                var el = $(this);
                var wrapper = el.find('.p-thumb');
                var topOffset = el.offset().top;
                if (el.hasClass('is-fullscreen') && !el.hasClass('h-added')) {
                    el.addClass('h-added');
                    if (topOffset < winHeight) {
                        el.css('height', 'calc(100vh - ' + el.offset().top + 'px)');
                    } else {
                        el.css('height', '100vh');
                    }
                }
                var elHeight = el.height();
                self.initParallax(wrapper, topOffset, elHeight, 4);
                wrapper.addClass('parallax-init');
            });
        }
    };

    //post gallery outer
    Module.postGallerySlider = function () {

        var self = this;
        var elements = $('.p-gallery-slider');
        if (elements.length > 0) {
            var config = {
                items: 1,
                loop: true,
                dots: self.$themeSettings.sliderDot,
                navText: [self.slidePrev, self.slideNext],
                autoplay: self.$themeSettings.sliderPlay,
                autoplayTimeout: self.$themeSettings.sliderSpeed,
                nav: true,
                rtl: self.getRTL(),
                navClass: [
                    'rb-owl-prev',
                    'rb-owl-next'
                ],
                navElement: 'div role="presentation"',
                autoplaySpeed: 500
            };

            elements.each(function () {
                var el = $(this);
                el.on('initialized.owl.carousel', function () {
                    el.prev('.load-animation').fadeOut(150, function () {
                        $(this).remove();
                        el.removeClass('per-load');
                    });
                });
                el.imagesLoaded(function () {
                    el.owlCarousel(config);
                });

            })
        }
    };


    //gallery popup
    Module.postGalleryLightBox = function () {
        self = this;
        $('.gallery-popup-link, .rb-gallery-link').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();

            var target = $(this);
            var data = [];
            var galleryID = target.data('gallery');
            var slideIndex = target.data('index');
            var galleries = $(galleryID).find('.gallery-el');
            galleries.each(function () {
                data.push({
                    title: $(this).find('.image-title').html(),
                    rbgallery: $(this).html()
                });
            });
            $.magnificPopup.open({
                type: 'inline',
                mainClass: 'rb-gallery-popup rb-popup-effect mfp-animation',
                closeMarkup: '<button title="%title%" class="mfp-close"><i class="rbi rbi-move"></i></button>',
                closeOnBgClick: false,
                removalDelay: 500,
                showCloseBtn: true,
                preloader: false,
                gallery: {
                    enabled: true,
                    preload: [0, 2],
                    arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"><i class="rbi rbi-angle-%dir%"></i></button>',
                    tCounter: '<span>%curr% / %total%</span>'
                },
                callbacks: {
                    open: function () {
                        $.magnificPopup.instance.goTo(slideIndex);
                        self.$document.on('click', '.gallery-popup-select', function (e) {
                            e.preventDefault();
                            e.stopPropagation();
                            var index = $(this).data('index');
                            $.magnificPopup.instance.goTo(index);
                        });
                    },
                    buildControls: function () {
                        this.contentContainer.find('.gallery-popup-nav').append(this.arrowLeft.add(this.arrowRight));
                    }
                },
                inline: {
                    markup: '<div class="gallery-popup-header is-light-text">' +
                    '<h3 class="mfp-title"></h3>' +
                    '<div class="header-right"><div class="mfp-counter"></div><div class="gallery-popup-nav"></div><div class="mfp-close"></div></div>' +
                    '</div>' +
                    '<div class="gallery-popup-content"><div class="mfp-rbgallery"></div></div>'
                },
                items: data
            });

            return false;
        });
    };

    //auto play single video
    Module.videoAutoPlay = function () {
        var self = this;
        var videos = $('.post-video-outer');
        if (videos != null && videos.length > 0) {
            videos.each(function () {
                var el = $(this);
                if (el.hasClass('is-autoplay') && !el.hasClass('added-autoplay')) {
                    self.wPoint['iframe'] = new Waypoint({
                        element: el,
                        handler: function () {
                            var iframe = el.find('iframe');
                            self.initAutoPlay(iframe);
                            el.addClass('autoplay-added');
                            this.destroy();
                        },
                        offset: '60%'
                    });
                }
            })
        }
    };


    //init auto play video
    Module.initAutoPlay = function (item) {
        if (item.length > 0 && 'undefined' != item[0]) {
            var src = item[0].src;
            if (src.indexOf('?') > -1) {
                item[0].src += "&autoplay=1";
            } else {
                item[0].src += "?autoplay=1";
            }
        }
    };

    /** image loaded */
    Module.bodyImageLoaded = function () {
        this.$body.imagesLoaded(function () {
            $('.image-caption.is-overlay').removeClass('is-hide');
        })
    };

    /** show comment box */
    Module.showPostComment = function () {
        $('.show-post-comment').off('click').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).parent().next('.comment-box-content').removeClass('is-hidden');
            $(this).fadeOut(400, function () {
                $(this).remove();
            })
        });
    };

    /** scroll to comment  */
    Module.scrollToComment = function () {
        var commentBtn = $('.show-post-comment');
        var self = this;
        if (commentBtn.length > 0) {
            var hash = window.location.hash;
            if ('#respond' == hash || '#comment' == hash.substring(0, 8)) {
                commentBtn.trigger('click');
                self.$html.scrollTop(commentBtn.offset().top);
            }
        }
    };

    /** shop product */
    Module.productQuantity = function () {
        this.$document.on('click', '.quantity .quantity-btn', function (e) {
            e.preventDefault();
            var button = $(this);
            var step = 1;
            var input = button.parent().find('input');
            var min = 1;
            var max = 9999;
            var value_old = parseInt(input.val());
            var value_new = parseInt(input.val());

            if (input.attr('step')) {
                step = parseInt(input.attr('step'));
            }

            if (input.attr('min')) {
                min = parseInt(input.attr('min'));
            }

            if (input.attr('max')) {
                max = parseInt(input.attr('max'));
            }

            if (button.hasClass('up')) {
                if (value_old < max) {
                    value_new = value_old + step;
                } else {
                    value_new = max;
                }
            } else if (button.hasClass('down')) {
                if (value_old > min) {
                    value_new = value_old - step;
                } else {
                    value_new = min;
                }
            }

            if (!input.attr('disabled')) {
                input.val(value_new).change();
            }
        });
    };

    /** mega menu position */
    Module.mainMenuPos = function () {

        if (window.innerWidth < 991) {
            return false;
        }

        var defaultSubs = $('.rb-menu .sub-menu:not(sub-mega)');
        var megaColItems = $('.is-mega-menu.type-column');

        if (defaultSubs.length > 0) {
            defaultSubs.each(function () {
                var item = $(this);
                var wrap = item.parents('.navbar-inner');
                if (wrap.length > 0) {
                    var wrapRightOffset = wrap.offset().left + wrap.width();
                    var rightOffset = item.offset().left + item.width();
                    if (rightOffset > wrapRightOffset) {
                        item.addClass('left-direction');
                        item.parents('.sub-menu').addClass('left-direction is-left-child');
                    }
                }
            });
        }

        if (megaColItems.length > 0) {
            megaColItems.each(function () {
                var item = $(this);
                item.imagesLoaded(function () {
                    var parent = item.parents('.navbar-inner');
                    var sub = item.children('.mega-col.sub-menu');
                    var rightSpacing = parent.offset().left + parent.width() - (item.offset().left + item.width());
                    var leftSpacing = item.offset().left - parent.offset().left;
                    if (sub.length > 0) {
                        var subWidth = sub.width();
                        var subHaftWidth = parseInt(subWidth / 2);
                        if (subHaftWidth > leftSpacing) {
                            sub.css('left', '-' + leftSpacing + 'px');
                            sub.css('right', 'auto');
                        } else if (subHaftWidth > rightSpacing) {
                            sub.css('right', '-' + rightSpacing + 'px');
                            sub.css('left', 'auto');
                        } else {
                            sub.css('left', '-' + parseInt(subHaftWidth - parseInt(item.width() / 2)) + 'px');
                            sub.css('right', 'auto');
                        }
                    }
                });
            })
        }
    };

    /* resize */
    Module.reCalcMenuPos = function () {
        var self = this;
        var delay;
        this.$window.on('resize', function () {
            clearTimeout(delay);
            delay = setTimeout(function () {
                self.mainMenuPos();
            }, 300);
        })
    };


    /* masonry block */
    Module.masonryFW1 = function () {
        var self = this;
        var wrapper = $('.fw-masonry-1.is-masonry');
        if (wrapper.length > 0) {
            wrapper.each(function () {
                var el = $(this);
                var inner = el.find('.content-inner').eq(0);
                $(inner).isotope({
                    itemSelector: '.fw-mh-1',
                    percentPosition: true,
                    masonry: {
                        columnWidth: '.fw-ms-1'
                    }
                });

                self.$window.on('RB:LazyLoaded', function () {
                    inner.imagesLoaded().progress(function () {
                        $(inner).isotope('layout');
                    });
                });

                self.$body.imagesLoaded(function () {
                    setTimeout(function () {
                        $(inner).isotope('layout');
                    }, 20)
                });
            });
        }
    };

    /** content masonry */
    Module.masonryCT1 = function () {
        var self = this;
        var wrapper = $('.ct-masonry-1.is-masonry');
        if (wrapper.length > 0) {
            wrapper.each(function () {
                var el = $(this);
                var inner = el.find('.content-inner').eq(0);
                $(inner).isotope({
                    itemSelector: '.ct-mh-1',
                    percentPosition: true,
                    masonry: {
                        columnWidth: '.ct-ms-1'
                    }
                });
                self.$window.on('RB:LazyLoaded', function () {
                    inner.imagesLoaded().progress(function () {
                        $(inner).isotope('layout');
                    });
                });

                self.$body.imagesLoaded(function () {
                    setTimeout(function () {
                        $(inner).isotope('layout');
                    }, 20)
                });
            });
        }
    };

    /** portfolio archive masonry */
    Module.masonryPPCol3 = function () {
        var self = this;
        var wrapper = $('.pp-archive-m3.is-masonry');
        if (wrapper.length > 0) {
            wrapper.each(function () {
                var el = $(this);
                var inner = el.find('.content-inner').eq(0);
                $(inner).isotope({
                    itemSelector: '.fw-mh-1',
                    percentPosition: true,
                    masonry: {
                        columnWidth: '.fw-ms-1'
                    }
                });

                self.$window.on('RB:LazyLoaded', function () {
                    inner.imagesLoaded().progress(function () {
                        $(inner).isotope('layout');
                    });
                });

                self.$body.imagesLoaded(function () {
                    setTimeout(function () {
                        $(inner).isotope('layout');
                    }, 20)
                });
            });
        }
    };

    Module.masonryPPCol4 = function () {
        var self = this;
        var wrapper = $('.pp-archive-m4.is-masonry');
        if (wrapper.length > 0) {
            wrapper.each(function () {
                var el = $(this);
                var inner = el.find('.content-inner').eq(0);
                $(inner).isotope({
                    itemSelector: '.fw-mh-c4',
                    percentPosition: true,
                    masonry: {
                        columnWidth: '.fw-ms-c4'
                    }
                });

                self.$window.on('RB:LazyLoaded', function () {
                    inner.imagesLoaded().progress(function () {
                        $(inner).isotope('layout');
                    });
                });

                self.$body.imagesLoaded(function () {
                    setTimeout(function () {
                        $(inner).isotope('layout');
                    }, 20)
                });
            });
        }
    };

    /** fw masonry 1 */
    Module.masonryFwP1 = function () {
        var self = this;
        var wrapper = $('.fw-portfolio-1.is-masonry');
        if (wrapper.length > 0) {
            wrapper.each(function () {
                var el = $(this);
                var inner = el.find('.content-inner').eq(0);
                var portfolioFW1 = $(inner).isotope({
                    itemSelector: '.fw-mh-1',
                    percentPosition: true,
                    filter: '*',
                    masonry: {
                        columnWidth: '.fw-ms-1'
                    }
                });

                self.$window.on('RB:LazyLoaded', function () {
                    inner.imagesLoaded().progress(function () {
                        $(inner).isotope('layout');
                    });
                });

                self.$body.imagesLoaded(function () {
                    setTimeout(function () {
                        $(inner).isotope('layout');
                    }, 20)
                });

                /** filter */
                var filterBtn = el.find('.pp-filter-el');
                filterBtn.on('click', function () {
                    var target = $(this);
                    var filterValue = target.attr('data-filter');
                    target.addClass('active').siblings().removeClass('active');
                    $(inner).isotope({filter: filterValue});
                })
            });
        }
    };

    /** user rating */
    Module.usersRating = function () {
        var self = this;
        var reviewsForm = this.$body.find('.rb-reviews-form');
        if (reviewsForm.length > 0) {
            reviewsForm.each(function () {
                var reviewForm = $(this);
                if (!reviewForm.hasClass('is-loaded')) {
                    reviewForm.addClass('is-loaded');
                    var ratingForm = reviewForm.find('.rb-form-rating');
                    var target = reviewForm.find('.rb-rating-selection');
                    target.hide();
                    target.before(
                        '<div class="rb-review-stars">\
                            <span>\
                                <a class="star" data-rating="1" href="#"><i class="rbi rbi-star"></i></a>\
                                <a class="star" data-rating="2" href="#"><i class="rbi rbi-star"></i></a>\
                                <a class="star" data-rating="3" href="#"><i class="rbi rbi-star"></i></a>\
                                <a class="star" data-rating="4" href="#"><i class="rbi rbi-star"></i></a>\
                                <a class="star" data-rating="5" href="#"><i class="rbi rbi-star"></i></a>\
                            </span>\
                        </div>'
                    );

                    ratingForm.on('click', 'a.star', function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        var star = $(this);
                        var rating = star.closest('#respond').find('.rb-rating-selection');
                        rating.val(star.data('rating'));
                        star.siblings('a').removeClass('active');
                        star.addClass('active');
                        ratingForm.addClass('selected');
                    });

                    reviewForm.on('click', '#respond #submit', function () {
                        var ratingEl = $(this).closest('.rb-reviews-form').find('.rb-rating-selection');
                        var text = $(this).closest('.rb-reviews-form').find('.rating-alert').html();
                        var rating = ratingEl.val();
                        if (ratingEl.length > 0 && !rating) {
                            window.alert(text);
                            return false;
                        }
                    });
                }
            });
        }
    };


    /** Theme ajax */
    Module.reinitiateFunctions = function () {
        this.$html.off();
        this.$document.off();
        this.$window.trigger('load');
        this.documentReload();
    };

    /** register cache object */
    Module.$cacheAjax = {

        data: {},
        get: function (id) {
            return this.data[id];
        },

        set: function (id, data) {
            this.remove(id);
            this.data[id] = data;
        },

        remove: function (id) {
            delete this.data[id];
        },

        exist: function (id) {
            return this.data.hasOwnProperty(id) && this.data[id] !== null;
        }

    };

    /** get data */
    Module.getAjaxData = function (block) {
        return {
            uuid: block.data('uuid'),
            name: block.data('name'),
            posts_per_page: block.data('posts_per_page'),
            page_max: block.data('page_max'),
            page_current: block.data('page_current'),
            category: block.data('category'),
            categories: block.data('categories'),
            orderby: block.data('orderby'),
            author: block.data('author'),
            tags: block.data('tags'),
            post_not_in: block.data('post_not_in'),
            format: block.data('format'),
            offset: block.data('offset'),
            quick_filter: block.data('quick_filter'),
            layout: block.data('layout')
        };
    };

    /** check pagination */
    Module.checkPagination = function (block) {

        var settings = this.getAjaxData(block);

        if (settings.page_current >= settings.page_max || settings.page_max <= 1) {
            block.find('.loadmore-link').hide();
            block.find('.loadmore-animation').hide();
            block.find('.pagination-infinite').addClass('disable-pagination');
            block.find('.pagination-loadmore').addClass('disable-pagination');
        } else {
            block.find('.loadmore-link').show();
            block.find('.loadmore-link').css('opacity', 1);
            block.find('.loadmore-animation').hide();
            block.find('.pagination-infinite').removeClass('disable-pagination');
            block.find('.pagination-loadmore').removeClass('disable-pagination');
        }

        if (settings.page_max < 2) {
            block.find('.pagination-link').addClass('is-disable');
        }
        if (settings.page_current >= settings.page_max) {
            block.find('.ajax-next').addClass('is-disable');
        }
        if (settings.page_current <= 1) {
            block.find('.ajax-prev').addClass('is-disable');
        }
    };

    /** quick filter */
    Module.quickFilter = function () {
        var self = this;
        $('.quick-filter-link').off('click').on('click', function (e) {

            e.preventDefault();
            e.stopPropagation();

            var link = $(this);
            var block = link.parents('.block-wrap');
            var uuid = block.attr('id');

            if (true == self.$ajax[uuid + '_processing']) {
                return;
            }
            self.$ajax[uuid + '_processing'] = true;
            var filterVal = link.data('ajax_filter_val');

            block.find('.quick-filter-link').removeClass('is-active');
            block.find('.quick-filter-link').not(this).addClass('is-deactivate');
            link.addClass('is-active');

            self.animationStart(block, 'replace');
            var settings = self.getAjaxData(block);

            self.resetQuickFilter(block, settings, filterVal);

            setTimeout(function () {
                self.quickFilterProcess(block, settings);
            }, 400);

        });

        /** reset quick filter */
        Module.resetQuickFilter = function (block, settings, filterVal) {

            var self = this;
            var uuid = block.attr('id');

            settings.page_current = 1;
            block.data('page_current', 1);

            if ('category' == settings.quick_filter) {
                if ('undefined' == typeof (self.$ajax[uuid + '_category'])) {
                    self.$ajax[uuid + '_category'] = 0;
                }

                if (0 == filterVal) {
                    settings.category = self.$ajax[uuid + '_category'];
                    settings.categories = self.$ajax[uuid + '_categories'];

                    block.data('category', self.$ajax[uuid + '_category']);
                    block.data('categories', self.$ajax[uuid + '_categories']);

                } else {
                    settings.category = filterVal;
                    settings.categories = 0;

                    block.data('category', filterVal);
                    block.data('categories', 0);
                }
            }

            if ('tag' == settings.quick_filter) {
                settings.tags = filterVal;
                block.data('tags', filterVal);
            }
        };

        /** process ajax */
        Module.quickFilterProcess = function (block, settings) {

            var self = this;
            var cacheSettings = settings;
            delete cacheSettings.page_max;
            var cacheID = JSON.stringify(cacheSettings);

            if (self.$cacheAjax.exist(cacheID)) {
                var data = self.$cacheAjax.get(cacheID);

                if ('undefined' != typeof data.page_max) {
                    block.data('page_max', data.page_max);
                }

                self.animationEnd(block, data.content, 'replace');

                return false;
            } else {
                $.ajax({
                    type: 'POST',
                    url: pixwellParams.ajaxurl,
                    data: {
                        action: 'pixwell_quick_filter',
                        data: settings
                    },
                    success: function (data) {
                        data = $.parseJSON(JSON.stringify(data));
                        if ('undefined' != typeof data.page_max) {
                            block.data('page_max', data.page_max);
                        }
                        self.$cacheAjax.set(cacheID, data);
                        self.animationEnd(block, data.content, 'replace');
                    }
                });
            }
        };

        /** ajax next prev */
        Module.paginationNextPrev = function () {
            var self = this;
            $('.pagination-link').off('click').on('click', function (e) {

                e.preventDefault();
                e.stopPropagation();

                var link = $(this);
                var block = link.parents('.block-wrap');
                var uuid = block.attr('id');

                if (true == self.$ajax[uuid + '_processing']) {
                    return;
                }

                self.$ajax[uuid + '_processing'] = true;

                var type = link.data('type');

                var settings = self.getAjaxData(block);
                self.animationStart(block, 'replace');
                self.paginationNextPrevProcess(block, settings, type);
            });
        };

        /** processing next prev ajax */
        Module.paginationNextPrevProcess = function (block, settings, type) {

            if ('prev' == type) {
                settings.page_next = parseInt(settings.page_current) - 1;
            } else {
                settings.page_next = parseInt(settings.page_current) + 1;
            }
            var cacheSettings = settings;
            delete cacheSettings.page_max;
            cacheSettings.page_current = settings.page_next;
            var cacheID = JSON.stringify(cacheSettings);

            if (self.$cacheAjax.exist(cacheID)) {
                var data = self.$cacheAjax.get(cacheID);
                if ('undefined' != typeof data.page_current) {
                    block.data('page_current', data.page_current);
                }
                self.animationEnd(block, data.content, 'replace');
                return false;
            } else {
                $.ajax({
                    type: 'POST',
                    url: pixwellCoreParams.ajaxurl,
                    data: {
                        action: 'pixwell_live_pagination',
                        data: settings
                    },
                    success: function (data) {
                        data = $.parseJSON(JSON.stringify(data));
                        if ('undefined' != typeof data.page_current) {
                            block.data('page_current', data.page_current);
                        }
                        self.$cacheAjax.set(cacheID, data);
                        self.animationEnd(block, data.content, 'replace');
                    }
                });
            }
        };

        /** ajax load more */
        Module.loadMore = function () {
            var self = this;
            $('.loadmore-link').off('click').on('click', function (e) {

                e.preventDefault();
                e.stopPropagation();

                var link = $(this);
                var block = link.parents('.block-wrap');
                var uuid = block.attr('id');
                if (true == self.$ajax[uuid + '_processing']) {
                    return;
                }

                self.$ajax[uuid + '_processing'] = true;
                var settings = self.getAjaxData(block);
                if (settings.page_current >= settings.page_max) {
                    return;
                }

                self.animationStart(block, 'append');
                self.loadmoreProcess(block, settings);

            })
        };

        /** processing load more */
        Module.loadmoreProcess = function (block, settings) {

            settings.page_next = parseInt(settings.page_current) + 1;
            if (settings.page_next <= settings.page_max) {
                $.ajax({
                    type: 'POST',
                    url: pixwellParams.ajaxurl,
                    data: {
                        action: 'pixwell_live_pagination',
                        data: settings
                    },
                    success: function (data) {
                        data = $.parseJSON(JSON.stringify(data));
                        if ('undefined' != data.page_current) {
                            block.data('page_current', data.page_current);
                        }
                        if ('undefined' != data.notice) {
                            data.content = data.content + data.notice;
                        }
                        self.animationEnd(block, data.content, 'append');
                    }
                });
            }
        };

        /** infinite ajax */
        Module.paginationInfinite = function () {
            var self = this;
            var infiniteElements = $('.pagination-infinite');
            if (infiniteElements.length > 0) {
                infiniteElements.each(function () {
                    var element = $(this);
                    if (!element.hasClass('disable-pagination')) {
                        var animation = element.find('.loadmore-animation');
                        var block = element.parents('.block-wrap');
                        var uuid = block.attr('id');
                        var wPointID = 'infinite' + uuid;
                        var settings = self.getAjaxData(block);

                        self.wPoint[wPointID] = new Waypoint({
                            element: element,
                            handler: function (direction) {
                                if ('down' == direction) {
                                    if (true == self.$ajax[uuid + '_processing']) {
                                        return;
                                    }
                                    self.$ajax[uuid + '_processing'] = true;
                                    self.animationStart(block, 'append');
                                    Module.loadmoreProcess(block, settings);
                                    setTimeout(function () {
                                        self.wPoint[wPointID].destroy();
                                    }, 10);
                                }
                            },
                            offset: '99%'
                        })
                    }
                });
            }
        };

        /** animation start */
        Module.animationStart = function (block, action) {

            var wrapper = block.find('.content-wrap');
            var inner = wrapper.find('.content-inner');

            block.find('.ajax-link').addClass('is-disable');
            inner.stop();

            if ('replace' == action) {
                wrapper.css('height', wrapper.outerHeight());
                wrapper.prepend('<div class="load-animation"></div>');
                inner.addClass('is-overflow');
                inner.fadeTo('200', 0.05);
            } else {
                block.find('.loadmore-link').addClass('loading').animate({opacity: 0}, 200);
                block.find('.loadmore-animation').css({'display': 'block'}).delay(300).animate({opacity: 1}, 200);
            }
        };


        /** animation end */
        Module.animationEnd = function (block, content, action) {
            var self = this;
            block.delay(100).queue(function () {
                var uuid = block.attr('id');
                var wrapper = block.find('.content-wrap');
                var inner = block.find('.content-inner');

                block.find('.filter-link').removeClass('is-deactivate');
                block.find('.ajax-link').removeClass('is-disable');
                inner.stop();

                if ('replace' == action) {
                    wrapper.find('.load-animation').remove();
                    inner.html(content);

                    /** fix flashing menu */
                    if (inner.hasClass('mega-content-inner')) {
                        inner.imagesLoaded(function () {
                            setTimeout(function () {
                                inner.removeClass('is-overflow');
                                wrapper.css('height', 'auto');
                                setTimeout(function () {
                                    inner.fadeTo(300, 1);
                                }, 300);
                            }, 100)
                        });
                    } else {
                        inner.removeClass('is-overflow');
                        wrapper.css('height', 'auto');
                        setTimeout(function () {
                            inner.fadeTo(300, 1);
                        }, 300);
                    }
                } else {
                    content = $(content);
                    content.addClass('is-hide');
                    content.addClass('opacity-animate');
                    inner.append(content);
                    block.find('.loadmore-animation').animate({opacity: 0}, 200, function () {
                        $(this).css({'display': 'none'});
                    });
                    setTimeout(function () {
                        content.removeClass('is-hide');
                    }, 300);
                    block.find('.loadmore-link').removeClass('loading').delay(300).animate({opacity: 1}, 200);
                }

                /** reload */
                if (inner.hasClass('is-masonry-reload')) {
                    $(inner).isotope('reloadItems');
                    self.$window.on('RB:LazyLoaded', function () {
                        $(inner).isotope('reloadItems');
                    });
                }

                self.checkPagination(block);
                block.dequeue();

                setTimeout(function () {
                    self.$ajax[uuid + '_processing'] = false;
                    self.reinitiateFunctions();
                }, 50);
            });
        }
    };

    /** live search */
    Module.navLiveSearch = function () {

        var navSearch = $('.nav-search-live');
        if (navSearch.length == 0) {
            return;
        }
        navSearch.each(function () {
            var navSearchEl = $(this);
            var input = navSearchEl.find('input[type="search"]');
            var contentWrap = navSearchEl.find('.navbar-search-response');
            var animation = navSearchEl.find('.live-search-animation');
            var submitIcon = navSearchEl.find('.search-form');

            input.attr('autocomplete', 'off');
            var delay = (function () {
                var timer = 0;
                return function (callback, ms) {
                    clearTimeout(timer);
                    timer = setTimeout(callback, ms);
                };
            })();

            input.keyup(function () {
                var param = $(this).val();
                delay(function () {
                    if (param) {
                        submitIcon.addClass('loading');
                        setTimeout(function () {
                            animation.fadeIn(250);
                        }, 250);

                        $.ajax({
                            type: 'POST',
                            url: pixwellParams.ajaxurl,
                            data: {
                                action: 'pixwell_live_search',
                                s: param
                            },
                            success: function (data) {
                                data = $.parseJSON(JSON.stringify(data));

                                animation.fadeOut(250);
                                setTimeout(function () {
                                    submitIcon.removeClass('loading');
                                }, 300);
                                contentWrap.hide().empty().css('height', contentWrap.height());
                                contentWrap.html(data);
                                contentWrap.css('height', 'auto').fadeIn(250);
                                $(window).trigger('RB:LazyLoad');
                            }
                        });
                    } else {
                        contentWrap.fadeOut(300, function () {
                            contentWrap.empty().css('height', 'auto');
                        });
                    }
                }, 300);
            })
        });
    };


    /** single infinite load */
    Module.singleInfiniteLoadNext = function () {

        var self = this;
        var infiniteWrapper = $('#single-post-infinite');
        var infiniteLoadPoint = $('#single-infinite-point');
        var animationIcon = infiniteLoadPoint.find('.loadmore-animation');

        if (infiniteWrapper.length == 0 || infiniteLoadPoint.length == 0) {
            return;
        }

        infiniteWrapper.imagesLoaded(function () {
            self.wPoint['ajaxSingle'] = new Waypoint({
                element: infiniteLoadPoint,
                offset: 'bottom-in-view',
                handler: function (direction) {
                    if (true == self.$ajax['singleProcessing'] || 'up' == direction) {
                        return;
                    }
                    var nextPostURL = infiniteWrapper.data('nextposturl');
                    if (nextPostURL.indexOf('?p=') > -1) {
                        nextPostURL = nextPostURL + '&rbsnp=1';
                    } else {
                        var getParam = 'rbsnp/';
                        if (nextPostURL.charAt(nextPostURL.length - 1) != '/')
                            getParam = '/' + getParam;
                        nextPostURL = nextPostURL + getParam;
                    }

                    self.$ajax['singleProcessing'] = true;
                    animationIcon.css({'display': 'block'}).delay(300).animate({opacity: 1}, 300);

                    $.ajax({
                        type: 'GET',
                        url: nextPostURL,
                        dataType: 'html',
                        success: function (repsone) {
                            repsone = $.parseJSON(JSON.stringify(repsone));
                            repsone = $(repsone);
                            var nextPostURL = repsone.data('nextposturl');
                            if ('undefined' != typeof( nextPostURL) && nextPostURL.length > 0) {
                                infiniteWrapper.data('nextposturl', nextPostURL);
                            } else {
                                infiniteWrapper.removeAttr('id');
                                infiniteLoadPoint.remove();
                            }
                            animationIcon.animate({opacity: 0}, 300).delay(300).css({'display': 'none'});
                            var googleAds = $(repsone).find('.adsbygoogle');
                            var instEmbed = $(repsone).find('.instagram-media');
                            infiniteWrapper.append(repsone);
                            self.$ajax['singleProcessing'] = false;
                            setTimeout(function () {
                                Waypoint.refreshAll();

                                self.reinitiateFunctions();
                                self.loadGoogleAds(googleAds);
                                self.loadInstagram(instEmbed)
                            }, 1);
                        }
                    });
                }
            });
        });

    };


    /** scroll update URL */
    Module.scrollUpdateProcess = function () {

        var self = this;
        var scroll;
        var articleData = [];

        var infiniteWrapper = $('#single-post-infinite');
        if (infiniteWrapper.length == 0) {
            return;
        }

        var articleOuter = infiniteWrapper.find('.single-p-outer');
        if (articleOuter.length > 0) {
            articleOuter.each(function () {
                var article = $(this);
                articleData.push({
                    postID: article.data('postid'),
                    postURL: article.data('postlink'),
                    postTitle: article.find('h1.entry-title').text(),
                    top: article.offset().top,
                    bottom: article.offset().top + article.outerHeight(true)
                });
            });

            if (window.addEventListener) {
                window.addEventListener('scroll', function () {
                    if (self.$singleScrollDelay % 3 == 1) {
                        self.scrollUpdateAction(articleData);
                        self.$singleScrollDelay = 1;
                    } else {
                        self.$singleScrollDelay++;
                    }
                }, false);

            } else if (window.attachEvent) {
                window.attachEvent('onscroll', function () {
                    if (self.$singleScrollDelay % 3 == 0) {
                        self.scrollUpdateAction(articleData);
                        self.$singleScrollDelay = 1;
                    } else {
                        self.$singleScrollDelay++;
                    }
                });
            }
        }

    };

    Module.scrollUpdateAction = function (articleData) {
        var self = this;
        var scrollTop = self.$window.scrollTop();
        articleData.every(function (element) {
            if (scrollTop > element.top && scrollTop < element.bottom) {
                if (element.postID != self.currentArticleID) {
                    self.currentArticleID = element.postID;
                    self.updateLocationHref(element.postURL, element.postTitle);
                }
                return false;
            }
            return true;
        });
    };

    Module.updateLocationHref = function (url, title) {
        var self = this;
        if (window.location.href !== url) {
            if (url !== '') {
                history.replaceState(null, null, url);
                document.title = title;
            }
            self.updateGA(url);
        }
    };

    Module.updateGA = function (url) {
        url = url.replace(/https?:\/\/[^\/]+/i, '');

        if (typeof _gaq !== 'undefined' && _gaq !== null) {
            _gaq.push(['_trackPageview', url]);
        }

        if (typeof ga !== 'undefined' && ga !== null) {
            ga('send', 'pageview', url);
        }

        if (typeof __gaTracker !== 'undefined' && __gaTracker !== null) {
            __gaTracker('send', 'pageview', url);
        }

        if (typeof googletag !== 'undefined') {
            googletag.pubads().refresh();
        }
    };

    /** load google ads */
    Module.loadGoogleAds = function (googleAds) {
        if (typeof window.adsbygoogle !== 'undefined' && googleAds.length) {
            var adsbygoogle;
            googleAds.each(function () {
                (adsbygoogle = window.adsbygoogle || []).push({});
            });
        }
    };

    Module.loadInstagram = function (instEmbed) {
        if ('undefined' !== typeof window.instgrm) {
            window.instgrm.Embeds.process();
        } else if (instEmbed.length && 'undefined' === typeof window.instgrm) {
            var embedJS = document.createElement('script');
            embedJS.src = '//platform.instagram.com/en_US/embeds.js';
            embedJS.onload = function () {
                window.instgrm.Embeds.process();
            };
            this.$body.append(embedJS);
        }
    };

    return Module;

}(PIXWELL_MAIN_SCRIPTS || {}, jQuery));

jQuery(document).ready(function () {
    PIXWELL_MAIN_SCRIPTS.init();
});
