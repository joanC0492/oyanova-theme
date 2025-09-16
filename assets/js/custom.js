jQuery(document).ready(function ($) {
    var window_size = jQuery(window).width();
    var homeURL = custom_call.homeurl;

    var $firstCalloutBox = jQuery(".feature-box").first();
    var hasAnimated = false;

    if (window_size > 991) {
        // Only proceed if the call-out box exists on the page
        if ($firstCalloutBox.length > 0) {
            // Add AOS attribute dynamically if needed

            var triggerOffset = $firstCalloutBox.offset().top - window.innerHeight * 0.45;

            // Hide the callout initially
            $firstCalloutBox.css({
                opacity: "0",
                transform: "scale(.6)",
            });

            function handleScroll() {
                if (hasAnimated) return; // Do nothing if animation has already occurred

                var scrollTop = $(window).scrollTop();

                // Trigger the animation when the user scrolls slightly past the top of the call-out box
                if (scrollTop > triggerOffset) {
                    $firstCalloutBox.css("opacity", "1");
                    $firstCalloutBox.css("transform", "translateZ(0) scale(1)");
                    $firstCalloutBox.addClass("aos-animate"); // Trigger AOS animation (zoom-in)

                    hasAnimated = true; // Set flag to indicate animation has occurred
                }
            }

            // Handle scroll event
            $(window).on("scroll", handleScroll);

            // Trigger scroll handler on page load if the user is at or past the triggerOffset
            handleScroll();
        }
    } else {
        // Only proceed if the call-out box exists on the page
        if ($firstCalloutBox.length > 0) {
            // Add AOS attribute dynamically if needed

            var triggerOffset = $firstCalloutBox.offset().top - window.innerHeight * 0.45;

            $firstCalloutBox.hide();

            // Hide the callout initially
            $firstCalloutBox.css({
                opacity: "0",
                transform: "scale(.6)",
            });

            function handleScroll() {
                if (hasAnimated) return; // Do nothing if animation has already occurred

                var scrollTop = $(window).scrollTop();

                // Trigger the animation when the user scrolls slightly past the top of the call-out box
                if (scrollTop > triggerOffset) {
                    $firstCalloutBox.show();

                    setTimeout(() => {
                        $firstCalloutBox.css("opacity", "1");
                        $firstCalloutBox.css("transform", "translateZ(0) scale(1)");
                        $firstCalloutBox.addClass("aos-animate"); // Trigger AOS animation (zoom-in)

                        hasAnimated = true; // Set flag to indicate animation has occurred
                    }, 500);
                }
            }

            // Handle scroll event
            $(window).on("scroll", handleScroll);

            // Trigger scroll handler on page load if the user is at or past the triggerOffset
            handleScroll();
        }
    }

    //remove all the "title" attribute
    jQuery("[title]").removeAttr("title");

    //AOS animation settings
    AOS.init({
        startEvent: "DOMContentLoaded",
        initClassName: "aos-init",
        useClassNames: true,
        once: true,
        easing: "ease-in-out", // Animation easing
    });

    // Close the popup boxes
    jQuery(document).on("click", ".close-feature-box", function () {
        var $popupBox = $(this).closest(".feature-popup-box");

        $popupBox.css({
            transform: "scale(0.8)",
            opacity: "0",
            transition: "transform 0.5s ease, opacity 0.5s ease",
        });

        setTimeout(function () {
            $popupBox.hide(); // Hide after the animation
        }, 500); // Matches the transition duration

        // For mobile screens, ensure the box is hidden correctly
        if (window_size <= 991) {
            $popupBox.css({
                display: "none",
            });
        }
    });

    // JavaScript - Oyanova Bubbles Section for Mobile
    if (window_size <= 991) {
        // Hide all contents initially and set the first item as active
        jQuery(".foster-category-content .foster-circle-wp").hide();
        jQuery(".foster-category-content").first().addClass("active");
        jQuery(".foster-category-content").first().find(".foster-circle-wp").slideDown();

        // Handle click event for category titles
        jQuery(".foster-category-content .foster-category-title").click(function (e) {
            e.preventDefault();
            var $this = jQuery(this);
            var $categoryContent = $this.closest(".foster-category-content"); // Select the closest foster-category-content
            var $content = $this.next(".foster-circle-wp");

            // Check if the parent content is already active
            if (!$categoryContent.hasClass("active")) {
                jQuery(".foster-category-content").removeClass("active");
                jQuery(".foster-category-content .foster-circle-wp").slideUp();

                // Add active class to the clicked category content and slide down its content
                $categoryContent.addClass("active");
                $content.stop(true, true).slideDown();
            } else {
                // If the parent content is already active, just slide up the content
                $categoryContent.removeClass("active");
                $content.stop(true, true).slideUp();
            }
        });
    }

    // Select 2 Form JS Start - Partnership form
    if (jQuery(".select-for-involving").length > 0) {
        jQuery(".select-for-involving").select2({
            closeOnSelect: false,
            placeholder: "Select an option",
            allowHtml: true,
            allowClear: true,
            tags: false,
        });
        // Select 2 Form JS End
    }

    /* FAQ Page accordion */
    jQuery(".faq-content-box-wp .faq-content").hide();
    jQuery(".faq-content-box-wp > div:eq(0)").addClass("active");
    jQuery(".faq-content-box-wp > div:eq(0) .faq-content").slideDown();
    jQuery(".faq-content-box-wp .faq-box h5").click(function (j) {
        var dropDown = jQuery(this).closest("div").find(".faq-content");
        jQuery(this).closest(".faq-content-box-wp").find(".faq-box .faq-content").not(dropDown).slideUp();
        if (jQuery(this).parent().hasClass("active")) {
            jQuery(this).parent().removeClass("active");
        } else {
            jQuery(this).closest(".faq-content-box-wp").find(".faq-box.active").removeClass("active");
            jQuery(this).parent().addClass("active");
        }
        dropDown.stop(!1, !0).slideToggle();
        j.preventDefault();
    });

    /******************** Home page testimonial slider start ***********/
    jQuery(document).ready(function ($) {
        $(".testimonial-slider").slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            centerMode: true,
            cssEase: "linear",
            dots: false,
            arrows: true,
            prevArrow: `<button class="slide-arrow prev-arrow"><img src="${homeURL}/wp-content/uploads/2024/09/gradient-prev-arrow.png" width='14' height='26' alt='Previous Arrow Icon'></button>`,
            nextArrow: `<button class="slide-arrow next-arrow"><img src="${homeURL}/wp-content/uploads/2024/09/gradient-next-arrow.png" width='14' height='26' alt='Next Arrow Icon'></button>`,
            autoplay: false,
            autoplaySpeed: 6000,
            swipe: false,
            // touchMove: false,
            // draggable: false,
            rows: 0,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false,
                    },
                },
            ],
        });

        $(".testimonial-slider .slick-current").addClass("active");
        $(".testimonial-slider .slick-current").next(".slick-slide").addClass("next1");
        $(".testimonial-slider .slick-current").prev(".slick-slide").addClass("prev1");
        $(".testimonial-slider .slick-slide.next1").next(".slick-slide").addClass("next2");
        $(".testimonial-slider .slick-slide.prev1").prev(".slick-slide").addClass("prev2");

        // On before slide change
        $(".testimonial-slider").on("beforeChange", function (event, { slideCount: count }, currentSlide, nextSlide) {
            let selectors = [nextSlide, nextSlide - count, nextSlide + count].map((n) => `[data-slick-index="${n}"]`).join(", ");
            $(".testimonial-slider .slick-slide").removeClass("active").removeClass("next1").removeClass("next2").removeClass("prev1").removeClass("prev2");
            $(selectors).addClass("active");
            $(".testimonial-slider .slick-slide.active").next(".slick-slide").addClass("next1");
            $(".testimonial-slider .slick-slide.active").prev(".slick-slide").addClass("prev1");
            $(".testimonial-slider .slick-slide.next1").next(".slick-slide").addClass("next2");
            $(".testimonial-slider .slick-slide.prev1").prev(".slick-slide").addClass("prev2");
        });

        // Smooth navigation to clicked slide
        $(".testimonial-slider a[data-slide]").click(function (e) {
            e.preventDefault();

            // Get the clicked slide number
            let slideno = $(this).data("slide") - 1;

            // Access the slick object from the slider element
            let slickInstance = $(".testimonial-slider").slick("getSlick");

            // Get the current slide index
            let currentIndex = slickInstance.currentSlide;

            // Get the total number of slides
            let slideCount = slickInstance.slideCount;

            // Calculate the shortest path for infinite scrolling
            let forwardDistance = slideno >= currentIndex ? slideno - currentIndex : slideCount - currentIndex + slideno;
            let backwardDistance = currentIndex >= slideno ? currentIndex - slideno : currentIndex + slideCount - slideno;

            if (forwardDistance <= backwardDistance) {
                $(".testimonial-slider").slick("slickGoTo", currentIndex + forwardDistance); // Go forward
            } else {
                $(".testimonial-slider").slick("slickGoTo", currentIndex - backwardDistance); // Go backward
            }
        });
    });
    /******************** Home page testimonial slider end ***********/

    jQuery(".media-slider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: false,
        arrows: true,
        prevArrow: `<button class="slide-arrow prev-arrow"><span><img src="${homeURL}/wp-content/uploads/2024/09/prev-arrow.svg" width='14' height='26' alt='Previous arrow icon'></span></button>`,
        nextArrow: `<button class="slide-arrow next-arrow"><span><img src="${homeURL}/wp-content/uploads/2024/09/next-arrow.svg" width='14' height='26' alt='Next arrow icon'></span></button>`,
        autoplay: false,
        autoplaySpeed: 2000,
        swipeToSlide: true,
        rows: 0,
    });

    jQuery(".gallery-slider").slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
        arrows: true,
        prevArrow: '<button class="slide-arrow prev-arrow"><i class="fas fa-chevron-left"></i></button>',
        nextArrow: '<button class="slide-arrow next-arrow"><i class="fas fa-chevron-right"></i></button>',
        autoplay: true,
        autoplaySpeed: 2000,
        swipeToSlide: true,
        rows: 0,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    dots: false,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    dots: false,
                },
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false,
                },
            },
        ],
    });

    /*SEO Menu JS */
    jQuery("#view_all_services").click(function () {
        jQuery(".all-services").slideToggle(500);
        jQuery(".all-services").css("display", "block");
    });
    /* SEO Page Read More JS */
    jQuery("#read-more").click(function () {
        jQuery(".excerpt-content").css({ "max-height": "unset" });
        jQuery(this).hide();
    });

    /*Menu JS */
    jQuery(".menu-item a")
        .not("#primary-menu .menu-item-has-children a:first")
        .click(function () {
            jQuery(".main-navigation").removeClass("toggled	");
        });
    if (window_size <= 991) {
        jQuery(document).on("click", "#primary-menu .menu-item-has-children", function (e) {
            e.stopPropagation(); // Prevent the click event from propagating to the parent element
            jQuery(this).siblings(".menu-item-has-children").removeClass("active-sub-menu");
            jQuery(this).toggleClass("active-sub-menu");
            jQuery(this).siblings(".menu-item-has-children").find(".sub-menu").hide();
            jQuery(this).find(".sub-menu").eq(0).toggle();
        });

        jQuery(document).on("click", "#primary-menu .sub-menu li", function (e) {
            e.stopPropagation(); // Prevent further propagation of the click event
        });
    }
    jQuery("#service_popup").on("show.bs.modal", function () {
        jQuery(window).scroll(function () {
            jQuery(".site-header").addClass("sticky_head");
        });
        var scrolly = window.scrollY;
        jQuery("body").css("top", "-" + scrolly + "px");
        jQuery(this).attr("data-top", scrolly);
        jQuery(".slick-initialized").slick("slickPause");
    });
    jQuery("#service_popup").on("hidden.bs.modal", function () {
        var scrolly = jQuery(this).attr("data-top");
        jQuery("body").css("top", "0px");
        window.scrollTo(0, scrolly);

        jQuery(window).scroll(function () {
            var height = jQuery(window).scrollTop();
            if (height < 100) {
                jQuery(".site-header").removeClass("sticky_head");
                console.log("Sticky Head");
            }
        });
        jQuery(".slick-initialized").slick("slickPlay");
    });

    /* Sticky Header JS */
    jQuery(window).scroll(function () {
        // this will work when your window scrolled.
        var height = jQuery(window).scrollTop(); //getting the scrolling height of window
        if (height > 100) {
            jQuery(".site-header").addClass("sticky_head");
        } else {
            jQuery(".site-header").removeClass("sticky_head");
        }
    });

    /** Page Scroll JS */
    let scrollOffset = 100;
    if (window.location.hash) {
        // smooth scroll to the anchor id

        jQuery("html,body").animate({
            scrollTop: jQuery(window.location.hash).offset().top - scrollOffset,
        });
    } else {
        setTimeout(function () {
            scroll(0, 0);
        }, 1);
    }

    jQuery("a[href*=\\#]:not([href$=\\#])").on("click", function (evt) {
        evt.preventDefault();
        var url = jQuery(this).attr("href");
        var id = url.substring(url.lastIndexOf("#"));
        if (jQuery(id).length > 0) {
            jQuery("html, body").animate(
                {
                    scrollTop: jQuery(id).offset().top - scrollOffset,
                },
                500
            );
        } else {
            window.location.href = url;
        }
    });
    // Smooth Scrolling JS End

    // /*Smooth Scroll JS*/
    jQuery("ul.menu li.menu-item").each(function () {
        var href = jQuery(this).find("a").attr("href");
        if (href.includes("#")) {
            if (href.substr(0, 1) == "#") {
                if (jQuery(href).length > 0) {
                    jQuery(this)
                        .find("a")
                        .first()
                        .attr("href", window.location.href.replace("#", "") + href);
                } else {
                    jQuery(this)
                        .find("a")
                        .first()
                        .attr("href", custom_call.homeurl + href);
                }
            }
        }
    });

    /***************** Product slider home page *********************/
    jQuery(".ctm-product-slider").slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        prevArrow: '<button class="slide-arrow prev-arrow"><i class="fas fa-chevron-left"></i></button>',
        nextArrow: '<button class="slide-arrow next-arrow"><i class="fas fa-chevron-right"></i></button>',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
        ],
    });

    // Initialize Slick Slider for WooCommerce related products
    jQuery(".related ul.products").slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: true,
        arrows: false, // Show arrows if needed
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
        ],
    });

    if (window_size <= 991) {
        // Scroll To Top JS Start
        $(window).on("scroll", function () {
            if ($(window).scrollTop() > 300) {
                $("#scrollToTop").fadeIn("500");
            } else {
                $("#scrollToTop").fadeOut("500");
            }
        });

        jQuery("#scrollToTop").on("click", function () {
            jQuery("html, body").animate({ scrollTop: 0 }, 800);
            return false;
        });
    }
});

// Timeline effect
let lastScrollY = window.scrollY;

document.addEventListener("DOMContentLoaded", function () {
	console.log('a')
    let items = document.querySelectorAll(".our-force-list");
    let timeline = document.querySelector(".our-force-list-wp");

    let observer = new IntersectionObserver(
        (entries, observer) => {
            entries.forEach((entry) => {
                if (window.scrollY > lastScrollY) {
                    // Al bajar, añadir clase `is-visible`
                    if (!entry.target.classList.contains("is-visible")) {
                        entry.target.classList.add("is-visible");

                        if ([...items].every(item => item.classList.contains("is-visible"))) {
                            timeline.classList.add("timeline-expanded");
                        }

                        const visibleItemsCount = [...items].filter(item => item.classList.contains("is-visible")).length;
                        const progressHeight = (visibleItemsCount / items.length) * 100;

                        timeline.style.setProperty('--timeline-height', `${progressHeight}%`);
                    }
                } else if (window.scrollY < lastScrollY) {
                    // Al subir, eliminar la clase `is-visible` después del inicio del timeline
                    if (entry.boundingClientRect.top > 0) {
                        entry.target.classList.remove("is-visible");
                    }
                }
            });

            lastScrollY = window.scrollY;  // Actualizar posición del scroll
        },
        {
            threshold: 0.3
        }
    );

    items.forEach((item) => {
        observer.observe(item);
    });
});
