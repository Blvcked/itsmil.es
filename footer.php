				</main> <!-- #siteMain -->

				<!-- Footer -->
				<?php get_template_part( 'templates/footer' ) ?>

				<!-- WS Form Dynamic Enqueue Hack
				In order to use WS Form with Barba.js
				and not disable dynamic enqueue:
				Use the most complex form to enqueue
				its dependencies across the website.
				-->
				<div class="d-none">
					<?= do_shortcode('[ws_form id="1"]') ?>
				</div>

			</div> <!-- #smooth-content -->
		</div> <!-- #smooth-wrapper -->
	</div> <!-- #siteWrapper -->
<?php wp_footer(); ?>
</body>
</html>