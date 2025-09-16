<?php

/**
 * The template for displaying the sitemap page
 * Template Name: Sldier demo
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */
get_header();

?>

<style type="text/css">
	
	.area {
		margin: auto;
		display: block;
		width: 100%;
	}

	.slick-list {
		overflow: visible;
	}


	.slick-slide {
		opacity: 0;
		transition: opacity 0.2s ease;
		&.prev1, &.prev2, &.active, &.next1, &.next2 {
			opacity: 1;
		}
		.slide-inner {
			transform: scale(0.7) translatey(70%);
			transition: all 0.5s ease;
		}
		&.next1 {
			.slide-inner {
				transition: all 0.5s ease;
				transform: scale(0.9) translatex(2.6%) translatey(2%);
			}
		}
		&.prev1 {
			.slide-inner {
				transition: all 0.5s ease;
				transform: scale(0.9) translatex(-2.6%) translatey(2%);
			}
		}
		&.next2, &.prev2 {
			.slide-inner {
				transform: scale(0.9) translatey(50%);
				transition: all 0.5s ease;
			}
		}
		.slide-title, .slide-description {
			opacity: 0;
			text-align: center;
			width: 150%;
			margin-left: -25%;
		}
		.slide-title {
			margin-top: 10%;
			margin-bottom: 15px;
		}
		.slide-description {
			margin-top: 0;
		}
		img {
			width: 100%;
			height: 15vw;
			object-fit: cover;
		}
		&.active {
			.slide-title, .slide-description {
				opacity: 1;
				transition: all 0.2s ease 0.3s;
			}
			.slide-inner {
				transform: scale(1) translatey(0%);
			}
		}
		&:focus {
			outline: none;
		}
		a {
			display: block;
			transition: all 0.2s ease;
		}

		a:focus {
			outline: none;
			box-shadow: 0 0 5px 1px #f5f5f533;

		}
	}




	.slick-list {
		width: 120vw;
		margin-left: -10vw;
		padding: 0 !important;
	}

	.slider-nav {
		text-align: center;
		padding-top: 10px;
		position: relative;
		z-index: 2;
		button {
			margin: 0 10px;
			background: transparent;
			border: none;
			transition: all 0.2s ease;
			position: relative;
			z-index: 2;
			opacity: 0.8;
		}
		img {
			border: 4px solid #f5f5f5;
			padding: 7px;
			background: #f5f5f5;
			border-radius: 50%;
			height: 200px;
			width: 200px;
		}
		img.prev {
			transform: rotate(180deg);
		}
		.sr-text {
			border: 0;
			clip: rect(1px,1px,1px,1px);
			-webkit-clip-path: inset(50%);
			clip-path: inset(50%);
			height: 1px;
			margin: -1px;
			overflow: hidden;
			padding: 0;
			position: absolute!important;
			width: 1px;
			word-wrap: normal!important;
		}
		.slick-prev:hover {
			transform: translatex(-5px);
			opacity: 1;
			outline: none;
		}
		.slick-next:hover {
			transform: translatex(5px); 
			opacity: 1;
		}
		.slick-prev:focus, .slick-next:focus {
			opacity: 1;
			outline: none;  
		}
	}

	@media (max-width: 1024px) {
		.slick-slide img {
			height: 30vw;
		}
	}

	@media (max-width: 767px) {
		.slick-list {
			width: auto;
			margin-left: 0;
			padding: 0 50px !important;
		}
		.slide-inner {
			.slide-title, .slide-description {
				width: 100%;
				margin-left: 0;
			}
		}
		.slick-slide img {
			height: 70vw;
		}
	}

	h2,p {color: white;}


</style>
<main id="main" class="site-main">
<?php
$what_we_stand_title        = get_field("what_we_stand_title", 15);
$what_we_stand_button_text  = get_field("what_we_stand_button_text", 15);
$what_we_stand_button_link  = (get_field("what_we_stand_button_link", 15)) ? get_field("what_we_stand_button_link", 15) : "javascript:void(0);";
$what_we_stand_content      = get_field("what_we_stand_content", 15);?>
<!-- Testimonial Section Start -->
<section class="testimonial-sec">
    <div class="small-leaf-shape mask-img"
        style="-webkit-mask-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/small-leaf-shape.svg');">
    </div>
    <div class="banner-bg back-img"
        style="background-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/futuristic-bg.png');"></div>
    <div class="container">
<div class="area">
	<div class="testimonial-slider-wp">
		<div class="testimonial-slider">
			<?php
			$slide_cnt = 1;
			while (have_rows("what_we_stand_important_points", 15)) {
				the_row();
				$important_title    = get_sub_field("important_title", 15);
				$important_image    = get_sub_field("important_image", 15);
				$important_content  = get_sub_field("important_content", 15);
				if (!empty($important_title) || !empty($important_image) || !empty($important_content)) { ?>
					<div class="testimonial-slide"><div class="slide-inner">
						<a href="#" data-slide="<?php echo $slide_cnt; ?>"><img alt="a black and white kitten playing with a flower" src="<?php echo esc_url($important_image); ?>" /></a>
						<div class="testimonial-title">
                                <h2 class="slide-title"><?php echo esc_html($important_title); ?></h2>
                            </div>
                            <div class="testimonial-content">
                                <?php echo wp_kses_post($important_content); ?>
                            </div>
					</div></div>

				<?php } $slide_cnt++; } ?>
			</div>
			<div class="slider-nav"></div>
		</div>
	</div>
</div>
</section>
</main>
	<!-- Testimonial Section End -->

	<script type="text/javascript">
		jQuery(document).ready(function($){


			$('.testimonial-slider').slick({
				centerMode: true,
				slidesToShow: 3,
				infinite: true,
				arrows: true,
				dots: false,
				slidesToScroll: 1,
				appendArrows: '.slider-nav',
				prevArrow: '<button type="button" class="slick-prev"><span class="sr-text">Previous</span><img class="prev" aria-hidden="true" width="25px" src="https://assets.codepen.io/588944/noun-arrow-1920806-1a1a1a.svg" /></button>',
				nextArrow: '<button type="button" class="slick-next"><span class="sr-text">Next</span><img class="next" aria-hidden="true" width="25px" src="https://assets.codepen.io/588944/noun-arrow-1920806-1a1a1a.svg" /></button>',
				responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 1,
					}
				},
				{
					breakpoint: 767,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
				]
			});

			$('.slick-current').addClass('active');    
			$('.slick-current').next('.slick-slide').addClass('next1');
			$('.slick-current').prev('.slick-slide').addClass('prev1');
			$('.slick-slide.next1').next('.slick-slide').addClass('next2');
			$('.slick-slide.prev1').prev('.slick-slide').addClass('prev2');

  // On before slide change
			$('.testimonial-slider').on('beforeChange', function(event, { slideCount: count }, currentSlide, nextSlide){
				let selectors = [nextSlide, nextSlide - count, nextSlide + count].map(n => `[data-slick-index="${n}"]`).join(', ');
				$('.slick-slide').removeClass('active').removeClass('next1').removeClass('next2').removeClass('prev1').removeClass('prev2');
				$(selectors).addClass('active');
				$('.slick-slide.active').next('.slick-slide').addClass('next1');
				$('.slick-slide.active').prev('.slick-slide').addClass('prev1');
				$('.slick-slide.next1').next('.slick-slide').addClass('next2');
				$('.slick-slide.prev1').prev('.slick-slide').addClass('prev2');
			});

 // Smooth navigation to clicked slide
			$('a[data-slide]').click(function(e) {
				e.preventDefault();

    // Get the clicked slide number
				let slideno = $(this).data('slide') - 1;

    // Access the slick object from the slider element
				let slickInstance = $('.testimonial-slider').slick('getSlick');

    // Get the current slide index
				let currentIndex = slickInstance.currentSlide;

    // Get the total number of slides
				let slideCount = slickInstance.slideCount;

    // Calculate the shortest path for infinite scrolling
				let forwardDistance = (slideno >= currentIndex) ? (slideno - currentIndex) : (slideCount - currentIndex + slideno);
				let backwardDistance = (currentIndex >= slideno) ? (currentIndex - slideno) : (currentIndex + slideCount - slideno);

				if (forwardDistance <= backwardDistance) {
      $('.testimonial-slider').slick('slickGoTo', currentIndex + forwardDistance); // Go forward
  } else {
      $('.testimonial-slider').slick('slickGoTo', currentIndex - backwardDistance); // Go backward
  }
});

		});
	</script>
	<?php get_footer(); ?>

