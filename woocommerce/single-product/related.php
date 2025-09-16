<?php
// File: your-theme/woocommerce/single-product/related.php

if ( $related_products ) : ?>

    <section class="related products">

    	<h3>Also you may like</h3>

        <div class="ctm-product-slider woocommerce-products-carousel"> <!-- Add your custom slider class here -->

            <?php foreach ( $related_products as $related_product ) : ?>

                <?php
                $post_object = get_post( $related_product->get_id() );
                setup_postdata( $GLOBALS['post'] =& $post_object );

                // Get WooCommerce product object
                $product = wc_get_product( $related_product->get_id() );
                $thumbnail_id = get_post_thumbnail_id( $related_product->get_id() );
                $alt_text = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true ); // Get the alt text
                ?>

                <div class="ctm-pro-slide">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php
                        // Check if the post has a thumbnail, else set a placeholder image
                        if (has_post_thumbnail()) {
                            echo get_the_post_thumbnail($related_product->get_id(), 'large', array('alt' => $alt_text));
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
                        $description = wp_trim_words( get_the_excerpt(), 6 ); // Limiting description to 6 words
                        if (!empty($description)) {
                            echo esc_html($description);
                        }
                        ?>
                    </p>

                    <!-- Display the product price -->
                    <span><?php echo $product->get_price_html(); ?></span>
                </div>

            <?php endforeach; ?>

        </div>
    </section>

<?php endif;

wp_reset_postdata();
?>
