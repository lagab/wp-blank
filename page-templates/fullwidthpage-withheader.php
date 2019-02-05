<?php
/**
 * Template Name: Full Width Page with header
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<section class="breadcrumbs-area breadcrumbs-bg" style="background-repeat:no-repeat;background-size:cover;background-attachment:scroll;background-position:center center;background-image: url('<?php the_post_thumbnail_url(); ?>');">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumbs text-center">
            <!---breadcrumbs title start-->
            <?php the_title( '<h1 class="page-title entry-title">', '</h1>' ); ?>
            <!---breadcrumbs title end -->
            <div class="page-title-bar">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'page-without-thumbnail' ); ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :

							comments_template();

						endif;
						?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
