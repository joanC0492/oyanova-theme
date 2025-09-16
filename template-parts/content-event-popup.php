<?php
/**
 * Template Part: Event Popup (reusable)
 */

$defaults = [
  'source'       => get_queried_object_id(),
  'autostart_ms' => 1500,
  'field_names'  => [],
];

$args = wp_parse_args( $args ?? [], $defaults );

$field_names = array_merge([
  'enabled'      => 'enable_event_popup',
  'title'        => 'event_popup_title',
  'intro'        => 'event_popup_introduction',
  'content'      => 'event_popup_content',
  'register_url' => 'event_popup_register_link',
  'partner_url'  => 'event_popup_partner_link',
  'badge1'       => 'event_popup_badge',
  'badge2'       => 'event_popup_badge_2',
], $args['field_names']);

$source = $args['source'];

$popup_enabled = $args['enabled']      ?? get_field($field_names['enabled'], $source);
$popup_title   = $args['title']        ?? (get_field($field_names['title'], $source) ?: '');
$popup_intro   = $args['intro']        ?? (get_field($field_names['intro'], $source) ?: '');
$popup_content = $args['content']      ?? (get_field($field_names['content'], $source) ?: '');
$register_url  = $args['register_url'] ?? (get_field($field_names['register_url'], $source) ?: '');
$partner_url   = $args['partner_url']  ?? (get_field($field_names['partner_url'], $source) ?: '');
$badge1        = $args['badge1']       ?? get_field($field_names['badge1'], $source);
$badge2        = $args['badge2']       ?? get_field($field_names['badge2'], $source);

if ( ! $popup_enabled ) {
  return;
}

$modal_id = 'eventModal-' . wp_generate_uuid4();

function som_popup_img($img, $size = 'thumbnail', $attrs = []) {
  if (empty($img)) return '';
  if (is_numeric($img)) {
    return wp_get_attachment_image($img, $size, false, $attrs);
  }
  if (is_array($img)) {
    if (!empty($img['ID'])) {
      return wp_get_attachment_image($img['ID'], $size, false, $attrs);
    }
    if (!empty($img['url'])) {
      $alt = esc_attr($img['alt'] ?? '');
      $url = esc_url($img['url']);
      $extra = '';
      foreach ($attrs as $k => $v) { $extra .= ' ' . esc_attr($k) . '="' . esc_attr($v) . '"'; }
      return '<img src="'.$url.'" alt="'.$alt.'"'.$extra.' />';
    }
  }
  return '';
}
?>

<style>
  .event-popup-intro { padding-right: 46px; }
  .event-popup-content { color: #201747; }
  .event-popup-content p { font-size: 14px; line-height: 18px; padding: 0 10px; }
  .event-popup-content p strong { font-size: 18px !important; }
  .event-popup-intro p a, .event-popup-intro p a span { color: #201747 !important; }
  .event-popup-title { padding-right: 30px; }
  .sec-btn.outline-white-btn.register-btn { color: #201747; border-color: rgba(32,23,71,0.6); }
  .sec-btn.outline-white-btn.partner-btn { background-color: #1D1046; border-color: #1D1046; }
  .event-popup-badges { gap: 15px; }

  @media (max-width: 1200px) {
    .event-popup-title, .event-popup-intro { padding-right: 0; }
    .event-popup-buttons { display: flex; flex-direction: column; gap: 10px; }
    .modal-dialog.modal-xl { max-width: 900px; }
  }

  #<?php echo esc_attr($modal_id); ?> .modal-content { overflow: visible !important; }
  #<?php echo esc_attr($modal_id); ?> button.close {
    position: absolute;
    height: 40px; width: 40px; background-color: black; top: -32px; right: -32px; z-index: 1050 !important;
  }

  @media (max-width: 980px) { .modal-dialog.modal-xl { max-width: 700px; } }
  @media (max-width: 768px) { .modal-body .popup-container { padding: 0 !important; } }

  @media (max-width: 575px) {
    .modal-dialog.modal-xl { max-width: 700px; }
    .modal-dialog.modal-xl .modal-body { padding: 30px 0; }
  }
</style>

<div class="modal fade" id="<?php echo esc_attr($modal_id); ?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable modal-fullscreen-sm-down my-lg-0 my-4">
    <div class="modal-content rounded-0 position-relative" style="border-width: 16px !important;">
      <button type="button" class="close m-3" data-bs-dismiss="modal" aria-label="<?php esc_attr_e('Cerrar', 'textdomain'); ?>">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true" xmlns="https://www.w3.org/2000/svg">
          <path d="M2.66732 23.6667L0.333984 21.3333L9.66732 12L0.333984 2.66667L2.66732 0.333333L12.0007 9.66667L21.334 0.333333L23.6673 2.66667L14.334 12L23.6673 21.3333L21.334 23.6667L12.0007 14.3333L2.66732 23.6667Z" fill="white"/>
        </svg>
      </button>

      <div class="modal-body bg-white rounded-0" style="padding: 35px 10px;">
        <div class="container popup-container">
          <div class="row">
            <div class="col-lg-5">
              <h2 class="event-popup-title mb-lg-5 mb-3 pb-4"><?php echo esc_html($popup_title); ?></h2>

              <?php if ($popup_intro): ?>
                <div class="event-popup-intro mb-3">
                  <?php echo apply_filters('the_content', $popup_intro); ?>
                </div>
              <?php endif; ?>

              <div class="event-popup-badges d-flex justify-content-lg-start justify-content-center mt-lg-0 mt-4">
                <?php if ($badge1): ?>
                  <a href="#" class="me-2">
                    <?php echo som_popup_img($badge1, 'full'); ?>
                  </a>
                <?php endif; ?>
                <?php if ($badge2): ?>
                  <a href="#">
                    <?php echo som_popup_img($badge2, 'thumbnail'); ?>
                  </a>
                <?php endif; ?>
              </div>
            </div>

            <div class="col-lg-6 offset-lg-1">
              <?php if ($popup_content): ?>
                <div class="event-popup-content mb-5">
                  <?php
                    echo apply_filters('the_content', $popup_content);
                  ?>
                </div>
              <?php endif; ?>

              <div class="d-flex justify-content-center justify-content-lg-between align-items-center bg-white">
                <div class="event-popup-buttons">
                  <?php if ($register_url): ?>
                    <a href="<?php echo esc_url($register_url); ?>" class="sec-btn outline-white-btn register-btn">Register Now</a>
                  <?php endif; ?>
                  <?php if ($partner_url): ?>
                    <a href="<?php echo esc_url($partner_url); ?>" class="sec-btn outline-white-btn partner-btn">Partner with us</a>
                  <?php endif; ?>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  var modalEl = document.getElementById('<?php echo esc_js($modal_id); ?>');
  if (!modalEl) return;

  if (!modalEl.dataset.somInit) {
    modalEl.dataset.somInit = '1';
    var delay = <?php echo (int) $args['autostart_ms']; ?>;
    setTimeout(function () {
      if (window.bootstrap && bootstrap.Modal) {
        var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
        modal.show();
      }
    }, delay);
  }
});
</script>
