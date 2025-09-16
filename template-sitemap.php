<?php

/**
 * The template for displaying the sitemap page
 * Template Name: Sitemap
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */
get_header();
$cur_page_id    = get_the_ID();
?>

<!-- Banner Start -->
<section class="inner-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-content white-text text-center">
                    <h1 class="h1-title"><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner End -->

<div class="inner-page-text privacy-content site-map">
    <div class="banner-bg back-img" style="background-image: url('<?php echo home_url(); ?>/wp-content/uploads/2024/09/futuristic-bg.png');"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main">
                        <?php
                        $postsArgs = array(
                            'post_type' => 'page',
                            'posts_per_page' => '-1',
                            'post_status' => 'publish'
                        );
                        $postsLoop = new WP_Query($postsArgs);
                        if ($postsLoop->have_posts()) { ?>
                            <h2 id="sitemap-pages">Pages</h2>
                            <ul>
                                <?php
                                while ($postsLoop->have_posts()) {
                                    $postsLoop->the_post();
                                    $current_page_url = get_permalink($cur_page_id);
                                    if (get_permalink() != $current_page_url) { ?>
                                        <li <?php post_class(); ?>><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
                                    <?php }
                                    wp_reset_query(); ?>
                                <?php
                                } ?>
                            </ul>
                        <?php } ?>

                        <?php
                        $postsArgs = array(
                            'post_type' => 'post',
                            'posts_per_page' => '-1',
                            'post_status' => 'publish'
                        );
                        $postsLoop = new WP_Query($postsArgs);
                        if ($postsLoop->have_posts()) { ?>
                            <h2 id="sitemap-posts">Posts</h2>
                            <ul>
                                <?php
                                while ($postsLoop->have_posts()) {
                                    $postsLoop->the_post();
                                ?>
                                    <li <?php post_class(); ?>><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
                                <?php }
                                wp_reset_query(); ?>
                            </ul>
                        <?php } ?>

                        <?php
                        $tags = get_tags(array(
                            // 'exclude' => '',
                        ));
                        if ($tags) { ?>
                            <h2 id="sitemap-posts-tags">Post Tags</h2>
                            <ul>
                                <?php foreach ($tags as $tag) { ?>
                                    <li class="tag-id-<?php echo $tag->term_id ?>"><a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name ?></a></li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
