<?php 
$our_story_title    = get_field("our_story_title");
$our_story_images   = get_field("our_story_images");
$our_story_content  = get_field("our_story_content");
if(!empty($our_story_title) || !empty($our_story_images) || !empty($our_story_content)){?>
    <!-- Our Story Banner Section Start -->
    <section class="our-story-banner">
        <div class="big-leaf-shape mask-img" style="-webkit-mask-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/big-leaf-shape.svg');"></div>
        <div class="banner-bg back-img" style="background-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/futuristic-bg.png');"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="our-story-content">
                        <div class="title-wp white-text text-center">
                            <?php 
                            if(!empty($our_story_title)){?>
                                <h1 class="h1-title"><?php echo esc_html($our_story_title); ?></h1>
                                <?php
                            }
                            //Content
                            echo ($our_story_content) ? wp_kses_post($our_story_content) : "";
                            ?>
                        </div>
                        <?php 
                        if(!empty($our_story_images)){ 
                            $image_index = 1;
                            $image_class = "small-img";?>
                            <div class="our-story-image-row">
                                <?php
                                foreach ($our_story_images as $story_image) {?>
                                    <div class="our-story-image back-img <?php echo ($image_index == 1 ? "" : "small-img"); ?>" style="background-image: url('<?php echo esc_url($story_image); ?>');"></div>
                                    <?php   
                                    $image_index++;
                                }?>
                            </div>
                            <?php
                        }?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Story Banner Section End -->
    <?php
}
$our_story_why_oya_title        = get_field("our_story_why_oya_title");
$our_story_why_oya_sub_title    = get_field("our_story_why_oya_sub_title");
if(!empty($our_story_why_oya_title) || !empty($our_story_why_oya_sub_title) || have_rows("our_story_why_oya_points") || have_rows("our_story_call_out_box")){?>
    <!-- Why Oya In Section Start -->
    <section class="why-oya-in-sec radial-gradient">
        <div class="big-leaf-shape-right big-leaf-shape mask-img" style="-webkit-mask-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/big-leaf-shape.svg');"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="why-oya-in-content">
                        <div class="why-oya-in-title white-text">
                            <?php
                            if(!empty($our_story_why_oya_title)){?>
                                <h3 class="h3-title"><?php echo esc_html($our_story_why_oya_title); ?></h3>
                                <?php
                            } 
                            if(!empty($our_story_why_oya_sub_title)){?>
                                <h6 class="h6-title"><?php echo esc_html($our_story_why_oya_sub_title); ?></h6>
                                <?php
                            }?>
                        </div>
                        <?php 
                        if(have_rows("why_oyanova_call_out_box_top", "option")){
                            while(have_rows("why_oyanova_call_out_box_top", "option")){ the_row();

                                //common function - code in functions.php
                                call_out_box();

                            }
                        }?>
                    </div>
                </div>
            </div>
            <?php 
            if(have_rows("our_story_why_oya_points")){?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="why-oya-in-image-row">
                            <?php
                            while(have_rows("our_story_why_oya_points")){ the_row();
                                $why_oya_image      = get_sub_field("why_oya_image");
                                $why_oya_content    = get_sub_field("why_oya_content");
                                if(!empty($why_oya_image) || !empty($why_oya_content)){?>
                                    <div class="why-oya-in-image-list">
                                        <?php 
                                        if(!empty($why_oya_image)){?>
                                            <div class="about-img-wp why-oya-in-img-wp">
                                                <div class="img-leaf-shape">
                                                    <div class="about-img">
                                                        <img src="<?php echo esc_url($why_oya_image['url']); ?>" width="<?php echo esc_attr($why_oya_image['width']); ?>" height="<?php echo esc_attr($why_oya_image['height']); ?>" alt="<?php echo esc_attr($why_oya_image['alt']); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        if(!empty($why_oya_content)){?>
                                            <div class="why-oya-in-img-info">
                                               <?php echo wp_kses_post($why_oya_content); ?>
                                            </div>
                                            <?php
                                        }?>
                                    </div>
                                    <?php
                                }
                            }?>
                        </div>
                    </div>
                </div>
                <?php
            }?>
        </div>
    </section>
    <!-- Why Oya In Section End -->
    <?php
}
$our_story_purpose_title    = get_field("our_story_purpose_title");
if(!empty($our_story_purpose_title) || have_rows("our_story_purpose_details")){?>
    <!-- Our Purpose Section Start -->
    <section class="our-purpose-sec">
        <div class="banner-bg back-img" style="background-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/futuristic-bg.png');"></div>
        <div class="container">
            <?php 
            if(!empty($our_story_purpose_title)){?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="our-purpose-title white-text">
                            <h2 class="h2-title"><?php echo esc_html($our_story_purpose_title); ?></h2>
                        </div>
                    </div>
                </div>
                <?php
            }
            if(have_rows("our_story_purpose_details")){?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="our-purpose-row-wp">
                            <?php 
                            while(have_rows("our_story_purpose_details")){ the_row();

                                $detail_title           = get_sub_field("detail_title");
                                $detail_button_text     = get_sub_field("detail_button_text");
                                $detail_button_link     = (get_sub_field("detail_button_link")) ? get_sub_field("detail_button_link") : "javascript:void(0);";
                                $detail_image           = get_sub_field("detail_image");
                                $detail_content         = get_sub_field("detail_content");

                                if(!empty($detail_title) || !empty($detail_button_text) || !empty($detail_image) || !empty($detail_content)){?>
                                    <div class="our-purpose-row-list">
                                        <div class="our-purpose-content">
                                            <?php 
                                            if(!empty($detail_title)){?>
                                                <div class="sec-title white-text">
                                                    <h4 class="h4-title"><?php echo esc_html($detail_title); ?></h4>
                                                </div>
                                                <?php
                                            }?>
                                            <div class="our-purpose-content-description">
                                                <?php 
                                                if(!empty($detail_content)){?>
                                                    <div class="our-purpose-content-description-text">
                                                        <?php echo wp_kses_post($detail_content); ?>
                                                    </div>
                                                    <?php
                                                }
                                                if(!empty($detail_button_text)){?>
                                                    <div class="our-purpose-content-btn">
                                                        <a href="<?php echo esc_attr($detail_button_link); ?>" class="sec-btn outline-white-btn" title="<?php echo esc_attr(ucfirst(strtolower($detail_button_text))); ?>"><?php echo esc_html($detail_button_text); ?></a>
                                                    </div>
                                                    <?php
                                                }?>
                                            </div>
                                        </div>
                                        <?php 
                                        if(!empty($detail_image)){?>
                                            <div class="our-purpose-image-box">
                                                <div class="our-purpose-image gradient-border">
                                                    <div class="back-img" style="background-image: url('<?php echo esc_url($detail_image); ?>');"></div>
                                                </div>
                                            </div>
                                            <?php
                                        }?>
                                    </div>
                                    <?php
                                }
                            }?>
                        </div>
                    </div>
                </div>
                <?php
            }?>
        </div>
    </section>
    <!-- Our Purpose Section End -->
    <?php
}

$our_story_founder_title    = get_field("our_story_founder_title");
if(!empty($our_story_founder_title) || have_rows("our_story_founder_details") || have_rows("our_founder_call_out_box_top", "option")){?>
    <!-- Our Founders Section Start -->
    <section class="our-founders-sec light-overlay">
        <div class="banner-bg back-img" style="background-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/wave-bg-shape.png');"></div>
        <div class="container">
            <?php
            if(have_rows("our_founder_call_out_box_top", "option")){?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="our-founders-feature">
                            <?php 
                            while(have_rows("our_founder_call_out_box_top", "option")){ the_row();

                               //common function - code in functions.php
                               call_out_box();

                            }?>
                        </div>
                    </div>
                </div>
                <?php 
            }
            if(!empty($our_story_founder_title)){?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="our-founders-main-title">
                            <h2 class="h2-title border-title"><?php echo esc_html($our_story_founder_title); ?></h2>
                        </div>
                    </div>
                </div>
                <?php
            } 
            if(have_rows("our_story_founder_details")){?>
                <div class="main-our-founders-row-wp">
                    <?php 
                    while(have_rows("our_story_founder_details")){  the_row();

                        $founder_title                  = get_sub_field("founder_title");
                        $founder_sub_title              = get_sub_field("founder_sub_title");
                        $founder_contact_card_title     = get_sub_field("founder_contact_card_title");
                        $founder_button_text            = get_sub_field("founder_button_text");
                        $founder_button_link            = (get_sub_field("founder_button_link")) ? get_sub_field("founder_button_link") : "javascript:void(0);";
                        $target_class                   = ($founder_button_link!=="javascript:void(0);" && !empty($founder_button_link['target'])) ? "target='_blank'" : "";
                        $founder_content                = get_sub_field("founder_content");
                        $founder_images                 = get_sub_field("founder_images");
                        $training_experience_content    = get_sub_field("training_experience_content");
                        $specialities_content           = get_sub_field("specialities_content");
                        $approaches_content             = get_sub_field("approaches_content");

                        if(!empty($founder_title) || !empty($founder_sub_title) || !empty($founder_contact_card_title) || !empty($founder_button_text) || !empty($founder_content) || !empty($founder_images) || !empty($training_experience_content) || !empty($specialities_content) || !empty($approaches_content)){
                            if(get_row_index() % 2 == 0){?>
                                <div class="main-our-founders-row even">
                                    <div class="row">
                                        <div class="col-lg-8 order-2 order-lg-1">
                                            <div class="our-founders-content">
                                                <div class="sec-title">
                                                    <?php 
                                                    if(!empty($founder_title)){?>
                                                        <h4 class="h4-title"><?php echo esc_html($founder_title); ?></h4>
                                                        <?php
                                                    }
                                                    if(!empty($founder_sub_title)){?>
                                                        <p><?php echo esc_html($founder_sub_title); ?></p>
                                                        <?php
                                                    }?>
                                                </div>
                                                <div class="our-founders-content-description-wp">
                                                    <?php 
                                                    if(!empty($founder_content)){?>
                                                        <div class="our-founders-content-text">
                                                            <?php echo wp_kses_post($founder_content); ?>
                                                        </div>
                                                        <?php
                                                    } 
                                                    if(!empty($training_experience_content)){?>
                                                        <div class="our-founders-details">
                                                            <div class="details-wp">
                                                               <?php echo wp_kses_post($training_experience_content); ?>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }?>
                                                    <div class="our-founders-details other-details">
                                                        <?php 
                                                        if(!empty($specialities_content)){?>
                                                            <div class="details-wp count-2">
                                                                <?php echo wp_kses_post($specialities_content); ?>
                                                            </div>
                                                            <?php
                                                        }
                                                        if(!empty($approaches_content)){?>
                                                            <div class="details-wp">
                                                                <?php echo wp_kses_post($approaches_content); ?>
                                                            </div>
                                                            <?php
                                                        }?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                        if(!empty($founder_images)){?>
                                            <div class="col-lg-4 order-1 order-lg-2">
                                                <div class="our-founders-images-wp">
                                                    <?php
                                                    foreach($founder_images as $f_image){?> 
                                                        <div class="our-founders-img gradient-border">
                                                            <div class="back-img" style="background-image: url('<?php echo esc_url($f_image); ?>');"></div>
                                                        </div>
                                                        <?php
                                                    }?>
                                                </div>
                                            </div>
                                            <?php
                                        } 
                                        if(!empty($founder_button_text) || !empty($founder_contact_card_title)){?>
                                            <div class="col-lg-12 order-3 order-lg-3">
                                                <div class="main-our-founders-bottom-box">
                                                    <?php 
                                                    if(!empty($founder_contact_card_title)){?>
                                                        <h5 class="h5-title"><?php echo esc_html($founder_contact_card_title); ?></h5>
                                                        <?php
                                                    }
                                                    if(!empty($founder_button_text)){?>
                                                        <div class="main-our-founders-btn">
                                                            <a href="<?php echo esc_attr($founder_button_link['url']); ?>" class="sec-btn blue-outline-btn" title="<?php echo esc_attr($founder_button_text); ?>" <?php echo $target_class; ?>><?php echo esc_html($founder_button_text); ?></a>
                                                        </div>
                                                        <?php
                                                    }?>
                                                </div>
                                            </div>
                                            <?php
                                        }?>
                                    </div>
                                </div>
                                <?php
                            }else{?>
                                <div class="main-our-founders-row">
                                    <div class="row">
                                        <?php 
                                        if(!empty($founder_images)){?>
                                            <div class="col-lg-4">
                                                <div class="our-founders-images-wp">
                                                    <?php
                                                    foreach($founder_images as $f_image){?> 
                                                        <div class="our-founders-img gradient-border">
                                                            <div class="back-img" style="background-image: url('<?php echo esc_url($f_image); ?>');"></div>
                                                        </div>
                                                        <?php
                                                    }?>
                                                </div>
                                            </div>
                                            <?php
                                        } ?>
                                        <div class="col-lg-8">
                                            <div class="our-founders-content">
                                                <div class="sec-title">
                                                    <?php 
                                                    if(!empty($founder_title)){?>
                                                        <h4 class="h4-title"><?php echo esc_html($founder_title); ?></h4>
                                                        <?php
                                                    }
                                                    if(!empty($founder_sub_title)){?>
                                                        <p><?php echo esc_html($founder_sub_title); ?></p>
                                                        <?php
                                                    }?>
                                                </div>
                                                <?php 
                                                if(!empty($founder_content)){?>
                                                    <div class="our-founders-content-description-wp">
                                                        <div class="our-founders-content-text">
                                                            <?php echo wp_kses_post($founder_content); ?>
                                                        </div>
                                                    </div>
                                                    <?php
                                                } ?>
                                            </div>
                                        </div>
                                        <?php
                                        if(!empty($founder_button_text) || !empty($founder_contact_card_title)){?>
                                            <div class="col-lg-12">
                                                <div class="main-our-founders-bottom-box">
                                                    <?php 
                                                    if(!empty($founder_contact_card_title)){?>
                                                        <h5 class="h5-title"><?php echo esc_html($founder_contact_card_title); ?></h5>
                                                        <?php
                                                    }
                                                    if(!empty($founder_button_text)){?>
                                                        <div class="main-our-founders-btn">
                                                            <a href="<?php echo esc_attr($founder_button_link['url']); ?>" class="sec-btn blue-outline-btn" title="<?php echo esc_attr($founder_button_text); ?>" <?php echo $target_class; ?>><?php echo esc_html($founder_button_text); ?></a>
                                                        </div>
                                                        <?php
                                                    }?>
                                                </div>
                                            </div>
                                            <?php
                                        }?>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    } ?>
                </div>
                <?php
            }?>
        </div>
    </section>
    <!-- Our Founders Section End -->
    <?php
}?> 