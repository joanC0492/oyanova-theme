<?php
/**
 * Template Part: Partners Page Content
 */

if( have_rows('banner') ): 
  $rows  = get_field('banner');
  $total = is_array($rows) ? count($rows) : 0;
  $i = 0;
  while( have_rows('banner') ): the_row();
  $i++;

    $b = get_sub_field('partner_banners');
    $bg        = $b['background_image'];
    $title     = $b['banner_title'];
    $hl_text   = $b['highlighted_text'];
    $hl_color  = $b['highlight_color'] ?: '#F2A4EF';
    $subtitle  = $b['subtitle'];
    $align     = $b['banner_alignment'];

    switch($align) {
      case 'Left':
        $col_classes = 'col-lg-6 col-md-8 text-left';
        break;
      case 'Right':
        $col_classes = 'col-lg-6 offset-lg-6 col-md-8 offset-md-4';
        break;
      default:
        $col_classes = 'col-lg-6 col-md-8 text-left';
    }
    ?>
    <div class="partners-banner partners-banner-<?php echo $i; ?>"  style=" background-image: url('<?php echo esc_url($bg['url']); ?>');">
      <div class="container">
        <div class="row">
          <div class="<?php echo esc_attr($col_classes); ?>">
            <?php if($subtitle): ?>
              <p class="partnership-banner-subtitle" style="color: <?php echo esc_attr($hl_color); ?>;">
                <?php echo esc_html($subtitle); ?>
              </p>
            <?php endif; ?>

            <?php if($title): 
              $wrapped = str_replace(
                $hl_text,
                '<span style="color:'. esc_attr($hl_color) .'">' 
                  . esc_html($hl_text) .
                '</span>',
                $title
              );

              $allowed = [
                'span' => [
                  'style' => []  
                ]
              ];
            ?>
              <h1 class="partnership-banner-title" style="color: #fff;"><?php echo wp_kses( $wrapped, $allowed ); ?></h1>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

    <?php
    if ( $i < $total ): ?>
      <div style="background-color: black;">
        <div class="banners-divider"></div>
      </div>
    <?php
    endif;
  endwhile;
endif;

$pt_bg_color    = get_field('partnership_tiers_background_color');
$pt_bg_image    = get_field('partnership_tiers_background_image');
$pt_title       = get_field('partnership_tiers_title');
$pt_subtitle    = get_field('partnership_tiers_subtitle');
$pt_content     = get_field('partnership_tiers_content');

if ( $pt_bg_color ): ?>
  <style type="text/css">
    body {
      background-color: <?php echo esc_attr($pt_bg_color); ?>;
    }
  </style>
<?php endif; ?>



<!--  -->
<?php
$pi_title = get_field('partner_impact_title');
$pi_text = get_field('partner_impact_text');
$pi_rows = get_field('partner_impact_card');
$upload_dir = wp_get_upload_dir();
$img_leaf_partenerimpact = $upload_dir['baseurl'] . '/2025/09/partner-impact-leaf.webp';
$img_line_partenerimpact = $upload_dir['baseurl'] . '/2025/09/partner-impact-line.webp';
$img_shape = $upload_dir['baseurl'] . '/2024/09/wave-bg-shape.png';
$img_vendor_border = $upload_dir['baseurl'] . '/2025/09/vendor-border-subtitle.webp';

?>
<!--  -->
<?php if ($pt_title || have_rows('carousel_tiers_third_party')): ?>
  <section class="position-relative partners-tiers-section">
    <?php if ($pt_bg_image): ?>
      <div class="banner-bg back-img" style="background-image: url('<?php echo esc_url($pt_bg_image['url']); ?>');"> </div>
    <?php endif; ?>
    <?php if ($pi_title || $pi_text || !empty($pi_rows)): ?>
      <div class="partners-impact-section position-relative">
        <div class="container">
          <?php if (!empty($pi_title)): ?>
            <h2 class="section-title text-center text-white">
              <?php echo esc_html($pi_title); ?>
            </h2>
          <?php endif; ?>

          <?php if (!empty($pi_text)): ?>
            <div class="partners-impact-intro lead text-center">
              <?php echo wp_kses_post(wpautop($pi_text)); ?>
            </div>
          <?php endif; ?>

          <?php if (!empty($pi_rows) && is_array($pi_rows)): ?>
            <div class="row g-4 justify-content-center">
              <?php foreach ($pi_rows as $row):
                $img = $row['partner_impact_card_image'] ?? null;
                $html = $row['partner_impact_card_text'] ?? '';
                $btn = $row['partner_impact_card_button'] ?? null; ?>
                <div class="col-12">
                  <article class="partner-impact-card gradient-border">
                    <div class="row align-items-center g-3">
                      <?php if (!empty($img['url'])): ?>
                        <div class="col-12 col-lg-5">
                          <figure class="impact-thumb ratio ratio-16x9 m-0 position-relative">
                            <img class="img-fluid rounded-2" src="<?php echo esc_url($img['url']); ?>"
                              alt="<?php echo esc_attr($img['alt'] ?? ''); ?>">
                            <img src="<?= esc_url($img_leaf_partenerimpact) ?>" alt="Leaf Image" width="66" height="80"
                              class="partners-impact-img-leaf" />
                          </figure>
                        </div>
                      <?php endif; ?>

                      <div class="ms-auto col-md col-lg-6">
                        <div class="impact-copy">
                          <?php echo wp_kses_post($html); ?>
                        </div>

                        <?php if (!empty($btn['url'])): ?>
                          <div class="mt-3">
                            <a download="brochure-oyanova.pdf" class="partner-impact-card-btn" href="<?php echo esc_url($btn['url']); ?>"
                              target="<?php echo esc_attr($btn['target'] ?: '_self'); ?>">
                              <?= esc_html($btn['title'] ?: __('Download Sponsorship Deck', 'textdomain')); ?>
                            </a>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </article>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="container text-center partner-impact-line-container">
          <img src="<?= esc_url($img_line_partenerimpact) ?>" alt="Line Image" width="100%" height="auto"
            class="partner-impact-line" />
        </div>
      </div>
    <?php endif; ?>
    <div class="home-banner-inner">
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-12">
            <div class="title-wp text-center">
              <?php if ($pt_title): ?>
                <h1 class="h1-title text-white"><?php echo esc_html($pt_title); ?></h1>
              <?php endif; ?>

              <?php if ($pt_subtitle): ?>
                <p class="partners-tiers-subtitle">
                  <?php echo esc_html($pt_subtitle); ?>
                </p>
              <?php endif; ?>

              <?php if ($pt_content): ?>
                <div class="mb-5 partners-content"><?php echo wp_kses_post(wpautop($pt_content)); ?></div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php
        if (have_rows('partners_tier_third_party')):
          while (have_rows('partners_tier_third_party')):
            the_row();

            if (have_rows('third_party_scripts')):
              while (have_rows('third_party_scripts')):
                the_row();
                echo get_sub_field('third_party_script');
              endwhile;
            endif;

            if (have_rows('stripe_pricing_tables')):
              while (have_rows('stripe_pricing_tables')):
                the_row();
                $tbl = get_sub_field('stripe_pricing_table_id');
                $key = get_sub_field('stripe_publishable_key');
                printf(
                  '<stripe-pricing-table pricing-table-id="%1$s" publishable-key="%2$s"></stripe-pricing-table>',
                  esc_attr($tbl),
                  esc_attr($key)
                );
              endwhile;
            endif;

          endwhile;
        endif;
        ?>
      </div>
    </div>
  </section>
<?php endif; ?>
<?php get_template_part('template-parts/content', 'carousel'); ?>
<?php get_template_part('template-parts/content', 'event-popup'); ?>

<!--  -->
<?php
$vd_title = get_field('vendor_title');
$vd_sub = get_field('vendor_subtitle');
$vd_content = get_field('vendor_content');
$vd_items = get_field('vendor_items');
$vd_cards = get_field('vendor_card');

if ($vd_title || $vd_sub || $vd_content || !empty($vd_items) || !empty($vd_cards)): ?>
  <section class="vendor-section">
    <div class="banner-bg back-img" style="background-image:url('<?= esc_url($img_shape) ?>');"></div>
    <div class="container">
      <header class="text-center">
        <?php if (!empty($vd_title)): ?>
          <h2 class="section-title"><?php echo esc_html($vd_title); ?></h2>
        <?php endif; ?>
        <?php if (!empty($vd_sub)): ?>
          <p class="section-subtitle"><?php echo esc_html($vd_sub); ?></p>
        <?php endif; ?>
      </header> 
      <div class="vendor-section-body">
        <?php if (!empty($vd_content)): ?>
          <div class="vendor-intro mx-auto">
            <?php echo wp_kses_post(wpautop($vd_content)); ?>
          </div>
        <?php endif; ?>

        <?php if (!empty($vd_items) && is_array($vd_items)): ?>
          <div class="row g-4 vendor-two-col">
            <?php foreach ($vd_items as $it):
              $it_title = $it['vendor_items_title'] ?? '';
              $it_html = $it['vendor_items_content'] ?? ''; ?>
              <div class="col-md-6">
                <div class="vendor-box">
                  <?php if (!empty($it_title)): ?>
                    <h3 class="vendor-box-title"><?php echo esc_html($it_title); ?></h3>
                    <img src="<?= esc_url($img_vendor_border) ?>" alt="<?= $it_title ?>" class="vendor-box-line-img" width="414"
                      height="4" />
                  <?php endif; ?>
                  <div class="vendor-box-content">
                    <?php echo wp_kses_post($it_html); ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
      <?php if (!empty($vd_cards) && is_array($vd_cards)): ?>
        <div class="row g-4">
          <?php foreach ($vd_cards as $card):
            $c_title = $card['vendor_card_title'] ?? '';
            $c_html = $card['vendor_card_content'] ?? '';
            $c_btn = $card['vendor_card_button'] ?? null; ?>
            <div class="col-12">
              <div
                class="vendor-cta-card gradient-border d-flex flex-column flex-lg-row align-items-center justify-content-between">
                <div class="vendor-cta-copy">
                  <?php if (!empty($c_title)): ?>
                    <h3 class="vendor-cta-copy-title">
                      <?php
                      $words = preg_split('/\s+/', $c_title);
                      foreach ($words as $word)
                        echo '<span>' . esc_html($word) . '</span> ';
                      ?>
                    </h3>
                  <?php endif; ?>
                  <?php if (!empty($c_html)): ?>
                    <div class="vendor-cta-copy-content small m-0"><?php echo wp_kses_post($c_html); ?></div>
                  <?php endif; ?>
                </div>
                <?php if (!empty($c_btn['url'])): ?>
                  <div class="mt-3">
                    <a class="vendor-cta-copy-btn" href="<?php echo esc_url($c_btn['url']); ?>"
                      target="<?php echo esc_attr($c_btn['target'] ?: '_self'); ?>">
                      <?php echo esc_html($c_btn['title'] ?: __('Apply', 'textdomain')); ?>
                    </a>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

    </div>
  </section>
<?php endif; ?>
