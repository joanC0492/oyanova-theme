<?php
$media_press_main_title     = get_field("media_press_main_title");
$media_press_main_content   = get_field("media_press_main_content");
$featured_article_title     = get_field("media_press_featured_articles_title");
$articles_button_text       = get_field("media_press_articles_button_text");
$args = array( 
    "post_type"         =>  "media-press",
    "posts_per_page"    =>  "-1",
    "post_status"       =>  "publish",
    "meta_query" => array(
		array(
			'key' => 'featured_article',
			'value' => '1',
		)
	)
);
$query = new WP_Query($args);
if($query->have_posts() || !empty($media_press_main_title) || !empty($media_press_main_content) || !empty($featured_article_title) || !empty($articles_button_text)){?>
    <!-- Media + Press About Section start -->
    <section class="media-press-about-sec radial-gradient">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-wp white-text text-center">
                        <?php 
                        if(!empty($media_press_main_title)){?>
                            <h1 class="h2-title"><?php echo esc_html($media_press_main_title); ?></h1>
                            <?php
                        }
                        echo (!empty($media_press_main_content)) ? wp_kses_post($media_press_main_content) : "";
                        ?>
                    </div>
                </div>
            </div>
            <?php 
            if($query->have_posts()){?>
                <div class="row">
                    <div class="col-lg-12">
                        <?php 
                        if(!empty($featured_article_title)){?>
                            <div class="featured-articles-title-wp white-text">
                                <h4 class="h4-title"><?php echo esc_html($featured_article_title); ?></h4>
                            </div>
                            <?php
                        }?>
                        <div class="featured-articles-content-row">
                            <?php 
                            while($query->have_posts()){ $query->the_post();
                                $post_thumbnail = get_the_post_thumbnail_url();
                                $box_title      = get_the_title();
                                $brand_image    = get_field("website_image");
                                $website_link   = (get_field("website_link")) ? get_field("website_link") : "javascript:void(0);";
                                $targetClass    = ($website_link!=="javascript:void(0);") ? "target='_blank'" : "";
                                if(!empty($post_thumbnail) || !empty($box_title) || !empty($brand_image) || !empty($articles_button_text)){?>
                                    <div class="featured-articles-content">
                                        <div class="featured-articles-images-wp">
                                            <?php 
                                            if(!empty($brand_image)){?>
                                                <div class="featured-articles-logo-box-wp">
                                                    <a href="<?php echo esc_attr($website_link); ?>" title="<?php echo esc_attr($box_title); ?>" <?php echo $targetClass; ?>>
                                                        <div class="featured-articles-logo-box gradient-border">
                                                            <img src="<?php echo esc_url($brand_image['url']); ?>" width="<?php echo esc_attr($brand_image['width']); ?>" height="<?php echo esc_attr($brand_image['height']); ?>" alt="<?php echo esc_attr($brand_image['alt']); ?>">
                                                        </div>
                                                    </a>
                                                </div>
                                                <?php
                                            }
                                            if(!empty($post_thumbnail)){?>
                                                <div class="featured-articles-image-box">
                                                    <div class="featured-articles-image">
                                                        <div class="back-img" style="background-image: url('<?php echo esc_url($post_thumbnail); ?>');"></div>
                                                    </div>
                                                </div>
                                                <?php
                                            }?>
                                        </div>
                                        <?php 
                                        if(!empty($box_title)){?>
                                            <div class="featured-articles-content-text-wp">
                                                <div class="featured-articles-content-description">
                                                    <p><?php echo esc_html($box_title); ?></p>
                                                </div>
                                                <?php
                                                if(!empty($articles_button_text)){?>
                                                    <div class="featured-articles-content-btn">
                                                        <a href="<?php echo esc_attr($website_link); ?>" class="sec-btn outline-white-btn" title="<?php echo esc_attr(ucfirst(strtolower($articles_button_text.", ".$box_title))); ?>" <?php echo $targetClass; ?>><?php echo esc_html($articles_button_text); ?></a>
                                                    </div>
                                                    <?php
                                                }?>
                                            </div>
                                            <?php
                                        }?>
                                    </div>
                                    <?php
                                }
                            } 
                            wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
                <?php
            }?>
        </div>
    </section>
    <!-- Media + Press About Section End -->
    <?php
}
$media_appear_videos_title  = get_field("media_appear_videos_title");
if(!empty($media_appear_videos_title) || have_rows("media_appear_videos")){?>
    <!-- Media Appearances Section Start -->
    <section class="media-appearances-sec back-img" style="background-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/tv-background-image-min.jpg');">
        <div class="container">
            <?php 
            if(!empty($media_appear_videos_title)){?>   
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sec-title white-text text-center">
                            <h4 class="h4-title"><?php echo esc_html($media_appear_videos_title); ?></h4>
                        </div>
                    </div>
                </div>
                <?php
            }
            if(have_rows("media_appear_videos")){?>
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="media-slider-wp">
                            <div class="row media-slider">
                                <?php 
                                while(have_rows("media_appear_videos")){ the_row();
                                    $video_caption      = get_sub_field("video_caption");
                                    $iframe_video_link  = get_sub_field("iframe_video_link");
                                    if(!empty($video_caption) || !empty($iframe_video_link)){?>
                                        <div class="col-lg-12">
                                            <div class="media-slider-content">
                                                <?php 
                                                if(!empty($iframe_video_link)){?>
                                                    <div class="media-slide-image-box">
                                                        <?php echo $iframe_video_link; ?>
                                                    </div>
                                                    <?php
                                                }
                                                if(!empty($video_caption)){?>
                                                    <div class="media-image-info">
                                                        <p><?php echo esc_html($video_caption); ?></p>
                                                    </div>
                                                    <?php
                                                }?>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }?>
        </div>
    </section>
    <!-- Media Appearances Section End -->
    <?php
}
$inquiry_title          = get_field("inquiry_title");
$inquiry_button_link    = (get_field("inquiry_button_link")) ? get_field("inquiry_button_link") : "javascript:void(0);";
$inquiry_image          = get_field("inquiry_image");
if(!empty($inquiry_title) || !empty($inquiry_button_link) || !empty($inquiry_image)){?>
    <!-- Inquire About Section Start -->
    <section class="inquire-about-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="how-to-book-box-wp">
                        <?php 
                        if(!empty($inquiry_image)){?>
                            <div class="how-to-book-image-box">
                                <div class="how-to-book-image gradient-border">
                                    <div class="back-img" style="background-image: url('<?php echo esc_url($inquiry_image); ?>');"></div>
                                </div>
                            </div>
                            <?php
                        } 
                        if(!empty($inquiry_title)){?>
                            <div class="how-to-book-box-content">
                                <div class="how-to-book-title">
                                    <h4><?php echo esc_html($inquiry_title); ?></h4>
                                </div>
                            </div>
                            <?php
                        }?>
                        <div class="how-to-book-btn">
                            <a href="<?php echo esc_attr($inquiry_button_link['url']); ?>" class="sec-btn outline-white-btn" title="<?php echo esc_attr(ucfirst(strtolower($inquiry_button_link['title']))); ?>" target="<?php echo esc_attr($inquiry_button_link['target']); ?>"><?php echo esc_attr($inquiry_button_link['title']); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inquire About Section End -->
    <?php
}?>
