<?php
$oh_banner_title        = get_field("oh_banner_title");
$oh_banner_sub_title    = get_field("oh_banner_sub_title");
$oh_banner_content      = get_field("oh_banner_content");
if (!empty($oh_banner_title) || !empty($oh_banner_sub_title) || !empty($oh_banner_content)) { ?>
    <!-- Inner Banner Section Start -->
    <section class="inner-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="banner-content white-text text-center">
                        <?php
                        if (!empty($oh_banner_title)) { ?>
                            <h1 class="h1-title"><?php echo esc_html($oh_banner_title); ?></h1>
                        <?php
                        }
                        if (!empty($oh_banner_sub_title)) { ?>
                            <h6><?php echo esc_html($oh_banner_sub_title); ?></h6>
                        <?php
                        }
                        if (!empty($oh_banner_content)) { ?>
                            <div class="banner-content-description">
                                <?php echo wp_kses_post($oh_banner_content); ?>
                            </div>
                        <?php
                        } ?>
						<div class="meet-your-therapist-content-btn">
							<a href="#work-with-us" class="sec-btn outline-white-btn" >WORK WITH US</a>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner Banner Section End -->
<?php
}
$oh_therapist_title     = get_field("oh_therapist_title");
$oh_button_text         = get_field("oh_button_text");
$oh_therapist_page_link = (get_field("oh_therapist_page_link")) ? get_field("oh_therapist_page_link") : "javascript:void(0);";
$oh_target_section_id   = get_field("oh_target_section_id");
$oh_therapist_image     = get_field("oh_therapist_image");
$oh_therapist_content   = get_field("oh_therapist_content");
if (!empty($oh_therapist_title) || !empty($oh_button_text) || !empty($oh_target_section_id) || !empty($oh_therapist_image) || !empty($oh_therapist_content) || have_rows("meet_therapist_call_out_box_top", "option") || have_rows("meet_therapist_call_out_box_bottom", "option")) { ?>
    <!-- Meet Your Therapist Section Start -->
    <section class="meet-your-therapist-sec light-overlay">
        <div class="banner-bg back-img" style="background-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/wave-bg-shape.png');"></div>
        <div class="container">
            <?php
            if (have_rows("meet_therapist_call_out_box_top", "option")) { ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="meet-your-therapist-feature-1 small-feature-box">
                            <?php
                            while (have_rows("meet_therapist_call_out_box_top", "option")) {
                                the_row();
                                //common function - code in functions.php
                                call_out_box();
                            } ?>
                        </div>
                    </div>
                </div>
            <?php
            } ?>
            <div class="row">
                <?php
                if (!empty($oh_therapist_image)) { ?>
                    <div class="col-lg-6">
                        <div class="meet-your-therapist-image-box">
                            <div class="meet-your-therapist-image gradient-border">
                                <div class="back-img" style="background-image: url('<?php echo esc_url($oh_therapist_image); ?>');"></div>
                            </div>
                        </div>
                    </div>
                <?php
                } ?>
                <div class="col-lg-6">
                    <div class="meet-your-therapist-content">
                        <?php
                        if (!empty($oh_therapist_title)) { ?>
                            <div class="sec-title">
                                <h2 class="h1-title"><?php echo esc_html($oh_therapist_title); ?></h2>
                            </div>
                        <?php
                        }
                        if (!empty($oh_therapist_content)) { ?>
                            <div class="meet-your-therapist-description">
                                <?php echo wp_kses_post($oh_therapist_content); ?>
                            </div>
                        <?php
                        }
                        if (!empty($oh_button_text) || !empty($oh_target_section_id)) { ?>
                            <div class="meet-your-therapist-content-btn">
                                <a href="<?php echo esc_attr($oh_therapist_page_link . $oh_target_section_id) ?>" class="sec-btn blue-outline-btn" title="<?php echo esc_attr(ucfirst(strtolower($oh_button_text))); ?>"><?php echo esc_html($oh_button_text); ?></a>
                            </div>
                        <?php
                        } ?>
                    </div>
                </div>
            </div>
            <?php
            if (have_rows("meet_therapist_call_out_box_bottom", "option")) { ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="meet-your-therapist-feature-2 small-feature-box">
                            <?php
                            while (have_rows("meet_therapist_call_out_box_bottom", "option")) {
                                the_row();
                                //common function - code in functions.php
                                call_out_box();
                            } ?>
                        </div>
                    </div>
                </div>
            <?php
            } ?>
        </div>
    </section>
    <!-- Meet Your Therapist Section End -->
<?php
}
$oh_approach_title     = get_field("oh_approach_title");
$oh_approach_image     = get_field("oh_approach_image");
$oh_approach_content   = get_field("oh_approach_content");
if (!empty($oh_approach_title) || !empty($oh_approach_image) || !empty($oh_approach_content)) { ?>
    <!-- Our Approach Section Start -->
    <section class="our-approach-sec">
        <div class="small-leaf-shape mask-img" style="-webkit-mask-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/small-leaf-shape.svg');"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="our-approach-content-box">
                        <?php
                        if (!empty($oh_approach_title)) { ?>
                            <div class="sec-title">
                                <h2 class="h2-title white-border border-title"><?php echo esc_html($oh_approach_title); ?></h2>
                            </div>
                        <?php
                        }
                        if (!empty($oh_approach_content)) { ?>
                            <div class="our-approach-content-description">
                                <?php echo wp_kses_post($oh_approach_content); ?>
                            </div>
                        <?php
                        } ?>
                    </div>
                </div>
                <?php
                if (!empty($oh_approach_image)) { ?>
                    <div class="col-lg-6">
                        <div class="our-approach-image-box">
                            <div class="our-approach-image back-img" style="background-image: url('<?php echo esc_url($oh_approach_image); ?>');">
                            </div>
                        </div>
                    </div>
                <?php
                } ?>
            </div>
        </div>
    </section>
    <!-- Our Approach Section End -->
<?php
}
$oh_why_choose_title    = get_field("oh_why_choose_title");
$oh_why_choose_content  = get_field("oh_why_choose_content");
$oh_why_choose_images   = get_field("oh_why_choose_images");
if (!empty($oh_why_choose_title) || !empty($oh_why_choose_content) || !empty($oh_why_choose_images) || have_rows("why_choose_call_out_box_top") || have_rows("why_choose_call_out_box_bottom")) { ?>
    <!-- Why Choose Section Start -->
    <section class="why-choose-sec">
        <div class="banner-bg back-img" style="background-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/futuristic-bg.png');"></div>
        <div class="container">
            <?php
            if (have_rows("why_choose_call_out_box_top", "option")) { ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="why-choose-feature-1 small-feature-box">
                            <?php
                            while (have_rows("why_choose_call_out_box_top", "option")) {
                                the_row();
                                //common function - code in functions.php
                                call_out_box();
                            } ?>
                        </div>
                    </div>
                </div>
            <?php
            } ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="why-choose-content-wp">
                        <?php
                        if (!empty($oh_why_choose_title)) { ?>
                            <div class="why-choose-title-wp">
                                <div class="sec-title white-text">
                                    <h2 class="h2-title"><?php echo esc_html($oh_why_choose_title); ?></h2>
                                </div>
                            </div>
                        <?php
                        }
                        if (!empty($oh_why_choose_images)) { ?>
                            <div class="why-choose-image-row">
                                <?php
                                foreach ($oh_why_choose_images as $why_image) { ?>
                                    <div class="why-choose-image gradient-border">
                                        <div class="back-img" style="background-image: url('<?php echo esc_url($why_image); ?>');"></div>
                                    </div>
                                <?php
                                } ?>
                            </div>
                        <?php
                        }
                        if (!empty($oh_why_choose_content)) { ?>
                            <div class="why-choose-content-description">
                                <?php echo wp_kses_post($oh_why_choose_content); ?>
                            </div>
                        <?php
                        } ?>
                    </div>
                </div>
            </div>
            <?php
            if (have_rows("why_choose_call_out_box_bottom", "option")) { ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="why-choose-feature-2 small-feature-box">
                            <?php
                            while (have_rows("why_choose_call_out_box_bottom", "option")) {
                                the_row();
                                //common function - code in functions.php
                                call_out_box();
                            } ?>
                        </div>
                    </div>
                </div>
            <?php
            } ?>
        </div>
    </section>
    <!-- Why Choose Section End -->
<?php
}
$oh_service_main_title  = get_field("oh_service_main_title");
if (!empty($oh_service_main_title) || have_rows("oh_service_details") || have_rows("booking_contact_details") || have_rows("our_services_call_out_box_top", "option") || have_rows("our_services_call_out_box_middle", "option") || have_rows("our_services_call_out_box_bottom", "option")) { ?>
    <!-- Our Services Section Start -->
    <section class="our-services-sec radial-gradient">
        <div class="small-leaf-shape mask-img" style="-webkit-mask-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/small-leaf-shape.svg');"></div>
        <div class="container">
            <?php
            if (have_rows("our_services_call_out_box_top", "option")) { ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="our-services-feature-1 small-feature-box">
                            <?php
                            while (have_rows("our_services_call_out_box_top", "option")) {
                                the_row();
                                //common function - code in functions.php
                                call_out_box();
                            } ?>
                        </div>
                    </div>
                </div>
            <?php
            }
            if (have_rows("our_services_call_out_box_middle", "option")) { ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="our-services-feature-2 small-feature-box">
                            <?php
                            while (have_rows("our_services_call_out_box_middle", "option")) {
                                the_row();
                                //common function - code in functions.php
                                call_out_box();
                            } ?>
                        </div>
                    </div>
                </div>
            <?php
            } ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-our-services-content-wp">
                        <?php
                        if (!empty($oh_service_main_title)) { ?>
                            <div class="main-our-services-title white-text">
                                <h2 class="h2-title"><?php echo esc_html($oh_service_main_title); ?></h2>
                            </div>
                        <?php
                        }
                        if (have_rows("oh_service_details")) { ?>
                            <div class="main-our-services-content">
                                <?php
                                while (have_rows("oh_service_details")) {
                                    the_row();
                                    $service_title      = get_sub_field("service_title");
                                    $service_price      = get_sub_field("service_price");
                                    $sub_text           = get_sub_field("service_price_sub_text");
                                    $service_content    = get_sub_field("service_content");

                                    $service_link    = get_sub_field("service_link");
                                    
                                    $popup_button_text  = get_sub_field("popup_button_text");
                                    $pop_out_content    = get_sub_field("service_popup_outside_content");
                                    $pop_in_content     = get_sub_field("service_popup_inside_content");
                                    if (!empty($service_title) || !empty($service_price) || !empty($sub_text) || !empty($service_content) || !empty($popup_button_text) || !empty($pop_out_content) || !empty($pop_in_content)) { ?>
                                        <div class="our-services-content-box">
                                            <div class="our-services-content-text">
                                                <?php
                                                if (!empty($service_title)) { ?>
                                                    <div class="our-services-content-title">
                                                        <h4><?php echo esc_html($service_title); ?></h4>
                                                    </div>
                                                <?php
                                                }
                                                if (!empty($service_content) || !empty($pop_out_content)) { ?>
                                                    <div class="our-services-content-description">
                                                        <?php echo wp_kses_post($service_content); ?>
                                                        <?php echo !empty($pop_out_content) ? wp_kses_post($pop_out_content) : "";   ?>
                                                    </div>
                                                <?php
                                                } ?>
                                            </div>
                                            <div class="our-services-content-number-box white-text">
                                                <?php
                                                if (!empty($service_price)) { ?>
                                                    <div class="our-services-number">
                                                        <h2><?php echo esc_html($service_price); ?></h2>
                                                    </div>
                                                <?php
                                                }
                                                if (!empty($sub_text)) { ?>
                                                    <div class="our-services-number-info">
                                                        <p><?php echo wp_kses($sub_text, array("span" => array())); ?></p>
                                                    </div>
                                                <?php
                                                }
                                                if (!empty($popup_button_text)) { ?>
                                                    <button type="button" class="sec-btn outline-white-btn" aria-label="<?php echo esc_attr(ucfirst(strtolower($popup_button_text))); ?>" data-bs-toggle="modal" data-bs-target="#service_popup"><?php echo esc_html($popup_button_text); ?></button>
                                                    <?php
                                                }
                                                if (!empty($service_link)) { ?>
                                                    <a class="sec-btn outline-white-btn" target="_blank" title="Learn More" href="<?php echo $service_link; ?>">Learn More</a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                <?php
                                    }
                                } ?>
                            </div>
                        <?php
                        } ?>

                    </div>
                </div>
            </div>
            <?php 
            if(have_rows("our_services_call_out_box_bottom","option")){?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="our-services-feature-3 small-feature-box">
                            <?php 
                            while(have_rows("our_services_call_out_box_bottom","option")){ the_row();
                                //common function - code in functions.php
                                call_out_box();
                            }?>
                        </div>
                    </div>
                </div>
                <?php
            } 
            if (have_rows("booking_contact_details")) { ?>
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        while (have_rows("booking_contact_details")) {
                            the_row();
                            $oh_book_title          = get_sub_field("oh_book_title");
                            $anchor_dummy_text      = "LEARN MORE";
                            $therapy_button_link    = get_sub_field("oh_ind_therapy_button_link");
                            $services_button_link   = get_sub_field("other_services_button_link");
                            $oh_book_image          = get_sub_field("oh_book_image");
                            $oh_book_content        = get_sub_field("oh_book_content");
                            if (!empty($oh_book_title) || !empty($therapy_button_link) || !empty($services_button_link) || !empty($oh_book_image) || !empty($oh_book_content)) { ?>
                                <div class="how-to-book-box-wp">
                                    <?php
                                    if (!empty($oh_book_image)) { ?>
                                        <div class="how-to-book-image-box">
                                            <div class="how-to-book-image gradient-border">
                                                <div class="back-img" style="background-image: url('<?php echo esc_url($oh_book_image); ?>');"></div>
                                            </div>
                                        </div>
                                    <?php
                                    } ?>
                                    <div class="how-to-book-box-content">
                                        <?php
                                        if (!empty($oh_book_title)) { ?>
                                            <div class="how-to-book-title">
                                                <h4><?php echo esc_html($oh_book_title); ?></h4>
                                            </div>
                                        <?php
                                        }
                                        if (!empty($oh_book_content)) { ?>
                                            <div class="how-to-book-description-text">
                                                <?php echo wp_kses_post($oh_book_content); ?>
                                            </div>
                                        <?php
                                        } ?>
                                    </div>
                                    <div class="how-to-book-btn">
                                        <?php
                                        if (!empty($therapy_button_link)) { ?>
                                            <a href="<?php echo esc_attr($therapy_button_link['url']); ?>" class="sec-btn outline-white-btn" title="<?php echo esc_attr(ucfirst(strtolower($therapy_button_link['title']))); ?>" target="<?php echo esc_attr($therapy_button_link['target']); ?>"><?php echo esc_html($therapy_button_link['title']); ?></a>
                                        <?php
                                        }
                                        if (!empty($services_button_link)) { ?>
                                            <a href="<?php echo esc_attr($services_button_link['url']); ?>" class="sec-btn outline-white-btn" title="<?php echo esc_attr(ucfirst(strtolower($services_button_link['title']))); ?>" target="<?php echo esc_attr($services_button_link['target']); ?>"><?php echo esc_html($services_button_link['title']); ?></a>
                                        <?php
                                        } ?>
                                    </div>
                                </div>
                        <?php
                            }
                        } ?>
                    </div>
                </div>
            <?php
            } ?>
        </div>
    </section>
    <!-- Our Services Section End -->
<?php
}
$oh_faq_title   = get_field("oh_faq_title");
if (!empty($oh_faq_title) || have_rows("oh_faq_details")) { ?>
    <!-- FAQ Section Start -->
    <section class="faq-sec">
        <div class="banner-bg back-img" style="background-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/futuristic-bg.png');"></div>
        <div class="container"  id="work-with-us">
			<div class="row oh-new-form">
				<div class="col-lg-8 mx-auto">
					<h3>
						Work With Us
					</h3>
					<?php echo do_shortcode('[contact-form-7 id="fe18563" title="OH Therapist online application"]'); ?>
				</div>
			</div>
            <?php
            if (!empty($oh_faq_title)) { ?>
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="faq-sec-title-wp">
                            <div class="sec-title text-center white-text">
                                <h2 class="h2-title"><?php echo esc_html($oh_faq_title); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            if (have_rows("oh_faq_details")) { ?>
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="faq-content-box-wp">
                            <?php
                            while (have_rows("oh_faq_details")) {
                                the_row();
                                $faq_question   = get_sub_field("faq_question");
                                $faq_answer     = get_sub_field("faq_answer");
                                if (!empty($faq_question) || !empty($faq_answer)) { ?>
                                    <div class="faq-box <?php echo (get_row_index() === 1) ? 'active' : ""; ?>">
                                        <?php
                                        if (!empty($faq_question)) { ?>
                                            <h5 class="faq-box-title"><?php echo esc_html($faq_question); ?> <span class="faq-icon"></span></h5>
                                        <?php
                                        }
                                        if (!empty($faq_answer)) { ?>
                                            <div class="faq-content">
                                                <div class="faq-text">
                                                    <?php echo wp_kses_post($faq_answer); ?>
                                                </div>
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
    </section>
    <!-- FAQ Section End -->
<?php
} ?>