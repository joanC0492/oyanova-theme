<?php
$home_banner_heading            = get_field("home_banner_heading");
$home_banner_sub_heading        = get_field("home_banner_sub_heading");
if (!empty($home_banner_heading) || !empty($home_banner_sub_heading) || have_rows("home_banner_represent_section")) {
?>
<section class="home-banner back-img">
    <div class="banner-bg back-img"
        style="background-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/futuristic-bg.png');"></div>
    <div class="small-leaf-shape mask-img"
        style="-webkit-mask-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/small-leaf-shape.svg');">
    </div>
    <div class="home-banner-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-wp white-text text-center">
                        <?php
                            if (!empty($home_banner_heading)) { ?>
                        <h1 class="h1-title"><?php echo esc_html($home_banner_heading); ?></h1>
                        <?php
                            }
                            if (!empty($home_banner_sub_heading)) { ?>
                        <p><?php echo esc_html($home_banner_sub_heading); ?></p>
                        <?php
                            } ?>
                        <div class="flicker-bar-wp">
                            <div class="flicker-bar"></div>
                        </div>
                    </div>
                    <?php
                        if (have_rows("home_banner_represent_section")) { ?>
                    <div class="powerfull-oya-wp">
                        <?php
                                while (have_rows("home_banner_represent_section")) {
                                    the_row();

                                    $home_banner_represent_head     = get_sub_field("home_banner_represent_head");
                                    $home_banner_represent_image    = get_sub_field("home_banner_represent_image");
                                    $home_banner_represent_content  = get_sub_field("home_banner_represent_content");

                                    // Check if nested repeater exists
                                    if (have_rows('home_banner_represent_content')): // Assuming 'content_repeater' is the name of the nested repeater field

                                        $index = 0; // Initialize index counter
                                        $classes = ['first', 'second', 'third', 'fourth']; // Array of class names
                                        $img_pointers_html = ''; // To store img-pointer HTML
                                        $contents_html = ''; // To store powerfull-content HTML

                                        while (have_rows('home_banner_represent_content')): the_row();

                                            // Get current class name based on index, fall back to a generic class if out of predefined classes
                                            $current_class = isset($classes[$index]) ? $classes[$index] : '';

                                            // Append img-pointer HTML to $img_pointers_html
                                            $img_pointers_html .= '<span class="img-pointer ' . $current_class . '"></span>';

                                            // Start accumulating powerfull-content HTML
                                            $contents_html .= '<div class="powerfull-content ' . $current_class . '">';

                                            // Append nested content HTML to $contents_html
                                            $contents_html .= '<p>' . get_sub_field('description') . '</p>';

                                            $contents_html .= '</div>'; // Close the powerfull-content div


                                            $index++; // Increment index
                                        endwhile;
                                    endif;

                                    if (!empty($home_banner_represent_head)) { ?>
                        <div class="powerfull-oya-title text-center">
                            <h3 class="h3-title"><?php echo esc_html($home_banner_represent_head); ?></h3>
                        </div>
                        <?php
                                    } ?>
                        <div class="powerfull-oya-img">
                            <?php
                                        if (!empty($home_banner_represent_image) || !empty($img_pointers_html)) { ?>
                            <div class="powerfull-oya-img-wp">
                                <img src="<?php echo esc_url($home_banner_represent_image['url']); ?>"
                                    width="<?php echo esc_attr($home_banner_represent_image['width']); ?>"
                                    height="<?php echo esc_attr($home_banner_represent_image['height']); ?>"
                                    alt="<?php echo esc_attr($home_banner_represent_image['alt']); ?>">
                                <?php
                                                // Output all img-pointer HTML
                                                echo $img_pointers_html;
                                                ?>
                            </div>
                            <?php
                                        }
                                        if (!empty($contents_html)) { ?>
                            <?php
                                            // Output all powerfull-content HTML
                                            echo $contents_html;
                                        } ?>
                        </div>
                        <?php
                                } ?>
                    </div>
                    <?php
                        } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
if (have_rows("home_founders")) { ?>
<section class="main-about light-overlay" id="our-story">
    <div class="small-leaf-shape-left small-leaf-shape mask-img"
        style="-webkit-mask-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/small-leaf-shape.svg');">
    </div>
    <div class="banner-bg back-img"
        style="background-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/wave-bg-shape.png');"></div>
    <div class="container">
        <div class="about-row">
            <?php
                while (have_rows("home_founders")) {
                    the_row();

                    $title              = get_sub_field("title");
                    $designation        = get_sub_field("designation");
                    $designation_link   = (get_sub_field("designation_link")) ? get_sub_field("designation_link") : "javascript:void(0);";
                    $floating_image     = get_sub_field("floating_image");
                    $content            = get_sub_field("content");
                    $button_text        = get_sub_field("button_text");
                    $button_link        = (get_sub_field("button_link")) ? get_sub_field("button_link") : "javascript:void(0);";
                    $founders_images    = get_sub_field("images");
                    if (!empty($title) || !empty($designation) || !empty($button_text) || !empty($floating_image) || !empty($content) || !empty($founders_images)) {
                        if (get_row_index() % 2 == 0) { ?>
            <div class="row">
                <?php
                                if (!empty($founders_images)) {
                                    foreach ($founders_images as $found_image) { ?>
                <div class="col-lg-6">
                    <div class="about-img-wp pos-rel">
                        <div class="img-leaf-shape">
                            <div class="about-img">
                                <img src="<?php echo esc_url($found_image['url']); ?>"
                                    width="<?php echo esc_attr($found_image['width']); ?>"
                                    height="<?php echo esc_attr($found_image['height']); ?>"
                                    alt="<?php echo esc_attr($found_image['alt']); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                                    }
                                } ?>
                <div class="col-lg-6 align-self-center">
                    <div class="about-content">
                        <div class="about-title">
                            <?php
                                            if (!empty($title)) { ?>
                            <h3 class="h3-title border-title"><?php echo esc_html($title);  ?></h3>
                            <?php
                                            }
                                            if (!empty($designation) || !empty($designation_link)) { ?>
                            <a href="<?php echo esc_attr($designation_link); ?>"
                                title="<?php echo esc_attr($designation); ?>">
                                <span class="position"><?php echo esc_html($designation); ?></span>
                            </a>
                            <?php
                                            } ?>
                        </div>
                        <?php
                                        if (!empty($content)) { ?>
                        <div class="about-text">
                            <?php echo wp_kses_post($content); ?>
                        </div>
                        <?php
                                        }
                                        if (!empty($button_text)) { ?>
                        <a href="<?php echo esc_attr($button_link); ?>" class="sec-btn outline-btn"
                            title="<?php echo esc_attr(ucfirst(strtolower($button_text))); ?>"><?php echo esc_attr($button_text); ?></a>
                        <?php
                                        } ?>
                    </div>
                </div>
            </div>
            <?php
                        } else { ?>
            <div class="row">
                <div class="col-lg-6 order-lg-1 order-2">
                    <div class="about-content">
                        <div class="about-title">
                            <?php
                                            if (!empty($title)) { ?>
                            <h3 class="h3-title border-title"><?php echo esc_html($title);  ?></h3>
                            <?php
                                            }
                                            if (!empty($designation) || !empty($designation_link)) { ?>
                            <a href="<?php echo esc_attr($designation_link); ?>"
                                title="<?php echo esc_attr($designation); ?>">
                                <span class="position"><?php echo esc_html($designation); ?></span>
                            </a>
                            <?php
                                            } ?>
                        </div>
                        <?php
                                        if (!empty($content)) { ?>
                        <div class="about-text">
                            <?php echo wp_kses_post($content); ?>
                        </div>
                        <?php
                                        }
                                        if (!empty($button_text)) { ?>
                        <a href="<?php echo esc_attr($button_link); ?>" class="sec-btn outline-btn"
                            title="<?php echo esc_attr(ucfirst(strtolower($button_text))); ?>"><?php echo esc_attr($button_text); ?></a>
                        <?php
                                        } ?>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-2 order-1">
                    <div class="about-img-wp">
                        <?php
                                        if (!empty($floating_image)) { ?>
                        <div class="floating-img">
                            <img src="<?php echo esc_url($floating_image['url']); ?>"
                                width="<?php echo esc_attr($floating_image['width']); ?>"
                                height="<?php echo esc_attr($floating_image['height']); ?>"
                                alt="<?php echo esc_attr($floating_image['alt']); ?>">
                        </div>
                        <?php
                                        }
                                        if (!empty($founders_images)) {
                                            $image_index = 0;
                                            $founder_classes = ['first', 'second']; // Array of class names
                                            foreach ($founders_images as $found_image) {
                                                $dynamic_class = isset($founder_classes[$image_index]) ? $founder_classes[$image_index] : '';
                                            ?>
                        <div class="img-leaf-shape <?php echo $dynamic_class; ?>">
                            <div class="about-img">
                                <img src="<?php echo esc_url($found_image['url']); ?>"
                                    width="<?php echo esc_attr($found_image['width']); ?>"
                                    height="<?php echo esc_attr($found_image['height']); ?>"
                                    alt="<?php echo esc_attr($found_image['alt']); ?>">
                            </div>
                        </div>
                        <?php
                                                $image_index++;
                                            }
                                        } ?>
                    </div>
                </div>
            </div>
            <?php
                        }
                    }
                } ?>
        </div>
    </div>
</section>
<?php
}
$what_we_stand_title        = get_field("what_we_stand_title");
$what_we_stand_button_text  = get_field("what_we_stand_button_text");
$what_we_stand_button_link  = (get_field("what_we_stand_button_link")) ? get_field("what_we_stand_button_link") : "javascript:void(0);";
$what_we_stand_content      = get_field("what_we_stand_content");
if (!empty($what_we_stand_title) || !empty($what_we_stand_button_text) || !empty($what_we_stand_content) || have_rows("what_we_stand_important_points")) { ?>
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
            if (have_rows("what_we_stand_important_points")) { ?>
        <div class="testimonial-slider-wp">
            <div class="row testimonial-slider">
                <?php $slide_cnt = 1;
                        while (have_rows("what_we_stand_important_points")) {
                            the_row();
                            $important_title    = get_sub_field("important_title");
                            $important_image    = get_sub_field("important_image");
                            $important_content  = get_sub_field("important_content");
                            if (!empty($important_title) || !empty($important_image) || !empty($important_content)) { ?>
                <div class="col-lg-4">
                    <a class="testimonial-slide" data-slide="<?php echo $slide_cnt; ?>">
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
                                        </a>
                </div>
                <?php
                            }
                      $slide_cnt++;  } ?>
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
$home_our_force_title   = get_field("home_our_force_title");
$home_our_force_desc    = get_field("home_our_force_desc");
if (!empty($home_our_force_title) || !empty($home_our_force_desc) || !empty($home_force_contact_us) || have_rows("home_our_force_data") || have_rows("home_force_contact_us")) { ?>
<section class="main-our-force radial-gradient">
    <div class="small-leaf-shape-left small-leaf-shape mask-img"
        style="-webkit-mask-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/small-leaf-shape.svg');">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-wp white-text text-center text-center" id="projects">
                    <?php
                        if (!empty($home_our_force_title)) { ?>
                    <h2 class="h2-title"><?php echo esc_html($home_our_force_title); ?></h2>
                    <?php
                        }
                        //Content
                        echo ($home_our_force_desc) ? wp_kses_post($home_our_force_desc) : "";
                        ?>
                </div>
                <?php
                    if (have_rows("home_our_force_data")) { ?>
                <div class="our-force-list-wp">
                    <?php
                            while (have_rows("home_our_force_data")) {
                                the_row();
                                $button_text    = get_sub_field("button_text");
                                $button_link    = get_sub_field("button_link") ? get_sub_field("button_link") : "javascript:void(0);";
                                $target_attr    = ($button_link !== "javascript:void(0);" && !empty($button_link['target'])) ? "target='_blank'" : "";
                                $force_image    = get_sub_field("image");
                                $description    = get_sub_field("description");
                                if (!empty($button_text) || !empty($button_link) || !empty($force_image) || !empty($description)) { ?>
                    <div class="our-force-list" id="<?php echo strtolower(sanitize_title($button_text)); ?>">
                        <?php
                                        if (!empty($button_text) && ($button_link !== "javascript:void(0);")) {
                                        ?>
                        <div class="our-force-list-title">
                            <a href="<?php echo esc_attr($button_link['url']); ?>"
                                title="<?php echo esc_attr(ucfirst(strtolower($button_text))); ?>"
                                <?php echo $target_attr; ?>>
                                <h2 class="h2-title white-border border-title"><?php echo esc_html($button_text); ?>
                                </h2>
                            </a>
                        </div>
                        <?php
                                        } else { ?>
                        <div class="our-force-list-title">
                            <h2 class="h2-title white-border border-title"><?php echo esc_html($button_text); ?></h2>
                        </div>
                        <?php
                                        } ?>
                        <div class="our-force-list-content">
                            <?php
                                            if (!empty($description)) { ?>
                            <div class="force-list-text">
                                <?php echo wp_kses_post($description); ?>
                            </div>
                            <?php
                                            }
                                            if (!empty($force_image)) { ?>
                            <div class="force-list-img-wp">
                                <div class="force-list-img back-img"
                                    style="background-image: url('<?php echo esc_url($force_image); ?>');"></div>
                            </div>
                            <?php
                                            } ?>
                        </div>
                    </div>
                    <?php
                                }
                            } ?>
                </div>
                <?php
                    }
                    if (have_rows("home_force_contact_us")) {
                        while (have_rows("home_force_contact_us")) {
                            the_row();
                            $home_our_force_cnt_title       = get_sub_field("home_our_force_cnt_title");
                            $home_force_cnt_button_title    = get_sub_field("home_force_cnt_button_title");
                            $home_force_cnt_button_link     = get_sub_field("home_force_cnt_button_link") ? get_sub_field("home_force_cnt_button_link") : "javascript:void(0);";
                            $home_force_cnt_desc            = get_sub_field("home_force_cnt_desc");
                            if (!empty($home_our_force_cnt_title) || !empty($home_force_cnt_button_title) || !empty($home_force_cnt_desc)) { ?>
                <div class="title-wp help-info white-text text-center text-center">
                    <?php
                                    if (!empty($home_our_force_cnt_title)) { ?>
                    <h2 class="h2-title"><?php echo esc_html($home_our_force_cnt_title); ?></h2>
                    <?php
                                    }
                                    echo ($home_force_cnt_desc) ? "<p>" . wp_kses_post($home_force_cnt_desc) . "</p>" : "";
                                    if (!empty($home_force_cnt_button_title)) { ?>
                    <a href="<?php echo esc_attr($home_force_cnt_button_link); ?>" class="sec-btn outline-white-btn"
                        title="<?php echo esc_attr(ucfirst(strtolower($home_force_cnt_button_title))); ?>"><?php echo esc_html($home_force_cnt_button_title); ?></a>
                    <?php
                                    } ?>
                </div>
                <?php
                            }
                        }
                    } ?>
            </div>
        </div>
    </div>
</section>
<?php
}
$home_partnership_title         = get_field("home_partnership_title");
$home_partnership_contact_form  = get_field("home_partnership_contact_form");
$home_partnership_description   = get_field("home_partnership_description");
if (!empty($home_partnership_title) || !empty($home_partnership_contact_form) || !empty($home_partnership_description)) { ?>
<!-- Partnerships Section Start -->
<section class="partnerships-sec" id="partner">
    <div class="small-leaf-shape mask-img"
        style="-webkit-mask-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/small-leaf-shape.svg');">
    </div>
    <div class="banner-bg back-img"
        style="background-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/futuristic-bg.png');"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="partnerships-content">
                    <?php
                        if (!empty($home_partnership_title)) { ?>
                    <div class="sec-title">
                        <h2 class="h2-title white-border border-title"><?php echo esc_html($home_partnership_title); ?>
                        </h2>
                    </div>
                    <?php
                        }
                        if (!empty($home_partnership_description)) { ?>
                    <div class="partnerships-content-description">
                        <?php echo wp_kses_post($home_partnership_description); ?>
                    </div>
                    <?php
                        } ?>
                </div>
            </div>
            <?php
                if (!empty($home_partnership_contact_form)) { ?>
            <div class="col-lg-6">
                <div class="partnerships-form-wp">
                     <?php
                            //echo do_shortcode('[contact-form-7 id="' . $home_partnership_contact_form->ID . '" title="' . $home_partnership_contact_form->post_title . '"]');
							echo do_shortcode('[convertkit form=7073854]');
                            ?>
                </div>
            </div>
            <?php
                } ?>
        </div>
    </div>
</section>
<!-- Partnerships Section End -->
<?php
}
$home_media_title               = get_field("home_media_title");
$home_media_button_title        = get_field("home_media_button_title");
$home_media_button_link         = (get_field("home_media_button_link")) ? get_field("home_media_button_link") : "javascript:void(0);";
$home_media_description         = get_field("home_media_description");
if (!empty($home_media_title) || !empty($home_media_images_credit_text) || !empty($home_media_button_title) || !empty($home_media_description) || have_rows("home_media_image_gallery")) { ?>
<!-- Media And Press Section Start -->
<section class="media-and-press-sec" id="media-press">
    <div class="small-leaf-shape-left small-leaf-shape mask-img"
        style="-webkit-mask-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/small-leaf-shape.svg');">
    </div>
    <div class="banner-bg back-img"
        style="background-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/wave-bg-shape.png');"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="media-and-press-content">
                    <?php
                        if (!empty($home_media_title)) { ?>
                    <div class="sec-title">
                        <h2 class="h2-title"><?php echo esc_html($home_media_title); ?></h2>
                    </div>
                    <?php
                        }
                        if (!empty($home_media_description)) { ?>
                    <div class="media-and-press-content-description">
                        <?php echo wp_kses_post($home_media_description); ?>
                    </div>
                    <?php
                        }
                        if (!empty($home_media_button_title)) { ?>
                    <div class="media-and-press-content-btn">
                        <a href="<?php echo esc_attr($home_media_button_link); ?>" class="sec-btn outline-btn"
                            title="<?php echo esc_attr(ucfirst(strtolower($home_media_button_title . ", " . $home_media_title))); ?>"><?php echo esc_html($home_media_button_title); ?></a>
                    </div>
                    <?php
                        } ?>
                </div>
            </div>
            <?php
                if (have_rows("home_media_image_gallery")) { ?>
            <div class="col-lg-8">
                <div class="media-and-press-image-row-wp">
                    <div class="media-and-press-image-row">
                        <?php
                                while (have_rows("home_media_image_gallery")) {
                                    the_row();
                                    $gallery_image              = get_sub_field("gallery_image");
                                    $gallery_image_credit_by    = get_sub_field("gallery_image_credit_by");

                                    if (!empty($gallery_image) || !empty($gallery_image_credit_by)) { ?>
                        <div class="media-and-press-image">
                            <div class="back-img"
                                style="background-image: url('<?php echo esc_url($gallery_image); ?>');"></div>
                            <?php
                                            if (!empty($gallery_image_credit_by)) { ?>
                            <div class="media-and-press-image-credit-by">
                                <p><?php echo esc_html($gallery_image_credit_by); ?></p>
                            </div>
                            <?php
                                            } ?>
                        </div>
                        <?php
                                    }
                                } ?>
                    </div>
                </div>
            </div>
            <?php
                } ?>
        </div>
    </div>
</section>
<?php } ?>
<!-- Media And Press Section End -->


<!-- Start - Product Slider Section -->
<?php
$home_product_title         = get_field("home_product_title");
$home_product_description   = get_field("home_product_description");
$home_product_button_title  = get_field("home_product_button_title");
$home_product_button_link   = get_field("home_product_button_link");

if (!empty($home_product_title) || !empty($home_product_description) || !empty($home_product_button_title)) { ?>
<section class="home-product-slider">
    <div class="banner-bg back-img"
        style="background-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/futuristic-bg.png');"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hp-product-content">
                    <?php
                        if (!empty($home_product_title)) { ?>
                    <div class="sec-title" id="hp-wp-product">
                        <h2 class="h2-title white-border border-title"><?php echo esc_html($home_product_title); ?></h2>
                        <?php
                                if (!empty($home_product_description)) { ?>
                        <div class="product-content-description">
                            <?php echo wp_kses_post($home_product_description); ?>
                        </div>
                        <?php
                                } ?>
                    </div>
                    <?php
                        } ?>
                    <?php if (!empty($home_product_button_title) && !empty($home_product_button_link)) { ?>
                    <div class="pro-btn-div">
                        <a href="<?php echo esc_attr($home_product_button_link); ?>" class="sec-btn outline-white-btn"
                            title="<?php echo esc_attr(ucfirst(strtolower($home_product_button_title))); ?>"><?php echo esc_html($home_product_button_title); ?></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php ctm_product_slider(); ?>
        </div>
    </div>
</section>
<!-- End - Product Slider Section -->
<?php
} ?>