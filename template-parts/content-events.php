<?php
$title = get_field('title', get_queried_object_id());
$description = get_field('description', get_queried_object_id());

$args = array(
    "post_type"      => "event",
    "posts_per_page" => 1,
    "post_status"    => "publish",
    "orderby"        => "date",
    "order"          => "DESC",
);
$query = new WP_Query($args);

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();

        $event_date = get_field("event_date");
        $event_location = get_field("event_location");
        $event_button_url = get_field("event_button_url");
        $event_image_gallery = get_field("event_image_gallery"); 
        ?>
        <!-- Events Section start -->
        <section class="media-press-about-sec events-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-wp white-text text-center">
                            <h1 class="h2-title"><?php echo esc_html($title); ?></h1>
                            <p><?php echo esc_html($description); ?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="featured-articles-title-wp white-text">
                            <h4 class="h4-title">UPCOMING EVENTS</h4>
                        </div>
                        <div class="featured-articles-content-row event-slide-flex">
                            <div class="event-slide-content">
                                <p class="event-slide-date"><?php echo esc_html($event_date); ?></p>
                                <h4 class="event-slide-title h4-title"><?php the_title(); ?></h4>
                                <p class="event-slide-location">
                                    <svg xmlns="https://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                        <path d="M9 9C9.4125 9 9.76563 8.85313 10.0594 8.55938C10.3531 8.26563 10.5 7.9125 10.5 7.5C10.5 7.0875 10.3531 6.73438 10.0594 6.44063C9.76563 6.14688 9.4125 6 9 6C8.5875 6 8.23438 6.14688 7.94063 6.44063C7.64688 6.73438 7.5 7.0875 7.5 7.5C7.5 7.9125 7.64688 8.26563 7.94063 8.55938C8.23438 8.85313 8.5875 9 9 9ZM9 14.5125C10.525 13.1125 11.6562 11.8406 12.3938 10.6969C13.1313 9.55313 13.5 8.5375 13.5 7.65C13.5 6.2875 13.0656 5.17188 12.1969 4.30313C11.3281 3.43438 10.2625 3 9 3C7.7375 3 6.67188 3.43438 5.80313 4.30313C4.93438 5.17188 4.5 6.2875 4.5 7.65C4.5 8.5375 4.86875 9.55313 5.60625 10.6969C6.34375 11.8406 7.475 13.1125 9 14.5125ZM9 16.5C6.9875 14.7875 5.48438 13.1969 4.49063 11.7281C3.49688 10.2594 3 8.9 3 7.65C3 5.775 3.60312 4.28125 4.80938 3.16875C6.01563 2.05625 7.4125 1.5 9 1.5C10.5875 1.5 11.9844 2.05625 13.1906 3.16875C14.3969 4.28125 15 5.775 15 7.65C15 8.9 14.5031 10.2594 13.5094 11.7281C12.5156 13.1969 11.0125 14.7875 9 16.5Z" fill="#E8EAED" />
                                    </svg>
                                    <?php echo esc_html($event_location); ?>
                                </p>
                                <p class="event-slide-text">
                                    <?php echo wp_kses_post(get_the_content()); ?>
                                </p>
                               <?php if ($event_button_url) : ?>
                                    <a href="<?php echo esc_url($event_button_url); ?>" class="sec-btn outline-white-btn">LEARN MORE</a>
                                <?php endif; ?>
								<a href="https://oyanova.com/queer-quest-partnership-tiers/" class="sec-btn outline-white-btn">Partnership Opportunities</a>
                            </div>
                            <div class="swiper-events">
                                <div class="swiper-wrapper">
                                    <?php
                                    if ($event_image_gallery) {
                                        foreach ($event_image_gallery as $image) {
                                            echo '<div class="swiper-slide event-slide">';
                                            echo '<img src="' . esc_url($image) . '" >';
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                </div>
                                <!-- Pagination -->
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
    wp_reset_postdata();
}

?>
<section class="media-press-about-sec radial-gradient">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="featured-articles-title-wp white-text">
                    <h4 class="h4-title">PAST EVENTS</h4>
                </div>
                <div class="featured-articles-content-row past-events">
                    <div class="swiper-past-events">
                        <div class="swiper-wrapper">
                            <?php
                            $args = array(
                                'post_type'      => 'event', 
                                'posts_per_page' => 1,
                                'offset'         => 1, 
                                'orderby'        => 'date',
                                'order'          => 'DESC',
                            );
                            $query = new WP_Query($args);

                            if ($query->have_posts()) :
                                while ($query->have_posts()) : $query->the_post();
                                    $past_event_date = get_field("event_date");
                                    $past_event_image_gallery = get_field("event_image_gallery"); 
                                    ?>

                                    <?php
                                    if ($past_event_image_gallery) {
                                        foreach ($past_event_image_gallery as $past_image) {
                                            echo '<div class="swiper-slide event-slide">';
                                            echo '<img src="' . esc_url($past_image) . '" >';
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                <?php
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </div>

                        <!-- Paginación -->
                        <div class="swiper-pagination"></div>
                    </div>

                    <div class="past-event-slide-content">
                        <?php
                        if ($query->have_posts()) :
                            $query->rewind_posts();
                            $query->the_post(); ?>
                            <p class="event-slide-date"><?php echo esc_html($past_event_date); ?></p>
                            <h4 class="past-event-slide-title h4-title"><?php the_title(); ?></h4>
                            <p class="event-slide-text"> <?php echo wp_kses_post(get_the_content()); ?></p>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Events Section End -->

<script>
document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('.swiper-events')) {
        const swiper = new Swiper('.swiper-events', {
            loop: true,
            autoplay: {
                delay: 4000,
            },
			speed: 500,
            spaceBetween: 44,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
            640: {
            slidesPerView: 1,
            spaceBetween: 20,
            },

            810: {
            slidesPerView: 1.08,
            spaceBetween: 30,
            },

            1024: {
            slidesPerView: 1.2,
            spaceBetween: 40,
            }
        }
        });
    }

    if (document.querySelector('.swiper-past-events')) {
        const swiperPast = new Swiper('.swiper-past-events', {
			effect: 'fade',
            loop: true,
            autoplay: {
                delay: 4000,
            },
            spaceBetween: 44,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
            640: {
            slidesPerView: 1,
            spaceBetween: 20,
            },

            768: {
            slidesPerView: 1,
            spaceBetween: 30,
            },

            1024: {
            slidesPerView: 1,
            spaceBetween: 30,
            }
        }
        });
    }
});
</script>
