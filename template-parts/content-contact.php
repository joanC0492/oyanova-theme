<?php
$contact_page_title         = get_field("contact_page_title");
$contact_page_description   = get_field("contact_page_description");
$contact_page_form          = get_field("contact_page_form");
$contact_page_image         = get_field("contact_page_image");
if(!empty($contact_page_title) || !empty($contact_page_description) || !empty($contact_page_form) || !empty($contact_page_image)){?>
    <!-- Contact About Section Start -->
    <section class="contact-about-sec">
        <div class="banner-bg back-img" style="background-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/futuristic-bg.png');"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-wp white-text">
                        <?php 
                        if(!empty($contact_page_title)){?>
                            <h1 class="h1-title"><?php echo esc_html($contact_page_title); ?></h1>
                            <?php
                        } 
                        echo !empty($contact_page_description) ? "<p>".wp_kses_post($contact_page_description)."</p>" : ""; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                if(!empty($contact_page_image)){?>
                    <div class="col-lg-6">
                        <div class="contact-about-image-box">
                            <div class="contact-about-image back-img" style="background-image: url('<?php echo esc_url($contact_page_image); ?>');">
                            </div>
                        </div>
                    </div>
                    <?php
                }
                if(!empty($contact_page_form)){?>
                    <div class="col-lg-6">
                        <div class="contact-about-form-wp">
                            <?php echo do_shortcode('[contact-form-7 id="'.$contact_page_form->ID.'" title="'.$contact_page_form->post_title.'"]'); ?>
                        </div>
                    </div>
                    <?php
                }?>
            </div>
        </div>
    </section>
    <!-- Contact About Section End -->
    <?php
}?>