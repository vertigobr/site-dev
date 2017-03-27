<?php get_header(); ?>

<div class="container">
  <div class="pure-g-r">
    <div id="content" class="pure-u-2-3 single-post">
      <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
        <article class="blog-post white-container">
          <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
          <h1><?php the_title(); ?></h1>
          <div class="post-meta">
            <span class="author">
              <i class="fa fa-user"></i>
              <?php the_author(); ?>
            </span>
            <span class="date">
              <i class="fa fa-calendar"></i>
              <?php the_time('d/m/Y') ?>
            </span>
            <span class="category">
              <i class="fa fa-folder-open"></i>
              <?php the_category(', ') ?>
            </span>
          </div>
          <p><?php the_content(); ?></p>
          <?php include (TEMPLATEPATH . '/social.php'); ?>
        </article>
        <?php if ( comments_open() || get_comments_number() ) { comments_template(); } ?>
      <?php endwhile; else : ?>
        <article class="blog-post white-container">
          Nenhuma publicação encontrada.
        </article>
      <?php endif; ?>

    </div>
    <?php get_sidebar(); ?>
  </div>
</div>

<?php get_footer(); ?>
