<?php if ($this['config']->get('article_style')=='tm-article-blog') : ?>

<article id="item-<?php the_ID(); ?>" class="uk-article tm-article <?php if (isset($is_column_item) && $is_column_item) echo 'tm-article-column-item'; ?>" data-permalink="<?php the_permalink(); ?>">

    <div>

        <?php if (has_post_thumbnail()) : ?>
        <div class="uk-grid uk-grid-width-medium-1-2" data-uk-grid-match data-uk-grid-margin>
            <div <?php echo $image_alignment == 'right' ? 'class="uk-flex-order-last-medium"' : '' ?>>
                <?php
                $post_image = wp_get_attachment_image_src( get_post_thumbnail_id() );
                ?>
                <div class="uk-cover-background tm-featured-image uk-position-relative" style="background-image:url(<?php echo $post_image[0]; ?>);">
                    <a href="<?php the_permalink() ?>" class="uk-position-cover"></a>
                </div>
            </div>
        <?php endif; ?>

        <div class="tm-article-container <?php if (!has_post_thumbnail()) echo 'uk-flex uk-flex-column'; ?>">

            <div class="tm-article-header">

                <h1 class="uk-article-title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

                <p class="uk-article-meta uk-text-small">
                    <?php if(comments_open() || get_comments_number()) : ?>
                        <span class="uk-icon-comment-o"></span> <span class="uk-margin-right"><?php comments_popup_link(__('No Comments', 'warp'), __('1 Comment', 'warp'), __('% Comments', 'warp'), "", ""); ?></span>
                    <?php endif; ?>
                    <?php
                        $date = '<time datetime="'.get_the_date('Y-m-d').'">'.get_the_date().'</time>';
                        printf(__('Written by %s on %s. Posted in %s', 'warp'), '<a href="'.get_author_posts_url(get_the_author_meta('ID')).'" title="'.get_the_author().'">'.get_the_author().'</a>', $date, get_the_category_list(', '));
                    ?>
                </p>
        
            </div>

            <?php the_content(''); ?>

            <ul class="uk-subnav uk-subnav-line uk-margin-top">
                <li><a class="uk-button uk-button-primary uk-button-large"href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php _e('Continue Reading', 'warp'); ?></a></li>
            </ul>

        </div>

        <?php if (has_post_thumbnail()) : ?>
        </div>
        <?php endif; ?>

        <?php edit_post_link(__('Edit this post.', 'warp'), '<p><i class="uk-icon-pencil"></i> ','</p>'); ?>

    </div>

</article>
<hr>
<?php else: ?>

	<?php include(__DIR__.'/../warp/systems/wordpress/layouts/_post.php'); ?>

<?php endif; ?>
