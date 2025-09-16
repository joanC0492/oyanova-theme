<?php  
$oyanova_main_title         = get_field("oyanova_main_title");
$oyanova_sub_title          = get_field("oyanova_sub_title");
$oyanova_main_content       = get_field("oyanova_main_content");
$oyanova_bubbles_main_title = get_field("oyanova_bubbles_main_title");
$oyanova_bubbles_main_logo  = get_field("oyanova_bubbles_main_logo");
if(!empty($oyanova_main_title) || !empty($oyanova_sub_title) || !empty($oyanova_main_content) || !empty($oyanova_bubbles_main_title) || !empty($oyanova_bubbles_main_logo) || have_rows("oyanova_bubbles")){?>
    <section class="main-foster radial-gradient">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-wp white-text text-center">
                        <?php 
                        if(!empty($oyanova_main_title)){?>
                            <h1 class="h1-title"><?php echo esc_html($oyanova_main_title); ?></h1>
                            <?php
                        }
                        if(!empty($oyanova_sub_title)){?>
                            <div class="sec-sub-title">
                                <h4 class="h4-title"><?php echo esc_html($oyanova_sub_title); ?></h4>
                            </div>
                            <?php
                        }
                        //Banner Content
                        echo !empty($oyanova_main_content) ? wp_kses_post($oyanova_main_content) : "";
                        ?>
                    </div>
                    <?php 
                    if(have_rows("oyanova_bubbles")){ ?>
                        <div class="foster-bubble-wp">
                            <div class="foster-bubble-title-wp">
                                <div class="foster-bubble-title-inner back-img"
                                    style="background-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/power-of-community.png');">
                                    <?php 
                                    if(!empty($oyanova_bubbles_main_logo)){?>
                                        <img src="<?php echo esc_url($oyanova_bubbles_main_logo['url']); ?>"
                                            width="<?php echo esc_attr($oyanova_bubbles_main_logo['width']); ?>" height="<?php echo esc_attr($oyanova_bubbles_main_logo['height']); ?>" alt="<?php echo esc_attr($oyanova_bubbles_main_logo['alt']); ?>">
                                        <?php
                                    }
                                    if(!empty($oyanova_bubbles_main_title)){?>
                                        <div class="foster-bubble-title">
                                            <h3 class="h3-title"><?php echo wp_kses($oyanova_bubbles_main_title, array("span"=>array())); ?></h3>
                                        </div>
                                        <?php
                                    }?>
                                </div>
                            </div>
                            <div class="foster-category-content-wp">
                                <?php 
                                while (have_rows("oyanova_bubbles")) { the_row();

                                    if(get_row_layout() == "foster_bubble_chart"){
                                        $foster = get_sub_field("foster");
                                        ?>
                                        <div class="foster-category-content education">
                                            <?php 
                                            if(!empty($foster)){?>
                                                <div class="foster-category-title education">
                                                    <h5 class="h5-title"><?php echo wp_kses($foster, array("span"=>array())); ?></h5>
                                                </div>
                                                <?php
                                            }
                                            if(have_rows("childs")){  
                                                $foster_cat_index   = 0;
                                                $foster_cat_classes = ['sb-104','sb-93','sb-76','sb-88','sb-99','sb-104','sb-72','sb-104','sb-104','sb-104'];
                                                ?>
                                                <div class="foster-circle-wp education">
                                                    <?php 
                                                    while(have_rows("childs")){ the_row(); 
                                                        $f_child_class = isset($foster_cat_classes[$foster_cat_index]) ? $foster_cat_classes[$foster_cat_index] : '';
                                                        $name = get_sub_field("name");
                                                        if(!empty($name)){?>
                                                            <div class="bubble-circle education <?php echo $f_child_class; ?>">
                                                                <p><?php echo esc_html($name); ?></p>
                                                            </div>
                                                            <?php
                                                        }
                                                        $foster_cat_index++; 
                                                    }?>
                                                </div>
                                                <?php
                                            }?>
                                        </div>
                                        <?php
                                    }
                                    elseif(get_row_layout() == "cultural_bubble_chart"){
                                        $title = get_sub_field("title");
                                        ?>
                                        <div class="foster-category-content cultural">
                                            <?php 
                                            if(!empty($title)){?>
                                                <div class="foster-category-title cultural">
                                                    <h5 class="h5-title"><?php echo wp_kses($title, array("span"=>array())); ?></h5>
                                                </div>
                                                <?php   
                                            }
                                            if(have_rows("childs")){  
                                                $cultural_cat_index   = 0;
                                                $cultural_cat_classes = ['sb-88','sb-107','sb-82','sb-86','sb-101','sb-101','sb-121'];
                                                ?>
                                                <div class="foster-circle-wp cultural">
                                                    <?php 
                                                    while(have_rows("childs")){ the_row(); 

                                                        $c_child_class = isset($cultural_cat_classes[$cultural_cat_index]) ? $cultural_cat_classes[$cultural_cat_index] : '';
                                                        $name = get_sub_field("name");

                                                        if(!empty($name)){?>
                                                            <div class="bubble-circle cultural <?php echo $c_child_class; ?>">
                                                                <p><?php echo esc_html($name); ?></p>
                                                            </div>
                                                            <?php
                                                        }
                                                        $cultural_cat_index++; 
                                                    }?>
                                                </div>
                                                <?php
                                            }?>
                                        </div>
                                        <?php
                                    }
                                    elseif(get_row_layout() == "amplify_bubble_chart"){
                                        $a_title = get_sub_field("title");
                                        ?>
                                        <div class="foster-category-content growth">
                                            <?php 
                                            if(!empty($a_title)){?>
                                                <div class="foster-category-title growth">
                                                    <h5 class="h5-title"><?php echo wp_kses($a_title,array("span"=>array())); ?></h5>
                                                </div>
                                                <?php
                                            } 
                                            if(have_rows("childs")){  
                                                $growth_cat_index   = 0;
                                                $growth_cat_classes = ['sb-121','sb-109','sb-111','sb-117','sb-103','sb-107','sb-95','sb-109'];
                                                ?>
                                                <div class="foster-circle-wp growth">
                                                    <?php 
                                                    while(have_rows("childs")){ the_row(); 
                                                        $a_child_class = isset($growth_cat_classes[$growth_cat_index]) ? $growth_cat_classes[$growth_cat_index] : '';
                                                        $name = get_sub_field("name");  
                                                        if(!empty($name)){?>
                                                            <div class="bubble-circle growth <?php echo $a_child_class; ?>">
                                                                <p><?php echo esc_html($name); ?></p>
                                                            </div>
                                                            <?php
                                                        }
                                                        $growth_cat_index++; 
                                                    }?>
                                                </div>
                                                <?php
                                            }?>
                                        </div>
                                        <?php
                                    }
                                }?>
                            </div>
                        </div>
                        <?php
                    }?>
                </div>
            </div>
        </div>
    </section>
    <?php
}
$oyanova_foster_title       = get_field("oyanova_foster_title");
$oyanova_foster_sub_title   = get_field("oyanova_foster_sub_title");
$oyanova_foster_content     = get_field("oyanova_foster_content");
$oyanova_foster_images      = get_field("oyanova_foster_images");
if(!empty($oyanova_foster_title) || !empty($oyanova_foster_sub_title) || !empty($oyanova_foster_content) || !empty($oyanova_foster_images)){?>
<section class="main-foundation">
    <div class="bg-shape-leaf mask-img"
        style="-webkit-mask-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/small-leaf-shape.svg');">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="oyanova-content foundation-content">
                    <div class="title-wp title-wp-2 white-text">
                        <?php 
                            if(!empty($oyanova_foster_title)){?>
                        <h2 class="h2-title"><?php echo esc_html($oyanova_foster_title); ?></h2>
                        <?php
                            }
                            if(!empty($oyanova_foster_sub_title)){?>
                        <p><?php echo esc_html($oyanova_foster_sub_title); ?></p>
                        <?php
                            }?>
                    </div>
                    <?php 
                        if(!empty($oyanova_foster_content)){?>
                    <div class="descrip-text white-text">
                        <?php echo wp_kses_post($oyanova_foster_content); ?>
                    </div>
                    <?php
                        }?>
                </div>
            </div>
            <?php 
                if(!empty($oyanova_foster_images)){?>
            <div class="col-lg-6">
                <div class="foundation-img-wp">
                    <?php 
                            foreach ($oyanova_foster_images as $image) {?>
                    <div class="foundation-img gradient-border">
                        <div class="back-img" style="background-image: url('<?php echo esc_url($image); ?>');"></div>
                    </div>
                    <?php
                            }?>
                </div>
            </div>
            <?php
                }?>
        </div>
    </div>
</section>
<?php
} 
$oyanova_celebrate_title        = get_field("oyanova_celebrate_title");
$oyanova_celebrate_sub_title    = get_field("oyanova_celebrate_sub_title");
$oyanova_celebrate_images       = get_field("oyanova_celebrate_images");
$oyanova_celebrate_content      = get_field("oyanova_celebrate_content");
if(!empty($oyanova_celebrate_title) || !empty($oyanova_celebrate_sub_title) || !empty($oyanova_celebrate_images) || !empty($oyanova_celebrate_content)){?>
<section class="main-celebrate radial-gradient">
    <div class="bg-shape-leaf mask-img"
        style="-webkit-mask-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/small-leaf-shape.svg');">
    </div>
    <div class="container">
        <div class="row">
            <?php 
                if(!empty($oyanova_celebrate_images)){?>
            <div class="col-lg-6">
                <div class="celebrate-img-wp">
                    <?php
                            foreach($oyanova_celebrate_images as $celeb_image){?>
                    <div class="celebrate-img gradient-border">
                        <div class="back-img" style="background-image: url('<?php echo esc_url($celeb_image); ?>');">
                        </div>
                    </div>
                    <?php
                            }?>
                </div>
            </div>
            <?php
                }?>
            <div class="col-lg-6">
                <div class="oyanova-content celebrate-content">
                    <div class="title-wp title-wp-2 white-text">
                        <?php 
                            if(!empty($oyanova_celebrate_title)){?>
                        <h2 class="h2-title"><?php echo esc_html($oyanova_celebrate_title); ?></h2>
                        <?php
                            }
                            if(!empty($oyanova_celebrate_sub_title)){?>
                        <p><?php echo esc_html($oyanova_celebrate_sub_title); ?></p>
                        <?php
                            }?>
                    </div>
                    <?php 
                        if(!empty($oyanova_celebrate_content)){?>
                    <div class="descrip-text white-text">
                        <?php echo wp_kses_post($oyanova_celebrate_content); ?>
                    </div>
                    <?php
                        }?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
$oyanova_amplify_title          = get_field("oyanova_amplify_title");
$oyanova_amplify_sub_title      = get_field("oyanova_amplify_sub_title");
$oyanova_button_text            = get_field("oyanova_button_text");
$oyanova_button_link            = (get_field("oyanova_button_link")) ? get_field("oyanova_button_link") : "javascript:void(0);";
$oyanova_target_section_id      = get_field("oyanova_target_section_id");
$oyanova_amplify_content        = get_field("oyanova_amplify_content");
$oyanova_amplify_images         = get_field("oyanova_amplify_images");
if(!empty($oyanova_amplify_title) || !empty($oyanova_amplify_sub_title) || !empty($oyanova_button_text) || !empty($oyanova_target_section_id) || !empty($oyanova_amplify_content) || !empty($oyanova_amplify_images)){?>
<section class="main-amplify light-overlay">
    <div class="banner-bg back-img"
        style="background-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/wave-bg-shape.png');"></div>
    <div class="small-leaf-shape mask-img"
        style="-webkit-mask-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/small-leaf-shape.svg');">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="oyanova-content amplify-content">
                    <div class="title-wp title-wp-2">
                        <?php 
                            if(!empty($oyanova_amplify_title)){?>
                        <h2 class="h2-title"><?php echo esc_html($oyanova_amplify_title); ?></h2>
                        <?php
                            }
                            if(!empty($oyanova_amplify_sub_title)){?>
                        <p><?php echo esc_html($oyanova_amplify_sub_title); ?></p>
                        <?php
                            }?>
                    </div>
                    <?php 
                        if(!empty($oyanova_amplify_content)){?>
                    <div class="descrip-text">
                        <?php echo wp_kses_post($oyanova_amplify_content); ?>
                    </div>
                    <?php
                        } 
                        if(!empty($oyanova_button_text) || !empty($oyanova_target_section_id)){?>
                    <a href="<?php echo esc_attr($oyanova_button_link."".$oyanova_target_section_id); ?>"
                        class="sec-btn outline-btn"
                        title="<?php echo esc_attr($oyanova_button_text); ?>"><?php echo esc_html($oyanova_button_text); ?></a>
                    <?php
                        }?>
                </div>
            </div>
            <?php 
                if(!empty($oyanova_amplify_images)){?>
            <div class="col-lg-6">
                <div class="amplify-img-wp">
                    <?php
                            foreach($oyanova_amplify_images as $amplify_image){?>
                    <div class="amplify-img gradient-border">
                        <div class="back-img" style="background-image: url('<?php echo esc_url($amplify_image); ?>');">
                        </div>
                    </div>
                    <?php
                            }?>
                </div>
            </div>
            <?php
                }?>
        </div>
    </div>
</section>
<script>
const bubbleContainer = document.querySelector('.foster-bubble-wp');

if (bubbleContainer) {

    bubbleContainer.querySelectorAll('.bubble-circle').forEach(bubble => {
        bubble.addEventListener('mouseenter', () => {
            const category = bubble.classList.contains('education') 
                ? 'education' 
                : bubble.classList.contains('cultural') 
                ? 'cultural' 
                : 'growth';

            const title = document.querySelector(`.foster-category-title.${category} h5`);
            if (title) {
                title.classList.add(`text-shadow-${category}`);
            }
        });

        bubble.addEventListener('mouseleave', () => {
            const category = bubble.classList.contains('education') 
                ? 'education' 
                : bubble.classList.contains('cultural') 
                ? 'cultural' 
                : 'growth';

            const title = document.querySelector(`.foster-category-title.${category} h5`);
            if (title) {
                title.classList.remove(`text-shadow-${category}`);
            }
        });
    });
}
</script>
<?php
}?>