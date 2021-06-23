<?php
/**
 * The template part for displaying post
 *
 * @package VW Healthcare
 * @subpackage vw-healthcare
 * @since vw-healthcare 1.0
 */
?>
<?php 
  $vw_healthcare_archive_year  = get_the_time('Y'); 
  $vw_healthcare_archive_month = get_the_time('m'); 
  $vw_healthcare_archive_day   = get_the_time('d'); 
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-main-box p-3 mb-3">
    <?php
      if ( ! is_single() ) {
        // If not a single post, highlight the gallery.
        if ( get_post_gallery() ) {
          echo '<div class="entry-gallery">';
            echo ( get_post_gallery() );
          echo '</div>';
        };
      };
    ?>
    <article class="new-text">
      <h2 class="section-title mt-0 pt-0"><a href="<?php the_permalink(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
      <?php if( get_theme_mod( 'vw_healthcare_toggle_postdate',true) != '' || get_theme_mod( 'vw_healthcare_toggle_author',true) != '' || get_theme_mod( 'vw_healthcare_toggle_comments',true) != '') { ?>
        <div class="post-info p-2 my-3">
          <?php if(get_theme_mod('vw_healthcare_toggle_postdate',true)==1){ ?>
            <i class="fas fa-calendar-alt"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $vw_healthcare_archive_year, $vw_healthcare_archive_month, $vw_healthcare_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
          <?php } ?>

          <?php if(get_theme_mod('vw_healthcare_toggle_author',true)==1){ ?>
            <span>|</span> <i class="fas fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
          <?php } ?>

          <?php if(get_theme_mod('vw_healthcare_toggle_comments',true)==1){ ?>
            <span>|</span> <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'vw-healthcare'), __('0 Comments', 'vw-healthcare'), __('% Comments', 'vw-healthcare') ); ?></span>
          <?php } ?>
        </div>
      <?php } ?>
      <p class="mb-0">
        <?php $vw_healthcare_theme_lay = get_theme_mod( 'vw_healthcare_excerpt_settings','Excerpt');
        if($vw_healthcare_theme_lay == 'Content'){ ?>
          <?php the_content(); ?>
        <?php }
        if($vw_healthcare_theme_lay == 'Excerpt'){ ?>
          <?php if(get_the_excerpt()) { ?>
            <?php $excerpt = get_the_excerpt(); echo esc_html( vw_healthcare_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_healthcare_excerpt_number','30')))); ?> <?php echo esc_html(get_theme_mod('vw_healthcare_excerpt_suffix',''));?>
          <?php }?>
        <?php }?>
      </p>
      <?php if( get_theme_mod('vw_healthcare_button_text','READ MORE') != ''){ ?>
        <div class="more-btn mt-4 mb-4">
          <a class="p-3" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('vw_healthcare_button_text',__('READ MORE','vw-healthcare')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_healthcare_button_text',__('READ MORE','vw-healthcare')));?></span></a>
        </div>
      <?php } ?>
    </article>
  </div>
</div>