import '../libs/fancyBox/fancybox.umd.js';

import '../libs/greensock/GSAP.min.js';
import '../libs/greensock/ScrollTrigger.min.js';
import '../libs/greensock/SplitText.min.js';
import '../libs/greensock/TextPlugin.min.js';

import '../libs/headroom/headroom.js';
import '../libs/lenis/lenis.min.js';
import '../libs/mouse-follower/mouse-follower.min.js';
import '../libs/swiper/swiper.min.js';
import '../libs/wow/wow.min.js';

(function($) {
    "use strict";
    window.isIE = /(MSIE|Trident\/|Edge\/)/i.test(navigator.userAgent);
    window.windowHeight = window.innerHeight;
    window.windowWidth = window.innerWidth;

    const MathUtils = {
        // map number x from range [a, b] to [c, d]
        map: (x, a, b, c, d) => (x - a) * (d - c) / (b - a) + c,
        // linear interpolation
        lerp: (a, b, n) => (1 - n) * a + n * b,
        // Random float
        getRandomFloat: (min, max) => Math.ceil((Math.random() * (max - min) + min).toFixed(2))
    };

    if (history.scrollRestoration) {
        history.scrollRestoration = 'manual';
    }

    setTimeout(function() {
        window.scrollTo({ top: 0, behavior: 'smooth' })
    });

    gsap.registerPlugin(ScrollTrigger, TextPlugin, SplitText);

    $.fn.numberTextLine = function(opts) {
        $(this).each( function () {
            const el = $(this),
                defaults = {
                    numberLine: 0
                },
                data = el.data(),
                dataTemp = $.extend(defaults, opts),
                options = $.extend(dataTemp, data);

            if (!options.numberLine)
                return false;

            el.bind('customResize', function(event) {
                event.stopPropagation();
                reInit();
            }).trigger('customResize');
            $(window).resize( function () {
                el.trigger('customResize');
            })
            function reInit() {
                const fontSize = parseInt(el.css('font-size')),
                    lineHeight = parseInt(el.css('line-height')),
                    overflow = fontSize * (lineHeight / fontSize) * options.numberLine;

                el.css({
                    'display': 'block',
                    'height': overflow,
                    '-webkit-line-clamp': String(options.numberLine),
                    '-webkit-box-orient': 'vertical',
                    'overflow': 'hidden',
                    'text-overflow': 'ellipsis'
                });
            }
        })
    }

    $.fn.countTo = function(options) {
        options = $.extend({}, $.fn.countTo.defaults, options || {});

        const loops = Math.ceil(options.speed / options.refreshInterval),
            increment = (options.to - options.from) / loops;

        return $(this).each(function() {
            let _this = this,
                loopCount = 0,
                value = options.from,
                interval = setInterval(updateTimer, options.refreshInterval);

            function updateTimer() {
                value += increment;
                loopCount++;
                if( typeof options.break  === 'undefined' ) {
                    if( value.toFixed(options.decimals) > 10 ) {
                        $(_this).html(value.toFixed(options.decimals));
                    } else {
                        $(_this).html('0'+value.toFixed(options.decimals));
                    }
                } else {
                    console.log(value);
                    $(_this).html(value.toFixed(options.decimals).toString().replace('.', options.break));
                }

                if (typeof(options.onUpdate) == 'function') {
                    options.onUpdate.call(_this, value);
                }

                if (loopCount >= loops) {
                    clearInterval(interval);
                    value = options.to;

                    if (typeof(options.onComplete) == 'function') {
                        options.onComplete.call(_this, value);
                    }
                }
            }
        });
    };

    $.fn.countTo.defaults = {
        from: 0,
        to: 100,
        speed: 1000,
        refreshInterval: 50,
        decimals: 0,
        onUpdate: null,
        onComplete: null,
    };

    function debounce(func, wait, immediate) {
        let timeout;
        return function() {
            const context = this, args = arguments;
            const later = function () {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            const callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    }

    const ww = $(window).width();
    const wh = window.outerHeight;

    gsap.registerPlugin(ScrollTrigger);

    const update = (time) => {
        lenis.raf(time * 1000)
    }
    const resize = () => {
        ScrollTrigger.refresh();
    }
    const lenis = new Lenis({
        duration: 1,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        syncTouch: false,
    });
    lenis.on('scroll', () => {
        ScrollTrigger.update();
    })
    gsap.ticker.add(update);
    gsap.ticker.lagSmoothing(0);
    window.addEventListener('resize', resize);
    lenis.scrollTo(0);
    lenis.stop();

    $('.onePageNav .scroll-link').on('click', function(e) {
        e.preventDefault();
        const getId = $(this).attr('href');
        const offset = $(getId).offset().top +-$('.header').height();
        lenis.scrollTo(offset, {
            duration: 1
        });
    });

    const onePageNav = () => {
        const wrap = $('.onePageNav');
        if( wrap.length ) {

            const data = [];
            wrap.find('.scroll-link').each(function() {
                const getId = $(this).attr('href');
                const getOffset = $(this).offset().left;
                data.push({
                    'id': getId,
                    'offset': getOffset,
                });
            });

            Object.keys(data).map(function(key, index) {
                ScrollTrigger.create({
                    trigger: data[key].id,
                    start: 'top center',
                    end: 'bottom bottom',
                    onEnter: () => {
                        wrap.find('li a').removeClass('current');
                        wrap.find(`li a[href="${data[key].id}"]`).addClass('current');
                        wrap.animate({ scrollLeft: data[key].offset }, 300);
                    },
                });

                ScrollTrigger.create({
                    trigger: data[key].id,
                    start: 'bottom bottom-=30%',
                    end: 'bottom+=5% bottom',
                    onEnterBack: () => {
                        wrap.find('li a').removeClass('current');
                        wrap.find(`li a[href="${data[key].id}"]`).addClass('current');

                        if( data[key].id === '#nav-id-1' ) {
                            wrap.animate({ scrollLeft: 0 }, 0);
                        } else {
                            wrap.animate({ scrollLeft: data[key].offset -100 }, 300);
                        }
                    },
                });
            });


            $('.header__humberger').on('click', function() {
                $('.header').toggleClass('header--showMb');
            });
        }
    }

    function loadingJs() {
        const wrap = $('.loading');
        if(wrap.length) {
            // $('body').addClass('body-fix-scroll')
            const center = wrap.find('.loading__percent');
            let numHeight = Math.floor(center.find('ul li').first().height());
            const tl = new TimelineMax();
            tl.to(center.find('.item-a ul'), 0.5, {});
            tl.addLabel('a');
            tl.to(center.find('.item-a ul'), 0.5, { y: numHeight*-MathUtils.getRandomFloat(0, 4), ease: 'none' }, 'a');
            tl.to(center.find('.item-b ul'), 0.5, { y: numHeight*-MathUtils.getRandomFloat(6, 10), ease: 'none', onComplete: () => {
                    gsap.set(center.find('.item-b ul'), { y: 0 })
                } }, 'a');

            tl.to(center.find('.item-b ul'), 0.3, {});
            tl.addLabel('b');
            tl.to(center.find('.item-a ul'), 0.3, { y: numHeight*-MathUtils.getRandomFloat(4, 8), ease: 'none' }, 'b');
            tl.to(center.find('.item-b ul'), 0.3, { y: numHeight*-MathUtils.getRandomFloat(4, 9), ease: 'none' }, 'b');
            tl.to(center.find('.item-b ul'), 0.3, {});
            $(window).on('load', function() {
                tl.addLabel('c');
                tl.to(center.find('.item-a ul'), 0.2, { y: numHeight*-9, ease: 'none' }, 'c');
                tl.to(center.find('.item-b ul'), 0.2, { y: numHeight*-9, ease: 'none' }, 'c');
                tl.to(center.find('.item-b ul'), 0.2, {});
                tl.addLabel('d');
                tl.to(center.find('.item-a ul'), 0.4, { y: numHeight*-10, ease: 'none' }, 'd');
                tl.to(center.find('.item-b ul'), 0.4, { y: numHeight*-10, ease: 'none', xPercent: -12 }, 'd');
                tl.to(center.find('.item-c ul'), 0.4, { y: numHeight*-1, ease: 'none', xPercent: -12 }, 'd');
                tl.to(center.find('.item-b ul'), 0.4, {});
                tl.to(wrap, 1, { yPercent: -100,
                    onStart: () => {
                        wowLoadDoneJs();
                        $('body').removeClass('body-fix-scroll');
                        lenis.start();
                    },
                    onComplete: () => {
                        wrap.remove();
                    }
                });
            });
        }
    }

    function wowReponsiveJs() {
        if ( ww < 768) {
            $('[data-mb-wow]').each(function() {
                const getClass = $(this).attr('data-mb-wow');
                $(this).addClass('wow');
                $(this).addClass(getClass);
            })
        }

        if ( ww >= 768 && ww < 1200) {
            $('[data-md-wow-delay]').each(function() {
                const getTime = $(this).attr('data-md-wow-delay');
                $(this).attr('data-wow-delay', getTime);
            })
        }

        if( ww >= 1200) {
            $('[data-xl-wow-delay]').each(function() {
                const getTime = $(this).attr('data-xl-wow-delay');
                $(this).attr('data-wow-delay', getTime);
            })
        }

        if ( ww < 1200 ) {
            $('[wow-down-xl]').each(function() {
                const getClass = $(this).attr('wow-down-xl');
                $(this).addClass('wow');
                $(this).addClass(getClass);
            })
        }

        if ( ww < 768 ) {
            $('[wow-down-md]').each(function() {
                const getClass = $(this).attr('wow-down-md');
                $(this).addClass('wow');
                $(this).addClass(getClass);
            })
        }
    }

    function wowLoadDoneJs() {
        const wow = new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            mobile: true,
            live: true,
            callback: function (box) {
                $(box).addClass('effect');
                $(box).removeClass('fix');
                setTimeout(() => {
                    $(box).addClass('done');
                }, 600);
            },
            scrollContainer: null
        });
        wow.init();
    }

    function dataImageMobileUrl() {
        const update = function () {
            const ww = $(window).outerWidth();
            if (ww < 768) {
                $('[data-img-mb]').each(function () {
                    const self = $(this),
                        url = self.attr('data-img-mb');
                    self.attr('src', url);
                });

                $('[data-bg-mb]').each(function () {
                    const self = $(this),
                        url = self.attr('data-bg-mb');
                    self.css('background-image', 'url(' + url + ')');
                });
                $('[data-mb-xlink]').each(function () {
                    const self = $(this),
                        url = self.attr('data-mb-xlink');
                    self.attr('xlink:href', url);
                });

            } else {
                $('[data-img-pc]').each(function () {
                    const self = $(this),
                        url = self.attr('data-img-pc');
                    self.attr('src', url);
                });

                $('[data-bg-pc]').each(function () {
                    const self = $(this),
                        url = self.attr('data-bg-pc');
                    self.css('background-image', 'url(' + url + ')');
                });

                $('[data-pc-xlink]').each(function () {
                    const self = $(this),
                        url = self.attr('data-pc-xlink');
                    self.attr('xlink:href', url);
                });
            }

            if (ww > 1279) {
                $('[data-img-pcc]').each(function () {
                    const self = $(this),
                        url = self.attr('data-img-pcc');
                    self.attr('src', url);
                });

                $('[data-bg-pcc]').each(function () {
                    const self = $(this),
                        url = self.attr('data-bg-pcc');
                    self.css('background-image', 'url(' + url + ')');
                });
            }

            $('[data-img-sm]').each(function () {
                const self = $(this),
                    url = self.attr('data-img-sm');
                self.attr('src', url);
            });

            $('[data-bg-sm]').each(function () {
                const self = $(this),
                    url = self.attr('data-bg-sm');
                self.css('background-image', 'url(' + url + ')');
            });
        };
        update();
        $(window).on('resize', debounce(update, 200));
    }

    function headerJs() {
        const header = $('.header');
        const megamenu = $('.menuMobile');

        if(header.length) {
            const headeroom = new Headroom(document.querySelector("header"), {
                tolerance: 4,
                offset: 100,
                classes: {
                    pinned: "header-pin",
                    unpinned: "header-unpin"
                },
            });
            headeroom.init();
        }

        const showMenu = () => {
            const btn = $('.header__humberger');

            megamenu.find('.item__list').each(function() {
                const self = $(this);
                let i = 0;
                self.find('.f-item').each(function() {
                    $(this).find('.f-item__title.fix-delay').css('--delay', Number(i*0.2).toFixed(1)+'s');
                    $(this).find('.f-item__list li.fix-delay').css('--delay', (Number((i*0.2)+0.2).toFixed(1))+'s');
                    i++;
                });
                i = 0;
            });

            btn.on('click', function() {
                if( header.hasClass('header--showmenu') ) {
                    header.removeClass('header--showmenu');
                    megamenu.removeClass('show-megamenu');
                    lenis.start();
                    // $('body').removeClass('body-fix-scroll');
                } else {
                    header.addClass('header--showmenu');
                    megamenu.addClass('show-megamenu');
                    lenis.stop();
                    // $('body').addClass('body-fix-scroll');
                }
            });

            megamenu.find('a[data-trigger]').on('click', function(e) {
                e.preventDefault();
                const self = $(this);
                const getId = self.attr('data-trigger');
                self.closest('.item').addClass('hide-item');
                megamenu.find('.item-sub').removeClass('show-sub');
                megamenu.find(getId).addClass('show-sub');
            });

            megamenu.find('.item-back').on('click', function(e) {
                e.preventDefault();
                $(this).closest('.item-sub').removeClass('show-sub');
                megamenu.find('.item').removeClass('hide-item');
            })
        }
        showMenu();
    }

    function tabboxJs() {
        const tabWrap = $('.tabbox');
        if(tabWrap.length) {
            tabWrap.each(function() {
                const self = $(this);
                const link = self.find('.tabbox__list');
                const panel = self.find('.tabbox__content .panel');

                link.find('a').on('click', function(e) {
                    e.preventDefault();
                    const _this = $(this);

                    if( !_this.hasClass('current') ) {
                        link.find('a').removeClass('current');
                        _this.addClass('current');
                        panel.removeClass('show');
                        const getId = _this.attr('href');
                        $(getId).addClass('show');
                    }
                })
            });
        }
    }

    function accordionJs() {
        const wrap = $('.accordion');
        if( wrap.length ) {
            wrap.each(function() {
                const self = $(this);
                const panel = self.find('.accordion__panel'),
                    title = panel.find('.accordion__title'),
                    dataFirst = self.attr('data-first');

                title.on('click', function() {
                    const el = $(this),
                        _closest = el.closest('.accordion'),
                        _parant = el.closest('.accordion__panel'),
                        _content = _parant.find('.accordion__content');

                    if( dataFirst ) {
                        if( _parant.hasClass('show') ) {
                            _content.slideUp(function()  {
                                _content.removeClass('active');
                                _parant.removeClass('show');
                            });
                        }else {
                            panel.removeClass('active');
                            _parant.addClass('active');
                            _closest.find('.accordion__panel.show .accordion__content').slideUp();
                            _content.slideDown(function() {
                                panel.removeClass('show');
                                _parant.addClass('show');
                            });
                        }
                    }else {
                        if( !_parant.hasClass('active')) {
                            if( _parant.hasClass('show') ) {
                                _closest.find('.accordion__panel').removeClass('show');
                                _content.slideUp(function()  {
                                    _content.removeClass('active');
                                });
                            }else {
                                panel.removeClass('active');
                                _parant.addClass('active');
                                _closest.find('.accordion__panel.show .accordion__content').slideUp();
                                _content.slideDown(function() {
                                    panel.removeClass('show');
                                    _parant.addClass('show');
                                });
                            }
                        }
                    }
                });
            });

            const fixAcc1 = $('.sec-HLVCGia');
            if( fixAcc1.length ) {
                if( ww > 1199 ) {
                    fixAcc1.find('.accordion__panel').each(function() {
                        const self = $(this);
                        const getHeight = self.find('.accordion__title').outerHeight();
                        self.find('.accordion__content').css('margin-top', -getHeight+'px');
                    });
                }
            }
        }
    }

    function backToTopJs() {
        const wrap = $('.btn-backtotop');
        if( wrap.length ) {
            wrap.on('click', function(e) {
                e.preventDefault();
                $('html, body').animate({scrollTop:0}, 500);
            });

            const update = () => {
                const scroll = $(window).scrollTop();
                if( scroll >= (wh*1.5) ) {
                    wrap.closest('.chatbox-fixed').addClass('show');
                } else {
                    wrap.closest('.chatbox-fixed').removeClass('show');
                }
            }
            update();
            $(window).on('scroll', update);
        }
    }

    function selectLangJs() {
        $('.select-lang__label').on('click', function() {
            $(this).parent().toggleClass('show');
        });

        $(document).click(function(e){
            const target = e.target;
            if (!$(target).is('.select-lang__label') && !$(target).parents().is('.select-lang__label')){
                $('.select-lang').removeClass('show');
            }
        });
    }

    function heroSlideJs() {
        const wrap = $('.sec-hero');
        if( wrap.length ) {
            wrap.each(function() {
                const self = $(this);
                const slideDom = self.find('.swiper');
                const slide = new Swiper(slideDom[0], {
                    slidesPerView: 1,
                    spaceBetween: 0,
                    speed: 700,
                    pagination: {
                        el: wrap.find('.swiper-pagination2')[0],
                        clickable: true,
                    },
                    loop: true,
                    on: {
                        click: function () {
                            slide.slideNext();
                        },
                    },
                });
            });
        }
    }

    function homeKhoaHocJs() {
        const wrap = $('.sec-homeKhoaHoc');
        if( wrap.length ) {
            const slideContent = wrap.find('.swiper-content');
            const slideThumb = wrap.find('.swiper-thumb');

            if( ww < 768 ) {
                const slide1 = new Swiper(slideContent[0], {
                    slidesPerView: 1,
                    spaceBetween: 0,
                    speed: 700,
                    pagination: {
                        el: wrap.find('.swiper-pagination')[0],
                        clickable: true,
                    },
                });
                const slide2 = new Swiper(slideThumb[0], {
                    slidesPerView: 3,
                    spaceBetween: 15,
                    speed: 700,
                    breakpoints: {
                        1200: {
                            slidesPerView: 3,
                            spaceBetween: 40,
                        },
                    }
                });

                slideThumb.find('.swiper-slide-active').addClass('current');
                slide1.on('slideChange', function() {
                    setTimeout(function() {
                        const getIndex = slideContent.find('.swiper-slide-active').attr('data-index');
                        slide2.slideTo(getIndex);
                        console.log(getIndex);
                        slideThumb.find('.swiper-slide').removeClass('current');
                        slideThumb.find(`.swiper-slide[data-index="${getIndex}"]`).addClass('current');

                    });
                });

                slideThumb.find('.swiper-slide').on('click', function() {
                    const getIndex = $(this).attr('data-index');
                    slide1.slideTo(getIndex);
                });
            } else {
                const getWidthSlide = slideContent.find('.swiper-slide').first().width();
                const tl = new TimelineMax({
                    scrollTrigger: {
                        trigger: wrap.find('.item-wrap')[0],
                        start: 'top top',
                        end: 'bottom bottom',
                        scrub: 1,
                    }
                });

                let i = 0;
                slideContent.find('.swiper-slide').each(function() {
                    const setLine = slideThumb.find('.swiper-slide').eq(i);
                    const setLineBack = slideThumb.find(`.swiper-slide[data-index="${i-1}"]`);
                    tl.to(slideContent.find('.swiper-wrapper'), 0.5, {});
                    tl.addLabel('a');
                    tl.to(slideContent.find('.swiper-wrapper'), 1, { x: (getWidthSlide*i)*-1, ease: 'none'});
                    tl.to(setLine.find('.f-line span'), 1, { width: '100%', ease: 'none'}, 'a');
                    tl.to(setLine, 0.1, { opacity: 1, ease: 'none'}, 'a');
                    tl.to(setLine.find('.f-num')[0], 0.2, { padding: '0 5%', ease: 'none'}, 'a');
                    tl.to(setLine.find('.f-title')[0], 0.2, { padding: '0 5%', ease: 'none'}, 'a');
                    if( i > 0 ) {
                        tl.to(setLineBack.find('.f-line span'), 1, { autoAlpha: 0}, 'a');
                        tl.to(setLineBack, 0.1, { opacity: .5, ease: 'none' }, 'a');
                        tl.to(setLineBack.find('.f-num')[0], 0.2, { padding: '0 0%', ease: 'none'}, 'a');
                        tl.to(setLineBack.find('.f-title')[0], 0.2, { padding: '0 0%', ease: 'none'}, 'a');
                    }
                    i++;
                });
                tl.to(slideContent.find('.swiper-wrapper'), 0.5, {});
            }
        }
    }

    function homeDoiNguJs() {
        const wrap = $('.sec-homeDoiNgu');
        if( wrap.length ) {
            if( ww > 1199 ) {
                const pcDom = wrap.find('.item-slidePc');
                const scroll = pcDom.find('.item-scroll');
                const items = pcDom.find('.item');
                const getFirstItem = pcDom.find('.item-first');
                const getFirstItemNext = getFirstItem.next();
                const getWFirstItem = getFirstItem.outerWidth();
                const getHFirstItem = getFirstItem.outerHeight();
                const getWFirstItemNext = getFirstItemNext.outerWidth();
                const btnPrev = pcDom.find('.item-btn-prev');
                const btnNext = pcDom.find('.item-btn-next');
                gsap.set(getFirstItem, { width: getWFirstItem, autoAlpha: 1, })
                gsap.set(getFirstItem.find('.item-img'), { borderRadius: 20 })
                gsap.set(scroll, { height: getHFirstItem })
                getFirstItem.removeClass('item-first');
                btnPrev.addClass('disable');
                const tl = new TimelineMax({
                    paused: true,
                    defaultEase: 'none',
                    repeat: 0,
                    onUpdate: function() {
                        if ( tl.progress() === 0 ) {
                            btnPrev.addClass('disable');
                        } else if (tl.progress() === 1) {
                            btnNext.addClass('disable');
                        } else {
                            pcDom.find('.item-btn span').removeClass('disable');
                        }
                    },
                });

                let numUp = 1;
                items.each(function() {
                    if( numUp < items.length ) {
                        tl.addLabel(`a-${numUp}`);
                        tl.to(scroll, 1, { x: getWFirstItemNext*-numUp, ease: 'none' }, `a-${numUp}`);
                        tl.to(scroll.find(`.item-${numUp}`), 1, { width: getWFirstItemNext, autoAlpha: 0.6, ease: 'none' }, `a-${numUp}`);
                        tl.to(scroll.find(`.item-${numUp} .item-img`), 1, { borderRadius: 0 }, `a-${numUp}`);
                        tl.to(scroll.find(`.item-${numUp+1}`), 1, { width: getWFirstItem, autoAlpha: 1, ease: 'none', }, `a-${numUp}`);
                        tl.to(scroll.find(`.item-${numUp+1} .item-img`), 1, { borderRadius: 20 }, `a-${numUp}`);
                    }
                    numUp +=1;
                });

                const slideDom = pcDom.find('.item-content .swiper');
                const slide = new Swiper(slideDom[0], {
                    slidesPerView: 1,
                    spaceBetween: 20,
                    speed: 1000,
                    allowTouchMove: false
                });

                const totalTime = tl.totalDuration();
                const totalHalf = 1 / totalTime;
                let step = 0;

                btnPrev.on('click', function() {
                    step = step - totalHalf;
                    if( step < 0 ) {
                        step = 0;
                    }
                    TweenLite.to(tl, 1, {progress: step});
                    slide.slidePrev();
                });
                btnNext.on('click', function() {
                    step = step + totalHalf;
                    if( step > 1 ) {
                        step = 1;
                    }
                    TweenLite.to(tl, 1, {progress: step});
                    slide.slideNext();
                });
                pcDom.find('.item').on('click', function() {
                    const getIndex = $(this).attr('data-index');
                    step = getIndex*totalHalf;
                    TweenLite.to(tl, 1, {progress: step});
                    slide.slideTo(getIndex);
                });

            } else {
                const slideDom = wrap.find('.item-slideMb .swiper');
                const slide = new Swiper(slideDom[0], {
                    slidesPerView: 1,
                    spaceBetween: 14,
                    speed: 700,
                    pagination: {
                        el: slideDom.find('.swiper-pagination')[0],
                        clickable: true,
                    },
                    breakpoints: {
                        768: {
                            spaceBetween: 25,
                        },
                    }
                });
            }
        }
    }

    function aboutHeroJs() {
        const wrap = $('.sec-aboutHero');
        if( wrap.length ) {
            const content = wrap.find('.item-contentPc');
            const imgInnerDom = wrap.find('.item-img');
            const bgDom = wrap.find('.item-bg');

            if( ww > 1199 ) {
                const getArray = eval(content.find('.item-text-right .f-text').attr('data-text'));
                const tlText = new TimelineMax({ paused: true });
                getArray.shift();

                getArray.forEach(function(e) {
                    tlText.to(imgInnerDom, 0.3, {  });
                    tlText.to(content.find('.item-text-right .f-text'), 1, {
                        text: {
                            value: e,
                            type: 'diff',
                            speed: 20,
                            ease: 'none',
                        },
                    });
                });
                tlText.to(imgInnerDom,  0.5 ,{ autoAlpha: 0 }, '-=1');
                tlText.to(bgDom,  0.5 ,{ autoAlpha: 1 }, '-=1');

                const tl = new TimelineMax({
                    scrollTrigger: {
                        trigger: wrap[0],
                        start: 'top top',
                        end: 'bottom bottom',
                        scrub: true,
                        onEnter: () => {
                            const getTop = imgInnerDom[0].getBoundingClientRect().y;
                            const getLeft = imgInnerDom[0].getBoundingClientRect().x;
                            const getRight = $(window).width() - (getLeft + imgInnerDom.width());
                            const getBottom = $(window).height() - (getTop + imgInnerDom.height());

                            gsap.set(bgDom[0], { clipPath: `inset(${getTop}px ${getRight}px ${getBottom}px ${getLeft}px)` });
                        }
                    }
                });
                tl.addLabel('a');
                tl.to(content.find('.item-text-left .f-line'), 1, { clipPath: 'inset(0 100% 0 0)' }, 'a');
                tl.to(content.find('.item-text-right .f-line'), 1, { clipPath: 'inset(0 0 0 100%)' }, 'a');
                tl.to(content.find('.item-text-left'), 2, { xPercent: 100 }, 'a');
                tl.to(content.find('.item-text-right'), 2, { xPercent: -100,
                    onUpdateParams: ["{self}"],
                    onUpdate: function() {
                        const step = this.progress();
                        tlText.progress(step);
                    }
                }, 'a');
                tl.addLabel('c');
                tl.to(bgDom[0], 2, { clipPath: `inset(0px 0px)`, ease: 'none' }, 'c');
                tl.to(content.find('.item-text-left'), 0.5, { autoAlpha: 0 }, 'c');
                tl.to(content.find('.item-text-right'), 0.5, { autoAlpha: 0 }, 'c');
                tl.to(bgDom.find('.f-bgFix'), 2, { scale: 1, ease: 'none' }, 'c');
                tl.to(bgDom.find('.f-bgFix'), 0.5, {});
            }
        }
    }

    function aboutHistoryJs() {
        const wrap = $('.sec-aboutHistory');
        if( wrap.length ) {
            if( ww > 767 ) {
                const head = wrap.find('.item-head');
                const horizontal = wrap.find('.item-horizontal');
                const timeline = wrap.find('.item-timeline');
                const center = horizontal.find('.h-item-center');
                const centerWidth = center.width();
                const centerFirstHalf = center.find('.h-imgMarker').first().width() / 2;
                const wwHalf = $(window).width() / 2;
                const getX = center[0].getBoundingClientRect().x;
                const totalWidth = getX-wwHalf+centerFirstHalf;
                gsap.set(horizontal.find('.h-scroll'), { x: -totalWidth });

                const slideJs = new Swiper(head.find('.swiper')[0], {
                    slidesPerView: 1,
                    spaceBetween: 15,
                    effect: 'fade',
                    speed: 1000,
                    allowTouchMove: false,
                });

                const tl = new TimelineMax({
                    scrollTrigger: {
                        trigger: wrap[0],
                        start: 'top top',
                        end: 'bottom bottom',
                        scrub: true,
                        onUpdate: (e) => {
                            let progress = e.progress.toFixed(3);
                            horizontal[0].scrollTo((center[0].scrollWidth - centerFirstHalf) * progress,0);
                        }
                    }
                });
                tl.addLabel('a');
                tl.to(timeline.find('.f-lineImg'), { xPercent: -20, ease: 'none' }, 'a');

                const markes = $('.h-item-center').find('.h-imgMarker');
                const markesImg = horizontal.find('.h-img2');
                markes.each(function() {
                    const selfItem = $(this);
                    const getIndex = selfItem.attr('data-index');
                    const getYear = selfItem.attr('data-year');
                    gsap.to(selfItem, {
                        scrollTrigger: {
                            trigger: selfItem,
                            start: "center center",
                            end: "right center",
                            scrub: true,
                            horizontal: true,
                            scroller:  '.item-horizontal',
                            onUpdate: () => {
                                slideJs.slideTo(getIndex);
                                gsap.to(timeline.find('.f-year'), 1, {
                                    text: {
                                        value: getYear,
                                        type: 'diff',
                                        speed: 20,
                                    },
                                    ease: 'none',
                                });
                            }
                        }
                    });
                });
                gsap.set(markesImg.find('span'), { xPercent: 50 });
                markesImg.each(function() {
                    const itemImg = $(this);
                    gsap.to(itemImg.find('span'), {
                        xPercent: -50,
                        ease: 'none',
                        scrollTrigger: {
                            trigger: itemImg,
                            start: "left right",
                            end: "right left",
                            scrub: true,
                            horizontal: true,
                            scroller:  '.item-horizontal',
                        }
                    });
                });
            } else {
                const slideMb = wrap.find('.item-mobileSlide');
                const timeline = wrap.find('.item-timeline');

                const slideJs = new Swiper(slideMb.find('.swiper')[0], {
                    slidesPerView: 1,
                    spaceBetween: 15,
                    speed: 700,
                    autoHeight: false,
                });

                slideJs.on('slideChange', function () {
                    setTimeout(function() {
                        const getCurrent = slideMb.find('.swiper-slide-active');
                        const getIndex = getCurrent.attr('data-index');
                        const getDate = getCurrent.attr('data-date');
                        timeline.find('.f-year').text(getDate);
                    });
                });

                slideJs.on('sliderMove', function (e) {
                    const fix = e.progress.toFixed(1)*50;
                    gsap.to(timeline.find('.f-lineImg'), 0.5, { xPercent: -fix });
                });
                slideJs.on('slideChangeTransitionStart', function (e) {
                    lenis.stop();
                });
                slideJs.on('slideChangeTransitionEnd', function (e) {
                    lenis.start();
                });
            }
        }
    }

    function aboutBLDJs() {
        const wrap = $('.sec-aboutBLD');
        if( wrap.length ) {
            const slideDom = wrap.find('.swiper');
            const slide = new Swiper(slideDom[0], {
                slidesPerView: 1,
                spaceBetween: 8,
                speed: 700,
                breakpoints: {
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 14,
                    },
                    1200: {
                        slidesPerView: 'auto',
                        spaceBetween: 20,
                    },

                    1700: {
                        slidesPerView: 3,
                        spaceBetween: 40,
                    },
                }
            });
        }
    }

    function aboutDoiTac() {
        const wrap = $('.sec-aboutDoitac');
        if( wrap.length ) {
            const widthMax = 1920;
            const getRatio =  widthMax / wrap.width();
            wrap.find('.f-img .f-inner').each(function() {
                const getWidth = $(this).width();
                $(this).css('--widthImg', getWidth);
                $(this).css('--ratioImg', String(getRatio));
            });
        }
    }

    function titleEffectJs() {
        const effectFirst = () => {
            const effect1 = $('.title-effect-1');
            const effect2 = $('.title-effect-2');
            if( effect1.length ) {
                effect1.each(function() {
                    const self = $(this);
                    SplitText.create(self[0], {
                        type: "lines",
                        wordsClass: 'word',
                        linesClass: 'line',
                        charsClass: 'char',
                    });
                })
            }
            if( effect2.length ) {
                effect2.each(function() {
                    SplitText.create($(this)[0], {
                        type: "lines",
                        linesClass: 'line',
                        onSplit(self) {

                            if( $(self.elements[0]).hasClass('style-effect')) {
                                const tl = new TimelineMax({ repeat: -1 });
                                self.lines.forEach((e) => {
                                    tl.to(e, 1, {
                                        clipPath: 'inset(0 0% 0 0)',
                                        ease: 'none'
                                    });
                                });
                                tl.to(effect2, 1, {});
                            }
                        }
                    });
                })
            }
        }
        effectFirst();
    }

    function HVImgGridJs() {
        const wrap = $('.sec-HVImgGrid');
        if( wrap.length ) {
            if( ww > 767 ) {
                const getHeight = wrap.find('.title-text').height();
                const box1 = wrap.find('.f-box-1')[0].getBoundingClientRect().y;
                const box2 = wrap.find('.f-box-2')[0].getBoundingClientRect().top;
                let total = box2 - box1;
                if( wrap.hasClass('style-revest') ) {
                    total = box1 - box2;
                }

                if( getHeight > total ) {
                    gsap.set(wrap.find('.item-grid'), { marginTop: - (total - 20) });
                } else {
                    gsap.set(wrap.find('.item-grid'), { marginTop: -getHeight });
                }

            }
        }
    }

    function dataStickyFix() {
        const wrap = $('[data-stickyFix]');
        if( wrap.length ) {
            const inner = wrap.closest(wrap.attr('data-stickyFix'));
            const ulScroll = wrap.find('.ul-menu');
            const ST = ScrollTrigger.create({
                trigger: inner[0],
                start: 'top top',
                end: `bottom top+=${wrap.outerHeight()}px`,
                invalidateOnRefresh : true,
                onEnter: () => {
                    $('.header').addClass('fix-unpin');
                },
                onLeave: () => {
                    $('.header').removeClass('fix-unpin');
                },
                onEnterBack: () => {
                    $('.header').addClass('fix-unpin');
                },
                onLeaveBack: () => {
                    $('.header').removeClass('fix-unpin');
                },
                onUpdate: self => {
                    // let progress = self.progress.toFixed(3);
                    // ulScroll[0].scrollTo((ulScroll[0].scrollWidth - window.innerWidth) * progress,0);
                },
            });
            ulScroll.find('a').on('click', function() {
                setTimeout(function() {
                    ST.refresh();
                }, 500);
            });
        }
    }

    function roomBoxJs() {
        const wrap = $('.roomBox__imgSlide');
        if( wrap.length ) {
            wrap.each(function() {
                let pcItem = 3;
                const self = $(this);
                const slideBig = self.find('.swiper-big');
                const slideThumb = self.find('.swiper-thumb');
                if( self.hasClass('view-4') ) {
                    pcItem = 4;
                }
                const slide1 = new Swiper(slideBig[0], {
                    slidesPerView: 1,
                    spaceBetween: 8,
                    speed: 700,
                    allowTouchMove: false,
                    breakpoints: {
                        768: {
                            spaceBetween: 14,
                        },
                        1200: {
                            spaceBetween: 20,
                        },

                        1700: {
                            spaceBetween: 15,
                        },
                    }
                });
                const slide2 = new Swiper(slideThumb[0], {
                    slidesPerView: 3,
                    spaceBetween: 8,
                    speed: 700,
                    breakpoints: {
                        768: {
                            slidesPerView: 3,
                            spaceBetween: 12,
                        },
                        1200: {
                            slidesPerView: pcItem,
                            spaceBetween: 15,
                        },
                    }
                });

                slide1.on('slideNextTransitionStart', function (e) {
                    setTimeout(function() {
                        slide2.slideTo(e.activeIndex);
                    });
                });

                slide1.on('slidePrevTransitionStart', function (e) {
                    setTimeout(function() {
                        slide2.slideTo(e.activeIndex-1);
                    });
                });

                slideThumb.find('.swiper-slide').on('click', function() {
                    const el = $(this);
                    const getIndex = el.attr('data-index');
                    slideThumb.find('.swiper-slide').removeClass('current');
                    el.addClass('current');
                    slide1.slideTo(getIndex);
                });
            });
        }
    }

    function counterJs() {
        const wrap = $('.counterJs');
        if( wrap.length ) {
            wrap.each(function() {
                const self = $(this);
                const getTo = self.attr('data-to');
                function loadImage () {
                    self.countTo({
                        to: getTo
                    })
                };

                ScrollTrigger.create({
                    trigger: self,
                    start: 'top bottom',
                    end: 'bottom top',
                    onEnter: loadImage,
                    onEnterBack: loadImage,
                    invalidateOnRefresh: true,
                });
            });
        }
    }

    wowReponsiveJs()
    dataImageMobileUrl();
    loadingJs();
    headerJs();
    accordionJs();
    tabboxJs();
    heroSlideJs();
    homeKhoaHocJs();
    aboutBLDJs();
    roomBoxJs();
    selectLangJs();
    backToTopJs();

    $(window).on('load', function() {
        // loadingVideoJs();
        onePageNav();
        titleEffectJs();
        homeDoiNguJs();
        aboutHeroJs();
        aboutHistoryJs();
        HVImgGridJs();
        dataStickyFix();
        counterJs();
        aboutDoiTac();
        if( ww > 1199 ) {
            const cursor = new MouseFollower();
        }
        setTimeout(function() {
            $('body').addClass('body-load-done');
        }, 20)
    });

})(jQuery);