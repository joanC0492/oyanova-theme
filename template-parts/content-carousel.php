<?php
/**
 * Template Part: Reusable Carousel
 */

$defaults = [
  'field'        => 'carousel',
  'source'       => get_queried_object_id(),
  'theme'        => 'partners',
  'slidesToShow' => 3,
];

$args = wp_parse_args( $args ?? [], $defaults );

$data  = get_field( $args['field'], $args['source'] );
$title = $data['carousel_title'] ?? '';
$items = $data['carousel_items'] ?? [];

if ( empty($items) ) {
  return;
}

$section_id = sanitize_html_class( $args['theme'] . '-carousel-' . wp_generate_uuid4() );

function som_img($img, $size = 'full', $extra = []) {
  if ( empty($img) ) return '';

  if ( is_numeric($img) ) {
    return wp_get_attachment_image( $img, $size, false, $extra );
  }

  if ( is_array($img) && !empty($img['ID']) ) {
    return wp_get_attachment_image( $img['ID'], $size, false, $extra );
  }

  if ( is_array($img) && !empty($img['url']) ) {
    $alt = esc_attr($img['alt'] ?? '');
    $url = esc_url($img['url']);
    $attr = '';
    foreach ($extra as $k => $v) {
      $attr .= ' ' . esc_attr($k) . '="' . esc_attr($v) . '"';
    }
    return '<img src="'.$url.'" alt="'.$alt.'"'.$attr.'>';
  }
  return '';
}
?>
<section id="<?php echo esc_attr($section_id); ?>" class="<?php echo esc_attr($args['theme']); ?>-carousel-sec">
  <div class="container">
    <?php if ( $title ): ?>
      <div class="row mb-5">
        <div class="col-lg-12 text-center">
          <h2 class="h2-title text-white"><?php echo esc_html($title); ?></h2>
        </div>
        <div class="<?php echo esc_attr($args['theme']); ?>-title-underline"></div>
      </div>
    <?php endif; ?>

    <div class="row pt-3">
      <div class="col-md-12 mx-auto">
        <div class="media-slider-wp">
          <div class="row media-slider">
            <?php foreach ( $items as $item ):
              $logo  = $item['carousel_item_logo'] ?? null;
              $badge = $item['carousel_item_badge'] ?? null;
              $name  = $item['carousel_item_name'] ?? '';
              $tier  = $item['carousel_item_tier'] ?? '';
            ?>
              <div class="<?php echo esc_attr($args['theme']); ?>-slider-item-container">
                <div class="<?php echo esc_attr($args['theme']); ?>-slider-item text-center">
                  <?php if ( $badge ): ?>
                    <div class="partner-badge mb-2">
                      <?php echo som_img($badge, 'thumbnail', ['width'=>80, 'height'=>80]); ?>
                    </div>
                  <?php endif; ?>

                  <?php if ( $logo ): ?>
                    <div class="partner-logo position-relative mb-2">
                      <?php echo som_img($logo, 'medium', ['class'=>'position-absolute']); ?>
                    </div>
                  <?php endif; ?>

                  <?php if ( $name ): ?>
                    <p class="partner-name mb-1"><?php echo esc_html($name); ?></p>
                  <?php endif; ?>

                  <?php if ( $tier ): ?>
                    <p class="partner-tier"><?php echo esc_html($tier); ?></p>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
          <div class="<?php echo esc_attr($args['theme']); ?>-slider-nav"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
jQuery(function($) {
  var $root = $('#<?php echo esc_js($section_id); ?>');
  var $slider = $root.find('.media-slider');

  if ($slider.hasClass('slick-initialized')) return;

  $slider.slick({
    slidesToShow: <?php echo (int)$args['slidesToShow']; ?>,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    prevArrow: '<button class="slide-arrow prev-arrow slick-arrow"><span><img src="/wp-content/uploads/2024/09/prev-arrow.svg" width="14" height="26" alt="Previous arrow icon"></span></button>',
    nextArrow: '<button class="slide-arrow next-arrow slick-arrow"><span><img src="/wp-content/uploads/2024/09/next-arrow.svg" width="14" height="26" alt="Next arrow icon"></span></button>',
    appendArrows: $root.find('.<?php echo esc_js($args['theme']); ?>-slider-nav'),
    responsive: [
      { breakpoint: 980, settings: { slidesToShow: 2 } },
      { breakpoint: 575, settings: { slidesToShow: 1 } }
    ]
  });
});
</script>
