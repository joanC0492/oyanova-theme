<?php
$our_story_title = get_field("our_story_title");
$our_story_images = get_field("our_story_images");
$our_story_content = get_field("our_story_content");
// EVENT INFO
$event_date = get_field('event_date');
$event_location = get_field('event_location');
$event_register = get_field('event_register_url');
$event_price = get_field('event_ticket_price');
$event_banner_sub = get_field('event_banner_subtitle');
$event_banner = get_field('event_img_banner');
// JOIN SECTION
$event_join_title = get_field('event_join_title');
$event_join_desc = get_field('event_join_description');
$event_join_sub1 = get_field('event_join_subtitle_1');
$event_join_desc1 = get_field('event_join_description_1');
$event_join_sub2 = get_field('event_join_subtitle_2');
$event_join_desc2 = get_field('event_join_description_2');
// DETAILS
$event_details_title = get_field('event_details_titles');
$event_details = get_field('event_join_details');
$event_ad_info = get_field('additional_information');
// VIDEO
$event_video = get_field('event_video_url');
$event_video_poster = get_field('event_video_poster');
$event_video_btn = get_field('event_video_button');
// CTA 
$event_cta_title = get_field('event_cta_title');
$event_cta_desc = get_field('event_cta_description');
$event_cta_img = get_field('event_cta_image');
$event_cta_btn = get_field('event_cta_button');
// QUOTE
$quote_text = get_field('event_quote_text');
$quote_author = get_field('event_cta_author');

// EVENT SPEAKERS
$upload_dir = wp_get_upload_dir();
$speaker_bg_url_first = $upload_dir['baseurl'] . '/2025/09/bg-speakers.png';
$speaker_img_separator = $upload_dir['baseurl'] . '/2025/09/line-section-speakers.webp';

// EVENT TRAVEL
$event_bg_02 = $upload_dir['baseurl'] . '/2024/09/futuristic-bg.png';
$logistic_title = get_field('logistic_title');

// LODGING
$event_bg_03 = $upload_dir['baseurl'] . '/2024/09/wave-bg-shape.png';
$img_lodging_leaf = $upload_dir['baseurl'] . '/2025/09/leaf-multicolor.webp';

// Community Hub
$img_community_separator = $upload_dir['baseurl'] . '/2025/09/line-section-community.webp';

// Frequently Asked Questions
$faqs_rows = get_field('event_faq_items');

$SPEAKER_BIO_MAX = 144;
?>

<section class="events-main-info radial-gradient">
  <div class="container events-mains">
    <div class="event-breadcrumb">
      <a class="event-breadcrumb-item" href="https://oyanova-bqha9.projectbeta.co.uk/events/">Events</a>
      <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="https://www.w3.org/2000/svg">
        <path
          d="M4.59688 5.99999L0.696875 2.09999C0.513542 1.91665 0.421875 1.68332 0.421875 1.39999C0.421875 1.11665 0.513542 0.883321 0.696875 0.699988C0.880208 0.516654 1.11354 0.424988 1.39688 0.424988C1.68021 0.424988 1.91354 0.516654 2.09688 0.699988L6.69688 5.29999C6.79688 5.39999 6.86771 5.50832 6.90938 5.62499C6.95104 5.74165 6.97188 5.86665 6.97188 5.99999C6.97188 6.13332 6.95104 6.25832 6.90938 6.37499C6.86771 6.49165 6.79688 6.59999 6.69688 6.69999L2.09688 11.3C1.91354 11.4833 1.68021 11.575 1.39688 11.575C1.11354 11.575 0.880208 11.4833 0.696875 11.3C0.513542 11.1167 0.421875 10.8833 0.421875 10.6C0.421875 10.3167 0.513542 10.0833 0.696875 9.89999L4.59688 5.99999Z"
          fill="#E8EAED" />
      </svg>

      <p class="event-breadcrumb-item"><?php echo the_title(); ?></p>
    </div>
    <div class="event-banner row">
      <div class="event-banner-info col-lg-6 white-text">
        <p class="event-banner-subtitle">OYANOVA PRESENTS</p>
        <h1 class="event-banner-title h1-title"><?php echo the_title(); ?></h1>
        <p class="event-banner-text"><?php echo $event_banner_sub; ?></p>
      </div>
      <img class="col-lg-6" src="<?php echo $event_banner; ?>">
    </div>
  </div>
  <div class="event-details white-text">
    <div class="container">
      <div class="grid">
        <div class="col-lg-4">
          <h4>
            EVENT DETAILS
          </h4>

        </div>
        <div class="col-lg-4">
          <p class="info-text">
            Date:
          </p>
          <p class="">
            October 11-12, 2025
          </p>
        </div>
        <div class="col-lg-4">
          <p class="info-text">
            Location:
          </p>
          <p>
            Center on Halsted in Chicago, IL
          </p>
        </div>
        <div class="col-lg-4">
          <p class="info-text">
            Ticket Price:
          </p>
          <p>
            <?php echo $event_price; ?>
          </p>
        </div>
        <div class="col-lg-4">
          <a href="<?php echo $event_register; ?>" class="sec-btn outline-white-btn" target="_blank">REGISTER NOW</a>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="event-join light-overlay">
  <div class="banner-bg back-img"
    style="background-image: url('https://oyanova-bqha9.projectbeta.co.uk/wp-content/uploads/2024/09/wave-bg-shape.png');">
  </div>
  <div class="container">
    <div class="row">
      <div class="no-m">
        <?php if ($event_join_title): ?>
          <h2><?php echo esc_html($event_join_title); ?></h2>
        <?php endif; ?>

        <?php if ($event_join_desc): ?>
          <div class="event-join-desc">
            <?php echo $event_join_desc; // WYSIWYG content ?>
          </div>
        <?php endif; ?>

        <?php if ($event_join_sub1): ?>
          <h4><?php echo esc_html($event_join_sub1); ?></h4>
          <div class="event-join-divider"></div>
        <?php endif; ?>

        <?php if ($event_join_desc1): ?>
          <div class="event-join-desc-1">
            <?php echo $event_join_desc1; // WYSIWYG content ?>
          </div>
        <?php endif; ?>

        <?php if ($event_join_sub2): ?>
          <h4><?php echo esc_html($event_join_sub2); ?></h4>
          <div class="event-join-divider"></div>
        <?php endif; ?>

        <?php if (have_rows('event_join_description_2')): ?>
          <div class="event-join-desc-2">
            <?php while (have_rows('event_join_description_2')):
              the_row();
              $text = get_sub_field('event_join_text');
              if ($text): ?>
                <div class="event-join-item">
                  <svg width="58" height="64" viewBox="0 0 58 64" fill="none" xmlns="https://www.w3.org/2000/svg">
                    <path
                      d="M54.5969 29.1568C52.398 45.1179 38.7769 46.8408 33.8991 48.0827C29.0214 49.3334 29.2919 46.6922 21.3513 54.9132C20.4962 55.7966 19.5712 57.2921 18.8557 58.1404C17.4159 59.8721 16.011 62.7582 14.9639 63.659C14.0914 64.4112 10.4265 64.0788 11.4387 61.0265C12.0931 59.0587 14.3182 56.0414 15.3304 54.6246C16.6829 52.7355 17.8871 51.3799 18.2187 48.8873C19.2745 40.9112 17.9831 49.2022 11.3427 45.2578C4.70231 41.3047 -0.000947812 23.5682 -0.000947812 23.5682C3.184 28.9644 6.66562 26.6118 16.5171 29.664C26.3687 32.7163 24.2308 44.357 24.2308 44.357C24.2308 44.357 25.086 45.1266 26.0458 45.1704C26.0458 45.1704 26.0633 45.1704 26.0807 45.1704C26.2378 45.1704 26.4036 45.1704 26.5694 45.1179C29.0213 44.838 35.9235 45.6164 40.0945 37.4391C42.337 33.0312 39.2743 27.9323 43.2795 24.504C43.2795 24.504 39.5797 22.851 38.393 31.9205C37.6076 37.9376 34.03 40.0715 28.7683 39.3456C29.0301 36.7656 28.681 34.2731 27.7125 28.0111C24.1959 5.29818 64.2303 -4.82949 56.5602 2.20215C48.8989 9.23379 56.7871 13.1869 54.5882 29.148L54.5969 29.1568Z"
                      fill="url(#paint0_linear_1726_13476)" />
                    <defs>
                      <linearGradient id="paint0_linear_1726_13476" x1="57.5391" y1="32" x2="-0.000947444" y2="32"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#F2A4EF" />
                        <stop offset="0.465" stop-color="#050210" />
                        <stop offset="1" stop-color="#A4DAF2" />
                      </linearGradient>
                    </defs>
                  </svg>
                  <p><?php echo esc_html($text); ?></p>


                </div>
              <?php endif;
            endwhile; ?>
          </div>
        <?php endif; ?>

      </div>
    </div>

  </div>
  <div class="small-leaf-shape mask-img"
    style="-webkit-mask-image: url('https://oyanova-bqha9.projectbeta.co.uk/wp-content/uploads/2024/09/small-leaf-shape.svg');">
  </div>
</section>

<section class="event-speakers">
  <div class="container">
    <div class="row">
      <div class="event-speakers-title">
        <h2><?php echo get_field('speakers_title'); ?></h2>
        <p class="event-speakers-subtitle"><?php echo get_field('speakers_subtitle'); ?></p>
        <p><?php echo get_field('speakers_text'); ?></p>
      </div>
    </div>
  </div>
</section>

<section class="speakers-list" style="background-image:url('<?php echo esc_url($speaker_bg_url_first); ?>');">
  <div class="container-xl">
    <div class="row">
      <div class="event-speakers-list">
        <p class="event-speakers-h2"><?= get_field('speakers_keytext') ?></p>
        <?php if (have_rows('speakers_list')): ?>
          <div class="speakers-grid">
            <?php $_index = 0; ?>
            <?php while (have_rows('speakers_list')):
              $_index++;
              the_row();
              $img = get_sub_field('speaker_image');
              $name = get_sub_field('speaker_name');
              $role = get_sub_field('speaker_title');
              $job = get_sub_field('speaker_job');
              // begin
              $bio = get_sub_field('speaker_bio');
              $w_link = get_sub_field('speaker_website');
              $ig_link = get_sub_field('speaker_instagram_handle');
              $w_url = is_array($w_link) ? ($w_link['url'] ?? '') : $w_link;
              $ig_url = is_array($ig_link) ? ($ig_link['url'] ?? '') : $ig_link;
              $ig_title = is_array($ig_link) ? ($ig_link['title'] ?? '') : '';
              // end
              ?>
              <article class="speaker-card <?= esc_attr($_index % 2 === 0 ? 'is-even' : 'is-odd'); ?>" tabindex="0"
                aria-expanded="false">
                <div class="position-relative w-100">
                  <div class="speaker-media">
                    <span class="badge-keynote d-none" aria-hidden="true">
                      <?php esc_html_e('KEYNOTE', 'textdomain'); ?>
                    </span>
                    <div class="badge-keynote-new">
                      <span>KEYNOTE</span>
                    </div>
                    <div class="speaker-hex">
                      <?php
                      if (is_array($img)) {
                        echo wp_get_attachment_image($img['ID'], 'full', false, [
                          'class' => 'speaker-img',
                          'alt' => esc_attr($name ?: 'Speaker'),
                          'loading' => 'lazy'
                        ]);
                      } elseif (is_string($img) && $img) {
                        echo '<img class="speaker-img" src="' . esc_url($img) . '" alt="' . esc_attr($name ?: 'Speaker') . '" loading="lazy">';
                      }
                      ?>
                      <span class="hex-outline" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="speaker-info">
                    <?php if ($name): ?>
                      <h3 class="speaker-name"><?php echo esc_html($name); ?></h3>
                    <?php endif; ?>
                    <?php if ($role): ?>
                      <p class="speaker-title">
                        <?php
                        // dividir en palabras
                        $words = explode(' ', $role);
                        foreach ($words as $word)
                          echo '<span class="speaker-word">' . esc_html($word) . '</span>';
                        ?>
                      </p>
                    <?php endif; ?>
                    <?php if ($job): ?>
                      <p class="speaker-job"><?php echo esc_html($job); ?></p>
                    <?php endif; ?>
                    <!-- begin -->
                    <div class="speaker-hover" aria-hidden="true">
                      <?php
                      $bio_raw = get_sub_field('speaker_bio');
                      // $bio_out = '';
                      // if ($bio_raw) {
                      //   $bio_out = wp_html_excerpt($bio_raw, $SPEAKER_BIO_MAX, '...');
                      // }
                      ?>
                      <?php if ($bio_raw): ?>
                        <div class="speaker-bio-wrap">
                          <div class="speaker-bio">
                            <?= wp_kses_post($bio_raw); ?>
                          </div>
                          <div class="sb-track" aria-hidden="true"><span class="sb-thumb"></span></div>
                        </div>
                      <?php endif; ?>

                      <div class="speaker-ctas mt-2">
                        <?php if ($w_url): ?>
                          <a class="icon-btn-world d-flex align-items-center" href="<?= esc_url($w_url); ?>" target="_blank"
                            rel="noopener">
                            <svg style="width: 20px;    margin-right: 2px;
" fill="#A4DAF2" xmlns="https://www.w3.org/2000/svg"
                              viewBox="0 0 640 640"><!--!Font Awesome Free 7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                              <path
                                d="M415.9 344L225 344C227.9 408.5 242.2 467.9 262.5 511.4C273.9 535.9 286.2 553.2 297.6 563.8C308.8 574.3 316.5 576 320.5 576C324.5 576 332.2 574.3 343.4 563.8C354.8 553.2 367.1 535.8 378.5 511.4C398.8 467.9 413.1 408.5 416 344zM224.9 296L415.8 296C413 231.5 398.7 172.1 378.4 128.6C367 104.2 354.7 86.8 343.3 76.2C332.1 65.7 324.4 64 320.4 64C316.4 64 308.7 65.7 297.5 76.2C286.1 86.8 273.8 104.2 262.4 128.6C242.1 172.1 227.8 231.5 224.9 296zM176.9 296C180.4 210.4 202.5 130.9 234.8 78.7C142.7 111.3 74.9 195.2 65.5 296L176.9 296zM65.5 344C74.9 444.8 142.7 528.7 234.8 561.3C202.5 509.1 180.4 429.6 176.9 344L65.5 344zM463.9 344C460.4 429.6 438.3 509.1 406 561.3C498.1 528.6 565.9 444.8 575.3 344L463.9 344zM575.3 296C565.9 195.2 498.1 111.3 406 78.7C438.3 130.9 460.4 210.4 463.9 296L575.3 296z" />
                            </svg>
                            <span>Website</span>
                          </a>
                        <?php endif; ?>
                        <?php if ($ig_url): ?>
                          <a class="icon-btn-instagram d-flex align-items-center" href="<?= esc_url($ig_url); ?>"
                            target="_blank" rel="noopener">
                            <svg style="width: 20px;    margin-right: 2px;
" fill="#F2A4EF" xmlns="https://www.w3.org/2000/svg"
                              viewBox="0 0 640 640"><!--!Font Awesome Free 7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                              <path
                                d="M320.3 205C256.8 204.8 205.2 256.2 205 319.7C204.8 383.2 256.2 434.8 319.7 435C383.2 435.2 434.8 383.8 435 320.3C435.2 256.8 383.8 205.2 320.3 205zM319.7 245.4C360.9 245.2 394.4 278.5 394.6 319.7C394.8 360.9 361.5 394.4 320.3 394.6C279.1 394.8 245.6 361.5 245.4 320.3C245.2 279.1 278.5 245.6 319.7 245.4zM413.1 200.3C413.1 185.5 425.1 173.5 439.9 173.5C454.7 173.5 466.7 185.5 466.7 200.3C466.7 215.1 454.7 227.1 439.9 227.1C425.1 227.1 413.1 215.1 413.1 200.3zM542.8 227.5C541.1 191.6 532.9 159.8 506.6 133.6C480.4 107.4 448.6 99.2 412.7 97.4C375.7 95.3 264.8 95.3 227.8 97.4C192 99.1 160.2 107.3 133.9 133.5C107.6 159.7 99.5 191.5 97.7 227.4C95.6 264.4 95.6 375.3 97.7 412.3C99.4 448.2 107.6 480 133.9 506.2C160.2 532.4 191.9 540.6 227.8 542.4C264.8 544.5 375.7 544.5 412.7 542.4C448.6 540.7 480.4 532.5 506.6 506.2C532.8 480 541 448.2 542.8 412.3C544.9 375.3 544.9 264.5 542.8 227.5zM495 452C487.2 471.6 472.1 486.7 452.4 494.6C422.9 506.3 352.9 503.6 320.3 503.6C287.7 503.6 217.6 506.2 188.2 494.6C168.6 486.8 153.5 471.7 145.6 452C133.9 422.5 136.6 352.5 136.6 319.9C136.6 287.3 134 217.2 145.6 187.8C153.4 168.2 168.5 153.1 188.2 145.2C217.7 133.5 287.7 136.2 320.3 136.2C352.9 136.2 423 133.6 452.4 145.2C472 153 487.1 168.1 495 187.8C506.7 217.3 504 287.3 504 319.9C504 352.5 506.7 422.6 495 452z" />
                            </svg>
                            <span><?= esc_html($ig_title ?: 'Instagram'); ?></span>
                          </a>
                        <?php endif; ?>
                      </div>
                    </div>
                    <!-- end -->
                  </div>
                </div>
              </article>
            <?php endwhile; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<section class="panel-speakers">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 text-center line-separator">
        <img src="<?= esc_url($speaker_img_separator); ?>" alt="Line separator"
          class="img-fluid speakers-line-separator">
      </div>
    </div>
  </div>
  <div class="container-xl">
    <div class="row">
      <div class="panel-speakers-title">
        <h2 class="text-center event-speakers-h2 text-white"><?= esc_html(get_field('speakers_paneltext')); ?></h2>
      </div>
      <div class="panel-content">
        <?php $rows = get_field('speakers_panel'); ?>
        <?php if ($rows && is_array($rows)): ?>
          <?php $groups = array_chunk($rows, 4); ?>
          <?php foreach ($groups as $gIndex => $group): ?>
            <?php $is_full = count($group) === 4; ?>
            <?php $row_class = $is_full ? 'is-full' : 'is-partial'; ?>
            <div class="panel-row bg-speaker-last <?php echo esc_attr($row_class); ?>">
              <?php foreach ($group as $item): ?>
                <!-- begin -->
                <?php
                $p_bio = $item['panel_bio'] ?? '';
                $p_w = $item['panel_website'] ?? '';
                $p_ig = $item['panel_instagram_handle'] ?? '';
                $p_w_url = is_array($p_w) ? ($p_w['url'] ?? '') : $p_w;

                $p_ig_url = is_array($p_ig) ? ($p_ig['url'] ?? '') : $p_ig;
                $p_ig_title = is_array($p_ig) ? ($p_ig['title'] ?? '') : '';
                ?>
                <!-- end -->
                <?php $img = $item['panel_image'] ?? null; ?>
                <?php $name = $item['panel_name'] ?? ''; ?>
                <?php $job = $item['panel_job'] ?? ''; ?>
                <article class="panel-card text-center" tabindex="0" aria-expanded="false">
                  <div class="position-relative">
                    <div class="panel-media">
                      <div class="panel-avatar">
                        <?php
                        if (is_array($img) && isset($img['ID'])) {
                          echo wp_get_attachment_image($img['ID'], 'medium', false, [
                            'class' => 'panel-img',
                            'alt' => esc_attr($name ?: 'Panel speaker'),
                            'loading' => 'lazy',
                          ]);
                        } elseif (is_int($img)) {
                          echo wp_get_attachment_image($img, 'medium', false, [
                            'class' => 'panel-img',
                            'alt' => esc_attr($name ?: 'Panel speaker'),
                            'loading' => 'lazy',
                          ]);
                        } elseif (is_array($img) && isset($img['url'])) {
                          echo '<img class="panel-img" src="' . esc_url($img['url']) . '" alt="' . esc_attr($name ?: 'Panel speaker') . '" loading="lazy">';
                        } elseif (is_string($img) && $img) {
                          echo '<img class="panel-img" src="' . esc_url($img) . '" alt="' . esc_attr($name ?: 'Panel speaker') . '" loading="lazy">';
                        }
                        ?>
                        <span class="panel-halo" aria-hidden="true"></span>
                      </div>
                    </div>
                    <div class="panel-info">
                      <?php if ($name): ?>
                        <h3 class="panel-name"><?php echo esc_html($name); ?></h3>
                      <?php endif; ?>
                      <?php if ($job): ?>
                        <p class="panel-job"><?php echo esc_html($job); ?></p>
                      <?php endif; ?>
                      <!-- begin -->
                      <div class="panel-hover" aria-hidden="true">
                        <?php
                        $p_bio_raw = $item['panel_bio'] ?? '';
                        // $p_bio_out = '';
                        // if ($p_bio_raw) {
                        //   $p_bio_out = wp_html_excerpt($p_bio_raw, $SPEAKER_BIO_MAX, '...');
                        // }
                        ?>
                        <!-- <?php /*if ($p_bio_out):*/ ?> -->
                        <?php if ($p_bio_raw): ?>
                          <div class="panel-bio-wrap">
                            <div class="panel-bio">
                              <?= wp_kses_post($p_bio_raw); ?>
                              <div class="sb-track" aria-hidden="true"><span class="sb-thumb"></span></div>
                            </div>
                          </div>
                        <?php endif; ?>
                        <div class="panel-ctas mt-2">
                          <?php if ($p_w_url): ?>
                            <a class="icon-btn-world d-flex align-items-center" href="<?= esc_url($p_w_url); ?>" target="_blank"
                              rel="noopener">
                              <svg style="width: 20px;    margin-right: 2px;
" fill="#A4DAF2" xmlns="https://www.w3.org/2000/svg"
                                viewBox="0 0 640 640"><!--!Font Awesome Free 7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path
                                  d="M415.9 344L225 344C227.9 408.5 242.2 467.9 262.5 511.4C273.9 535.9 286.2 553.2 297.6 563.8C308.8 574.3 316.5 576 320.5 576C324.5 576 332.2 574.3 343.4 563.8C354.8 553.2 367.1 535.8 378.5 511.4C398.8 467.9 413.1 408.5 416 344zM224.9 296L415.8 296C413 231.5 398.7 172.1 378.4 128.6C367 104.2 354.7 86.8 343.3 76.2C332.1 65.7 324.4 64 320.4 64C316.4 64 308.7 65.7 297.5 76.2C286.1 86.8 273.8 104.2 262.4 128.6C242.1 172.1 227.8 231.5 224.9 296zM176.9 296C180.4 210.4 202.5 130.9 234.8 78.7C142.7 111.3 74.9 195.2 65.5 296L176.9 296zM65.5 344C74.9 444.8 142.7 528.7 234.8 561.3C202.5 509.1 180.4 429.6 176.9 344L65.5 344zM463.9 344C460.4 429.6 438.3 509.1 406 561.3C498.1 528.6 565.9 444.8 575.3 344L463.9 344zM575.3 296C565.9 195.2 498.1 111.3 406 78.7C438.3 130.9 460.4 210.4 463.9 296L575.3 296z" />
                              </svg>
                              <span>Website</span>
                            </a>
                          <?php endif; ?>
                          <?php if ($p_ig_url): ?>
                            <a class="icon-btn-instagram d-flex align-items-center" href="<?= esc_url($p_ig_url); ?>"
                              target="_blank" rel="noopener">
                              <svg style="width: 20px;    margin-right: 2px;
" fill="#F2A4EF" xmlns="https://www.w3.org/2000/svg"
                                viewBox="0 0 640 640"><!--!Font Awesome Free 7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path
                                  d="M320.3 205C256.8 204.8 205.2 256.2 205 319.7C204.8 383.2 256.2 434.8 319.7 435C383.2 435.2 434.8 383.8 435 320.3C435.2 256.8 383.8 205.2 320.3 205zM319.7 245.4C360.9 245.2 394.4 278.5 394.6 319.7C394.8 360.9 361.5 394.4 320.3 394.6C279.1 394.8 245.6 361.5 245.4 320.3C245.2 279.1 278.5 245.6 319.7 245.4zM413.1 200.3C413.1 185.5 425.1 173.5 439.9 173.5C454.7 173.5 466.7 185.5 466.7 200.3C466.7 215.1 454.7 227.1 439.9 227.1C425.1 227.1 413.1 215.1 413.1 200.3zM542.8 227.5C541.1 191.6 532.9 159.8 506.6 133.6C480.4 107.4 448.6 99.2 412.7 97.4C375.7 95.3 264.8 95.3 227.8 97.4C192 99.1 160.2 107.3 133.9 133.5C107.6 159.7 99.5 191.5 97.7 227.4C95.6 264.4 95.6 375.3 97.7 412.3C99.4 448.2 107.6 480 133.9 506.2C160.2 532.4 191.9 540.6 227.8 542.4C264.8 544.5 375.7 544.5 412.7 542.4C448.6 540.7 480.4 532.5 506.6 506.2C532.8 480 541 448.2 542.8 412.3C544.9 375.3 544.9 264.5 542.8 227.5zM495 452C487.2 471.6 472.1 486.7 452.4 494.6C422.9 506.3 352.9 503.6 320.3 503.6C287.7 503.6 217.6 506.2 188.2 494.6C168.6 486.8 153.5 471.7 145.6 452C133.9 422.5 136.6 352.5 136.6 319.9C136.6 287.3 134 217.2 145.6 187.8C153.4 168.2 168.5 153.1 188.2 145.2C217.7 133.5 287.7 136.2 320.3 136.2C352.9 136.2 423 133.6 452.4 145.2C472 153 487.1 168.1 495 187.8C506.7 217.3 504 287.3 504 319.9C504 352.5 506.7 422.6 495 452z" />
                              </svg>
                              <span><?= esc_html($p_ig_title ?: 'Instagram'); ?></span>
                            </a>
                          <?php endif; ?>
                        </div>
                      </div>
                      <!-- end -->
                    </div>
                  </div>
                </article>
              <?php endforeach; ?>
            </div>
          <?php endforeach;
        endif; ?>
      </div>
    </div>
  </div>
</section>

<section class="event-travel-venue-logistics">
  <div class="banner-bg back-img" style="background-image:url('<?= esc_url($event_bg_02); ?>');"></div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php if ($logistic_title): ?>
          <h2 class="section-title text-center text-white"><?= esc_html($logistic_title); ?></h2>
          <?php if (!empty($speaker_img_separator)): ?>
            <div class="text-center">
              <img src="<?= esc_url($speaker_img_separator); ?>" alt="Line separator" class="img-fluid">
            </div>
          <?php endif; ?>
        <?php endif; ?>

        <?php if (have_rows('logistic_items')): ?>
          <div class="row">
            <div class="col-12 col-lg-11 col-xl-10 mx-auto">
              <div class="accordion" id="logisticsAccordion">
                <?php $i = 0;
                while (have_rows('logistic_items')):
                  the_row();
                  $item_title = get_sub_field('logistic_title');
                  $item_img = get_sub_field('logistic_image');
                  $item_text = get_sub_field('logistic_text');
                  $is_first = ($i === 0);
                  $heading_id = 'logistics-heading-' . $i;
                  $collapse_id = 'logistics-collapse-' . $i;
                  ?>
                  <div class="accordion-item">
                    <h3 class="accordion-header" id="<?= esc_attr($heading_id); ?>">
                      <button class="accordion-button <?= $is_first ? '' : 'collapsed'; ?>" type="button"
                        data-bs-toggle="collapse" data-bs-target="#<?= esc_attr($collapse_id); ?>"
                        aria-expanded="<?= $is_first ? 'true' : 'false'; ?>" aria-controls="<?= esc_attr($collapse_id); ?>">
                        <!-- <?php /* echo esc_html($item_title); */ ?> -->
                        <span class="acc_title"><?= esc_html($item_title); ?></span>
                        <span class="acc_icon" aria-hidden="true"></span>
                      </button>
                    </h3>

                    <div id="<?= esc_attr($collapse_id); ?>"
                      class="accordion-collapse collapse <?= $is_first ? 'show' : ''; ?>"
                      aria-labelledby="<?= esc_attr($heading_id); ?>" data-bs-parent="#logisticsAccordion">
                      <div class="accordion-body">
                        <div class="logistic-item d-md-flex gap-4">
                          <?php if ($item_img): ?>
                            <figure class="acc_media mb-3 mb-md-0">
                              <?php
                              $img_alt = esc_attr(wp_strip_all_tags($item_title));
                              if (is_array($item_img) && isset($item_img['ID'])) {
                                // Importante: incluir width/height para evitar “saltos” durante la transición
                                echo wp_get_attachment_image($item_img['ID'], 'medium', false, [
                                  'class' => 'acc_img',
                                  'alt' => $img_alt,
                                  'decoding' => 'async',
                                  // 'loading' => 'lazy', // opcional: quitar lazy dentro de acordeones para evitar cálculos de altura tardíos
                                ]);
                              } elseif (is_int($item_img)) {
                                echo wp_get_attachment_image($item_img, 'medium', false, [
                                  'class' => 'acc_img',
                                  'alt' => $img_alt,
                                  'decoding' => 'async',
                                ]);
                              } elseif (is_string($item_img)) {
                                echo '<img class="acc_img" src="' . esc_url($item_img) . '" alt="' . $img_alt . '" width="400" height="300" decoding="async">';
                              }
                              ?>
                            </figure>
                          <?php endif; ?>

                          <div class="acc_body">
                            <?= wp_kses_post($item_text); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php $i++; endwhile; ?>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<section class="event-lodging">
  <div class="banner-bg back-img" style="background-image:url('<?= esc_url($event_bg_03); ?>');"></div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="section-title text-center">
          <?php echo esc_html__('Lodging & Accommodations', 'textdomain'); ?>
        </h2>
        <?php if ($sub = get_field('lodging_subtitle')): ?>
          <p class="lodging-subtitle"><?php echo esc_html($sub); ?></p>
        <?php endif; ?>

        <?php if ($map = get_field('lodging_image')): ?>
          <div class="lodging-map text-center mt-4">
            <?php
            if (is_array($map) && isset($map['ID'])) {
              echo wp_get_attachment_image($map['ID'], 'large', false, [
                'class' => 'lodging-map-img',
                'loading' => 'lazy',
                'alt' => esc_attr__('Lodging map', 'textdomain'),
              ]);
            } elseif (is_string($map)) {
              echo '<img class="lodging-map-img" src="' . esc_url($map) . '" alt="' . esc_attr__('Lodging map', 'textdomain') . '" loading="lazy">';
            }
            ?>
            <span class="map-frame" aria-hidden="true"></span>
          </div>
        <?php endif; ?>

        <?php if (have_rows('lodging_items')): ?>
          <div class="lodging-grid">
            <?php while (have_rows('lodging_items')):
              the_row();
              $img = get_sub_field('lodging_item_image');
              $btn = get_sub_field('lodging_item_button'); // ['url','title','target']
              $title = get_sub_field('lodging_item_title');
              $subt = get_sub_field('lodging_item_subtitle');
              $text = get_sub_field('lodging_item_text');
              ?>
              <article class="lodging-card">
                <div class="lodging-media">
                  <div class="position-relative">
                    <?php
                    if (is_array($img) && isset($img['ID'])) {
                      echo wp_get_attachment_image($img['ID'], 'large', false, [
                        'class' => 'lodging-img',
                        'loading' => 'lazy',
                        'alt' => esc_attr($title ?: __('Hotel image', 'textdomain')),
                      ]);
                    } elseif (is_string($img)) {
                      echo '<img class="lodging-img" src="' . esc_url($img) . '" alt="' . esc_attr($title ?: __('Hotel image', 'textdomain')) . '" loading="lazy">';
                    }
                    ?>
                    <img src="<?= esc_url($img_lodging_leaf) ?>" alt="Lodging Leaf" class="lodging-leaf" />
                  </div>
                  <span class=" card-frame" aria-hidden="true"></span>
                </div>

                <div class="lodging-body">
                  <?php if ($title): ?>
                    <h3 class="lodging-title"><?php echo esc_html($title); ?></h3>
                  <?php endif; ?>

                  <?php if ($subt): ?>
                    <p class="lodging-sub"><?php echo esc_html($subt); ?></p>
                  <?php endif; ?>

                  <?php if ($text): ?>
                    <p class="lodging-text"><?php echo esc_html($text); ?></p>
                  <?php endif; ?>
                </div>

                <?php if ($btn && !empty($btn['url']) && !empty($btn['title'])): ?>
                  <div class="lodging-cta">
                    <a class="sec-btn outline-white-btn lodging-btn" href="<?php echo esc_url($btn['url']); ?>"
                      target="<?php echo esc_attr($btn['target'] ?: '_self'); ?>"
                      rel="<?php echo $btn['target'] === '_blank' ? 'noopener' : ''; ?>">
                      <?php echo esc_html($btn['title']); ?>
                    </a>
                  </div>
                <?php endif; ?>
              </article>
            <?php endwhile; ?>
          </div>
        <?php endif; ?>

        <?php if ($note = get_field('lodging_note')): ?>
          <div class="lodging-note">
            <?php echo wp_kses_post($note); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="small-leaf-shape mask-img"
    style="-webkit-mask-image: url('https://oyanova-bqha9.projectbeta.co.uk/wp-content/uploads/2024/09/small-leaf-shape.svg');">
  </div>
</section>

<section class="event-details-main">
  <div class="banner-bg back-img"
    style="background-image: url('https://oyanova-bqha9.projectbeta.co.uk/wp-content/uploads/2024/09/futuristic-bg.png');">
  </div>
  <div class="container">
    <div class="row">
      <div class="white-text">
        <?php echo $event_details_title; ?>
      </div>
      <?php if (have_rows('event_join_details')): ?>
        <?php $index = 0; ?>
        <?php while (have_rows('event_join_details')):
          the_row(); ?>
          <div class="details-list row align-items-center mb-5 white-text">
            <?php
            $image = get_sub_field('event_details_image');
            $title = get_sub_field('event_details_title');
            $description = get_sub_field('event_details_description');

            if ($index % 2 == 0): ?>
              <div class="col-lg-6">
                <?php if ($image):
                  $img_url = is_array($image) ? $image['url'] : $image;
                  ?>
                  <img src="<?php echo esc_url($img_url); ?>" alt="" class="img-fluid">
                <?php endif; ?>
              </div>
              <div class="col-lg-6">
                <?php if ($title): ?>
                  <h3><?php echo esc_html($title); ?></h3>
                  <div class="event-join-divider"></div>
                <?php endif; ?>
                <?php if ($description): ?>
                  <div><?php echo $description; ?></div>
                <?php endif; ?>
              </div>
            <?php else: ?>

              <div class="col-lg-6 order-lg-2">
                <?php if ($image):
                  $img_url = is_array($image) ? $image['url'] : $image;
                  ?>
                  <img src="<?php echo esc_url($img_url); ?>" alt="" class="img-fluid">
                <?php endif; ?>
              </div>
              <div class="col-lg-6 order-lg-1">
                <?php if ($title): ?>
                  <h3><?php echo esc_html($title); ?></h3>
                  <div class="event-join-divider"></div>
                <?php endif; ?>
                <?php if ($description): ?>
                  <div><?php echo $description; ?></div>
                <?php endif; ?>
              </div>
            <?php endif; ?>

          </div>
          <?php $index++; ?>
        <?php endwhile; ?>
      <?php endif; ?>

      <div class="additional-info col-lg-7 white-text">
        <p><?php echo $event_ad_info; ?></p>
      </div>
    </div>
  </div>
  <div class="small-leaf-shape mask-img"
    style="-webkit-mask-image: url('https://oyanova-bqha9.projectbeta.co.uk/wp-content/uploads/2024/09/small-leaf-shape.svg');">
  </div>
</section>

<section class="event-community-hub radial-gradient">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <?php if ($t = get_field('event_video_title')): ?>
          <h2 class="section-title"><?= esc_html($t); ?></h2>
        <?php endif; ?>

        <?php if ($sub = get_field('event_video_subtitle')): ?>
          <p class="hub-subtitle"><?php echo esc_html($sub); ?></p>
        <?php endif; ?>

        <?php if ($desc = get_field('event_video_text')): ?>
          <p class="hub-text"><?php echo esc_html($desc); ?></p>
        <?php endif; ?>
      </div>
    </div>
    <div class="row hub-columns">
      <div class="col-lg-6">
        <div class="hub-box">
          <div class="hub-box-head">
            <h3 class="hub-box-title">
              <?php esc_html_e('Ways to stay connected', 'textdomain'); ?>
            </h3>
          </div>

          <?php if (have_rows('event_video_ways')): ?>
            <div class="hub-list">
              <?php while (have_rows('event_video_ways')):
                the_row();
                $wtitle = get_sub_field('video_ways_title');
                $wtext = get_sub_field('video_ways_text');
                ?>
                <article class="hub-item">
                  <?php if ($wtitle): ?>
                    <h4 class="hub-item-title"><?php echo esc_html($wtitle); ?></h4>
                  <?php endif; ?>
                  <?php if ($wtext): ?>
                    <div class="hub-item-text"><?php echo wp_kses_post($wtext); ?></div>
                  <?php endif; ?>
                </article>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="hub-box">
          <div class="hub-box-head">
            <span class="hub-head-accent" aria-hidden="true"></span>
            <h3 class="hub-box-title"><?php esc_html_e('Want to get involved?', 'textdomain'); ?></h3>
          </div>

          <?php if ($want = get_field('event_video_want')): ?>
            <div class="hub-want"><?php echo wp_kses_post($want); ?></div>
          <?php endif; ?>

          <?php if ($cta = get_field('event_video_want_link')):
            $url = $cta['url'] ?? '';
            $title = $cta['title'] ?? '';
            $target = $cta['target'] ?? '_self';
            if ($url && $title): ?>
              <a class="sec-btn outline-white-btn hub-btn" href="<?php echo esc_url($url); ?>"
                target="<?php echo esc_attr($target); ?>" rel="<?php echo $target === '_blank' ? 'noopener' : ''; ?>">
                <?php echo esc_html($title); ?>
              </a>
            <?php endif; endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 text-center line-separator-parent">
        <img src="<?= esc_url($speaker_img_separator); ?>" alt="Line separator"
          class="img-fluid speakers-line-separator">
      </div>
    </div>
  </div>
</section>

<?php if ($event_video): ?>
  <section class="event-video radial-gradient">
    <div class="container">
      <div class="row align-items-center">
        <video src="<?php echo esc_url($event_video); ?>" controls playsinline preload="metadata" <?php if ($event_video_poster): ?> poster="<?php echo $event_video_poster; ?>" <?php endif; ?> class="w-100"></video>
        <div class="col-lg-4">
          <?php if ($event_video_btn): ?>
            <a class="sec-btn outline-white-btn" href="<?php echo esc_url($event_video_btn['url']); ?>" <?php if (!empty($event_video_btn['target'])): ?> target="<?php echo esc_attr($event_video_btn['target']); ?>" <?php endif; ?>>
              <?php echo esc_html($event_video_btn['title']); ?>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="small-leaf-shape mask-img"
      style="-webkit-mask-image: url('https://oyanova-bqha9.projectbeta.co.uk/wp-content/uploads/2024/09/small-leaf-shape.svg');">
    </div>
  </section>
<?php endif; ?>

<?php if ($event_cta_title || $event_cta_desc || $event_cta_img || $event_cta_btn): ?>
  <section class="event-sponsor">
    <div class="container">
      <div class="row">
        <div class="gradient-border">
          <div class="col-lg-11">
            <?php if ($event_cta_img): ?>
              <img src="<?php echo $event_cta_img; ?>">
            <?php endif; ?>
            <div>
              <?php if ($event_cta_title): ?>
                <div class="event-sponsor-title">
                  <?php echo wp_kses_post($event_cta_title); ?>
                </div>
              <?php endif; ?>

              <?php if ($event_cta_desc): ?>
                <div class="event-sponsor-text">
                  <?php echo wp_kses_post($event_cta_desc); ?>
                </div>
              <?php endif; ?>

              <?php if ($event_cta_btn): ?>
                <a href="<?php echo esc_url($event_cta_btn['url']); ?>" class="sec-btn outline-white-btn"
                  target="<?php echo esc_attr($event_cta_btn['target'] ?? '_self'); ?>">
                  <?php echo esc_html($event_cta_btn['title']); ?>
                </a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<section class="event-cta light-overlay">
  <div class="banner-bg back-img"
    style="background-image: url('https://oyanova-bqha9.projectbeta.co.uk/wp-content/uploads/2024/09/wave-bg-shape.png');">
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h1>
          Ready to Register?
        </h1>
        <h4>
          This is your invitation to step into a space built for transformation, truth, and collective care.
        </h4>
        <a class="sec-btn outline-btn" target="_blank" href="https://buy.stripe.com/9AQ9CvbPH9Br9ywcMM">REGISTER
          NOW!</a>
      </div>
    </div>
  </div>
  <div class="small-leaf-shape mask-img"
    style="-webkit-mask-image: url('https://oyanova-bqha9.projectbeta.co.uk/wp-content/uploads/2024/09/small-leaf-shape.svg');">
  </div>
</section>

<?php get_template_part('template-parts/content', 'carousel'); ?>

<section class="event-quote radial-gradient">
  <div class="container">
    <div class="row">
      <div class="col-lg-11">
        <div>
          <?php echo $quote_text; ?>
        </div>
        <p style="color:#B8D8EB;letter-spacing: 1px;">
          <?php echo $quote_author; ?>
        </p>
      </div>
    </div>
  </div>
</section>



<section class="event-faqs d-none">
  <div class="banner-bg back-img" style="background-image:url('<?= esc_url($event_bg_02); ?>');"></div>
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="section-title text-white">
          <?= esc_html__('Frequently Asked Questions', 'textdomain'); ?>
        </h2>
        <div class="event-faqs-title-underline"></div>
      </div>
    </div>

    <?php if ($faqs_rows && is_array($faqs_rows) && count($faqs_rows)): ?>
      <?php
      // 2 columnas
      $half = (int) ceil(count($faqs_rows) / 2);
      // mitad izquierda
      $left = array_slice($faqs_rows, 0, $half);
      // mitad derecha
      $right = array_slice($faqs_rows, $half); ?>
      <div class="row faq-columns">
        <div class="col-lg-6">
          <div class="accordionjs faq-accordion">
            <?php foreach ($left as $i => $row): ?>
              <?php
              $q = isset($row['faq_title']) ? $row['faq_title'] : '';
              $a = isset($row['faq_text']) ? $row['faq_text'] : '';
              ?>
              <div class="acc_section<?php echo $i === 0 ? ' acc_active' : ''; ?>">
                <div class="acc_head">
                  <h3><?php echo esc_html($q); ?></h3>
                  <span class="acc_icon" aria-hidden="true"></span>
                </div>
                <div class="acc_content">
                  <div class="faq-answer">
                    <?php echo wp_kses_post($a); ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="accordionjs faq-accordion">
            <?php foreach ($right as $row): ?>
              <?php
              $q = isset($row['faq_title']) ? $row['faq_title'] : '';
              $a = isset($row['faq_text']) ? $row['faq_text'] : ''; ?>
              <div class="acc_section">
                <div class="acc_head">
                  <h3><?php echo esc_html($q); ?></h3>
                  <span class="acc_icon" aria-hidden="true"></span>
                </div>
                <div class="acc_content">
                  <div class="faq-answer">
                    <?php echo wp_kses_post($a); ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    jQuery('.faq-accordion').accordionjs({
      closeAble: true,
      closeOther: false,
      slideSpeed: 250,
      activeIndex: 0
    });
  });
</script>

<section class="event-faqs">
  <div class="banner-bg back-img" style="background-image:url('<?= esc_url($event_bg_02); ?>');"></div>
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="section-title text-white">
          <?= esc_html__('Frequently Asked Questions', 'textdomain'); ?>
        </h2>
        <div class="event-faqs-title-underline"></div>
      </div>
    </div>

    <?php if ($faqs_rows && is_array($faqs_rows) && count($faqs_rows)): ?>
      <?php
      // Dividir FAQs en 2 columnas
      $half = (int) ceil(count($faqs_rows) / 2);
      $left = array_slice($faqs_rows, 0, $half);
      $right = array_slice($faqs_rows, $half);

      // IDs únicos por columna para data-bs-parent
      $acc_left_id = 'faqsAccordionLeft';
      $acc_right_id = 'faqsAccordionRight';
      ?>
      <div class="row faq-columns">
        <!-- Columna izquierda -->
        <div class="col-lg-6">
          <div class="accordion" id="<?= esc_attr($acc_left_id); ?>">
            <?php foreach ($left as $i => $row): ?>
              <?php
              $q = isset($row['faq_title']) ? $row['faq_title'] : '';
              $a = isset($row['faq_text']) ? $row['faq_text'] : '';

              // IDs únicos por ítem
              $heading_id = 'faq-left-heading-' . $i;
              $collapse_id = 'faq-left-collapse-' . $i;

              // Solo el primer elemento de la izquierda inicia abierto
              $is_first = ($i === 0);
              ?>
              <div class="accordion-item">
                <h3 class="accordion-header" id="<?= esc_attr($heading_id); ?>">
                  <button class="accordion-button <?= $is_first ? '' : 'collapsed'; ?>" type="button"
                    data-bs-toggle="collapse" data-bs-target="#<?= esc_attr($collapse_id); ?>"
                    aria-expanded="<?= $is_first ? 'true' : 'false'; ?>" aria-controls="<?= esc_attr($collapse_id); ?>">
                    <span class="acc_title"><?php echo esc_html($q); ?></span>
                    <span class="acc_icon" aria-hidden="true"></span>
                  </button>
                </h3>
                <div id="<?= esc_attr($collapse_id); ?>" class="accordion-collapse collapse <?= $is_first ? 'show' : ''; ?>"
                  aria-labelledby="<?= esc_attr($heading_id); ?>" data-bs-parent="#<?= esc_attr($acc_left_id); ?>">
                  <div class="accordion-body">
                    <div class="faq-answer">
                      <?php echo wp_kses_post($a); ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Columna derecha -->
        <div class="col-lg-6">
          <div class="accordion" id="<?= esc_attr($acc_right_id); ?>">
            <?php foreach ($right as $j => $row): ?>
              <?php
              $q = isset($row['faq_title']) ? $row['faq_title'] : '';
              $a = isset($row['faq_text']) ? $row['faq_text'] : '';

              $heading_id = 'faq-right-heading-' . $j;
              $collapse_id = 'faq-right-collapse-' . $j;
              ?>
              <div class="accordion-item">
                <h3 class="accordion-header" id="<?= esc_attr($heading_id); ?>">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#<?= esc_attr($collapse_id); ?>" aria-expanded="false"
                    aria-controls="<?= esc_attr($collapse_id); ?>">
                    <span class="acc_title"><?php echo esc_html($q); ?></span>
                    <span class="acc_icon" aria-hidden="true"></span>
                  </button>
                </h3>
                <div id="<?= esc_attr($collapse_id); ?>" class="accordion-collapse collapse"
                  aria-labelledby="<?= esc_attr($heading_id); ?>" data-bs-parent="#<?= esc_attr($acc_right_id); ?>">
                  <div class="accordion-body">
                    <div class="faq-answer">
                      <?php echo wp_kses_post($a); ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>




<section class="events-footer white-text">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div>
          <h1>
            QUESTIONS?
          </h1>
          <h4>
            Email any questions to <a href="mailto:contact@oyanova.com" style="color:#F2A4EF">contact@oyanova.com</a>
          </h4>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_template_part('template-parts/content', 'event-popup'); ?>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const eventDetails = document.querySelector('.event-details');
    const siteHeader = document.querySelector('.site-header');
    const originalOffsetTop = eventDetails.offsetTop;
    let lastScrollY = window.scrollY;
    let isFixed = false;

    function handleScroll() {
      if (window.innerWidth <= 942) {

        if (isFixed) {
          eventDetails.classList.remove('fixed-on-top');
          siteHeader.classList.remove('disabled');
          isFixed = false;
        }
        return;
      }

      const currentScrollY = window.scrollY;
      const direction = currentScrollY > lastScrollY ? 'down' : 'up';

      if (direction === 'down' && currentScrollY >= originalOffsetTop && !isFixed) {
        eventDetails.classList.add('fixed-on-top');
        setTimeout(() => {
          eventDetails.classList.add('opacity');
        }, 300);
        siteHeader.classList.add('disabled');
        isFixed = true;

      }

      if (direction === 'up' && currentScrollY <= originalOffsetTop && isFixed) {
        eventDetails.classList.remove('fixed-on-top');
        setTimeout(() => {
          eventDetails.classList.remove('opacity');
        }, 300);
        siteHeader.classList.remove('disabled');
        isFixed = false;
      }

      lastScrollY = currentScrollY;
    }

    window.addEventListener('scroll', handleScroll);
    window.addEventListener('resize', handleScroll);

    //Event video
    const video = document.querySelector('.event-video video');

    if (video) {
      video.removeAttribute('controls');
      video.addEventListener('click', () => {
        video.setAttribute('controls', true);
        video.play();
      });
    }
  });
</script>
<!--  -->
<script>
  (() => {
    document.addEventListener("DOMContentLoaded", () => {
      if (window.innerWidth >= 768) return;

      const SEL = '.speaker-card, .panel-card';
      document.addEventListener('click', (e) => {
        const card = e.target.closest(SEL);
        if (!card || e.target.closest('a')) return; // ignora clicks en links

        // desactivar todas las demás antes de activar la nueva
        document.querySelectorAll(SEL).forEach(el => {
          if (el !== card) {
            el.classList.remove('is-active');
            el.classList.add('no-active');
          }
        });

        // toggle sobre la tarjeta clickeada
        if (card.classList.contains('is-active')) {
          card.classList.remove('is-active');
          card.classList.add('no-active');
        } else {
          card.classList.remove('no-active');
          card.classList.add('is-active');
        }
      });
    })
  })();
</script>
<!-- Scroll -->
<script>
  (function () {
    // Detecta iOS / iPadOS
    function isIOS() {
      const ua = navigator.userAgent || "";
      const plat = navigator.platform || "";
      const iOS = /iPad|iPhone|iPod/.test(ua);
      const iPadOS = plat === "MacIntel" && navigator.maxTouchPoints > 1;
      return iOS || iPadOS;
    }

    function initFakeBar(wrap, boxSelector) {
      const box = wrap.querySelector(boxSelector);
      if (!box) return;
      const track = wrap.querySelector('.sb-track');
      const thumb = track ? track.querySelector('.sb-thumb') : null;
      if (!track || !thumb) return;

      let hideT = null;

      function refresh() {
        const ch = box.clientHeight;
        const sh = box.scrollHeight;
        const ratio = Math.max(ch / Math.max(sh, 1), 0.1);
        const th = Math.round(ch * ratio);
        const maxTop = Math.max(ch - th, 0);
        const top = (sh > ch) ? (box.scrollTop / (sh - ch)) * maxTop : 0;
        thumb.style.height = th + 'px';
        thumb.style.transform = `translateY(${top}px)`;
      }

      function showWhileScrolling() {
        box.classList.add('is-scrolling');
        clearTimeout(hideT);
        hideT = setTimeout(() => box.classList.remove('is-scrolling'), 500);
      }

      box.addEventListener('scroll', () => { refresh(); showWhileScrolling(); }, { passive: true });
      window.addEventListener('resize', refresh);

      refresh();
      wrap.classList.add('active'); // marcar el wrap como activo
    }

    if (isIOS()) {
      document.querySelectorAll('.speaker-bio-wrap').forEach(wrap => initFakeBar(wrap, '.speaker-bio'));
      document.querySelectorAll('.panel-bio-wrap').forEach(wrap => initFakeBar(wrap, '.panel-bio'));
    }
  })();
</script>