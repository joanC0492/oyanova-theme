<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package oyanova
 */
$sitename		= get_bloginfo("name");
$current_year	= date("Y");
?>

<footer id="colophon" class="site-footer radial-gradient">
	<div class="container">
		<div class="footer-top">
			<div class="row">
				<div class="col-lg-12">
					<div class="footer-content">
						<?php
						$footer_logo	= get_field("footer_logo", "option");
						if (!empty($footer_logo)) { ?>
							<div class="footer-logo">
								<a href="<?php echo home_url(); ?>" class="custom-logo-link" title="<?php echo esc_attr($sitename); ?>">
									<img src="<?php echo esc_url($footer_logo['url']); ?>" width="<?php echo esc_attr($footer_logo['width']); ?>" height="<?php echo esc_attr($footer_logo['height']); ?>" alt="<?php echo esc_attr($footer_logo['alt']); ?>">
								</a>
							</div>
						<?php
						} ?>
						<div class="footer-menu">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'footer-menu',
								)
							); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom-box">
			<div class="row align-items-center">
				<div class="col-12">
					<div class="footer-bottom-text">
						<?php
						$copyright_prefix_text	= get_field("copyright_prefix_text", "option");
						$copyright_suffix_text	= get_field("copyright_suffix_text", "option");
						if (!empty($copyright_prefix_text) && !empty($current_year) && !empty($sitename) && !empty($copyright_suffix_text)) { ?>
							<div class="copy-right">
								<p><?php echo esc_html($copyright_prefix_text . " " . $current_year . " " . $sitename . "" . $copyright_suffix_text);  ?></p>
							</div>
						<?php
						} ?>
						<div class="footer-bottom-link">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'footer-policies-menu',
								)
							); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<!-- Scroll To Top Start -->
<button type="button" id="scrollToTop" class="scrollTop" name="Back To Top">
	<span>
		<i class="fas fa-angle-up"></i>
	</span>
</button>
<!-- Scroll To Top End -->

</div><!-- #page -->

<?php wp_footer();
$service_page_id	= get_the_ID();
$index = 1;
if (have_rows("oh_service_details", $service_page_id)) {
	while (have_rows("oh_service_details", $service_page_id)) {
		the_row();
		$service_popup_inside_content = get_sub_field("service_popup_inside_content");
		// if(get_row_index() == 4){
		if (!empty($service_popup_inside_content)) { ?>
			<!-- Modal -->
			<div class="modal common-popup fade" id="service_popup">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="close-btn">
							<button type="button" class="close close-popup" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
						</div>
						<div class="common-popup-overflow">
							<div class="common-popup-text white-text" data-simplebar="init">
								<div class="common-popup-description-text">
									<?php echo wp_kses_post($service_popup_inside_content); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal -->
<?php
		}
		// }
		$index++;
	}
}
?>
<script>
        document.addEventListener("DOMContentLoaded", function () {

            // Verificar si el popup ya se mostró en esta sesión
            if (!sessionStorage.getItem('popupShown')) {
                // Mostrar el popup después de 3 segundos
                setTimeout(function () {
                    let popup = document.getElementById("popupNewsletter");
                    let overlay = document.getElementById("popup-overlay");
                    
                    // Mostrar el popup con animación
                    popup.style.opacity = "1";
                    popup.style.visibility = "visible";
                    popup.style.transform = "translate(-50%, -50%) scale(1)";

                    // Mostrar el fondo con animación
                    overlay.style.opacity = "1";
                    overlay.style.visibility = "visible";
                }, 2500); // Ajusta el tiempo si lo necesitas

                // Marcar que el popup ya se mostró en esta sesión
                sessionStorage.setItem('popupShown', 'true');
            }
        });

        function closePopup() {
            let popup = document.getElementById("popupNewsletter");
            let overlay = document.getElementById("popup-overlay");

            // Ocultar el popup con animación
            popup.style.opacity = "0";
            popup.style.visibility = "hidden";
            popup.style.transform = "translate(-50%, -50%) scale(0.9)";

            // Ocultar el fondo con animación
            overlay.style.opacity = "0";
            overlay.style.visibility = "hidden";
        }
	
		(function () {
  var targetId = 'partner';
  var params = new URLSearchParams(location.search);
  var shouldScroll = params.get('scroll') === targetId;

  if (!shouldScroll) return;

  function scrollNow() {
    var el = document.getElementById(targetId);
    if (!el) return false;
    el.scrollIntoView({ behavior: 'smooth', block: 'start' });
    return true;
  }

  var attempts = 0, max = 50;
  var timer = setInterval(function () {
    if (scrollNow() || attempts++ >= max) clearInterval(timer);
  }, 100);

  window.addEventListener('load', function () {
    setTimeout(scrollNow, 0);
  });
  window.addEventListener('pageshow', function () {
    setTimeout(scrollNow, 0);
  });
})();

</script>
</body>

</html>