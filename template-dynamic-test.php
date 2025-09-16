<?php 
/* 
Template Name: Oyanova Healing Test
*/

get_header();

$page_id = get_option('page_on_front');
$what_we_stand_title        = get_field("what_we_stand_title", $page_id);
$what_we_stand_button_text  = get_field("what_we_stand_button_text", $page_id);
$what_we_stand_button_link  = (get_field("what_we_stand_button_link", $page_id)) ? get_field("what_we_stand_button_link", $page_id) : "javascript:void(0);";
$what_we_stand_content      = get_field("what_we_stand_content", $page_id);
if (!empty($what_we_stand_title) || !empty($what_we_stand_button_text) || !empty($what_we_stand_content) || have_rows("what_we_stand_important_points", $page_id)) { ?>
<!-- Testimonial Section Start -->
<section class="testimonial-sec">
    <div class="small-leaf-shape mask-img"
        style="-webkit-mask-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/small-leaf-shape.svg');">
    </div>
    <div class="banner-bg back-img"
        style="background-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/futuristic-bg.png');"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-wp white-text text-center text-center">
                    <?php
                        if (!empty($what_we_stand_title)) { ?>
                    <h2 class="h2-title"><?php echo esc_html($what_we_stand_title); ?></h2>
                    <?php
                        }
                        //Content
                        echo ($what_we_stand_content) ? wp_kses_post($what_we_stand_content) : "";
                        ?>
                </div>
            </div>
        </div>
        <?php
            if (have_rows("what_we_stand_important_points", $page_id)) { ?>
        <div class="testimonial-slider-wp">
            <div class="row testimonial-slider">
                <?php
                        while (have_rows("what_we_stand_important_points", $page_id)) {
                            the_row();
                            $important_title    = get_sub_field("important_title");
                            $important_image    = get_sub_field("important_image");
                            $important_content  = get_sub_field("important_content");
                            if (!empty($important_title) || !empty($important_image) || !empty($important_content)) { ?>
                <div class="col-lg-4">
                    <div class="testimonial-slide">
                        <div class="testimonial-box">
                            <?php
                                            if (!empty($important_image)) { ?>
                            <div class="testimonial-image-box">
                                <div class="testimonial-image">
                                    <div class="mask-img"
                                        style="-webkit-mask-image: url('<?php echo esc_url($important_image); ?>');">
                                    </div>
                                </div>
                            </div>
                            <?php
                                            }
                                            if (!empty($important_title)) { ?>
                            <div class="testimonial-title">
                                <h3><?php echo esc_html($important_title); ?></h3>
                            </div>
                            <?php
                                            }
                                            if (!empty($important_content)) { ?>
                            <div class="testimonial-content">
                                <?php echo wp_kses_post($important_content); ?>
                            </div>
                            <?php
                                            } ?>
                        </div>
                    </div>
                </div>
                <?php
                            }
                        } ?>
            </div>
        </div>
        <?php
            }
            if (!empty($what_we_stand_button_text)) { ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="testimonial-content-btn">
                    <a href="<?php echo esc_attr($what_we_stand_button_link); ?>" class="sec-btn outline-white-btn"
                        title="<?php echo esc_attr(ucfirst(strtolower($what_we_stand_button_text))); ?>"><?php echo esc_html($what_we_stand_button_text); ?></a>
                </div>
            </div>
        </div>
        <?php
            } ?>
    </div>
</section>
<!-- Testimonial Section End -->
<?php
}
get_footer();
?>