<?php 

function ctm_product_slider(){
	?>

	<div class="ctm-product-slider">
		<?php
    // Query for WooCommerce products
		$args = array(
			'post_type' => 'product',
        	'posts_per_page' => 10, // Adjust the number of products displayed
        );
		
		$query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
        global $post; // Ensure $post is defined
        $product = wc_get_product($post->ID); // Get WooCommerce product object

        $thumbnail_id = get_post_thumbnail_id($post->ID);
        $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); // Get the alt text
        ?>
        <div class="ctm-pro-slide">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php
                // Check if the post has a thumbnail, else set a placeholder image
                if (has_post_thumbnail()) {
                    echo get_the_post_thumbnail($post->ID, 'large', array('alt' => $alt_text));
                } else {
                    // Set a placeholder image if no product image is found
                    echo '<img src="' . esc_url(site_url() . '/wp-content/uploads/2024/09/oynova-placeholder.jpg') . '" alt="Placeholder Image">';
                }
                ?>
                <h2><?php the_title(); ?></h2>
            </a>
            <!-- Sub-head with dynamic excerpt from product description -->
            <p class="sub-head">
                <?php
                // Get the product's short description (WooCommerce excerpt)
                $description = wp_trim_words($post->post_content, 6); // Limiting description to 10 words
                if (!empty($description)) {
                    echo esc_html($description);
                } 
                ?>
            </p>
            <!-- Display the product price -->
            <span><?php echo $product->get_price_html(); ?></span>
        </div>
        <?php
    endwhile;
    wp_reset_postdata(); // Reset post data after the custom query
endif;

?>
</div>

<?php }