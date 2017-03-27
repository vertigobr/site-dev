<article id="item-<?php the_ID(); ?>" class="uk-article <?php echo $this['config']->get('article', ''); ?>" data-permalink="<?php the_permalink(); ?>">

    <?php
        $image_alignment = $this['config']->get('post_image_align_posts', 'top');
        $image = wp_get_attachment_url( get_post_thumbnail_id() );
        $width = get_option('thumbnail_size_w'); //get the width of the thumbnail setting
        $height = get_option('thumbnail_size_h'); //get the height of the thumbnail setting
    ?>

    <?php if (has_post_thumbnail() && $image_alignment != 'top') : ?>
    <div class="uk-grid uk-grid-width-medium-1-2" data-uk-grid-match="{target:'.uk-panel'}">
    <?php endif; ?>

    <?php if (has_post_thumbnail() && $image_alignment == 'left') : ?>
        <div>
            <div class="uk-panel tm-article-image" style="background:url(<?php echo $image; ?>) #FFF 50% 50% no-repeat; background-size: cover;">
                <a class="uk-position-cover" href="<?php the_permalink() ?>"><?php the_post_thumbnail(array($width, $height), array('class' => 'uk-invisible')); ?></a>
            </div>
        </div>
    <?php endif; ?>

    <?php if (has_post_thumbnail() && $image_alignment != 'top') : ?>
    <div class="uk-flex uk-flex-center uk-flex-middle">
        <div class="uk-panel tm-panel-medium-padding">
    <?php endif; ?>

        <?php if (has_post_thumbnail() && $image_alignment == 'top') : ?>
            <a class="tm-article-image tm-article-image-large uk-display-block" href="<?php the_permalink() ?>" style="background:url(<?php echo $image; ?>) #FFF 50% 50% no-repeat; background-size: cover; min-height:420px !important;">
                <?php the_post_thumbnail(array($width, $height), array('class' => 'uk-invisible')); ?>
            </a>
        <?php endif; ?>

        <h1 class="tm-article-title uk-article-title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

        <div class="tm-article-content uk-margin">
            <?php the_content(''); ?>
        </div>

        <p class="uk-article-meta uk-text-small">
            <?php
                $date = '<time datetime="'.get_the_date('Y-m-d').'">'.get_the_date().'</time>';
                printf(__('Written by %s on %s. Posted in %s', 'warp'), '<a href="'.get_author_posts_url(get_the_author_meta('ID')).'" title="'.get_the_author().'">'.get_the_author().'</a>', $date, get_the_category_list(', '));
            ?>&nbsp;&nbsp;-&nbsp;&nbsp;
            <?php if(comments_open() || get_comments_number()) : ?>
                <span class="uk-icon-comment-o"></span> <span class="uk-margin-right"><?php comments_popup_link(__('No Comments', 'warp'), __('1 Comment', 'warp'), __('% Comments', 'warp'), "", ""); ?></span>
            <?php endif; ?>
        </p>

        <p data-uk-margin>

            <a class="uk-button uk-button-large uk-button-primary" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php _e('Continue Reading', 'warp'); ?></a>

        </p>

        <?php edit_post_link(__('Edit this post.', 'warp'), '<p> ','</p>'); ?>

        <?php if (has_post_thumbnail() && $image_alignment != 'top') : ?>
            </div>
        </div>
        <?php endif; ?>

        <?php if (has_post_thumbnail() && $image_alignment == 'right') : ?>
            <div>
                <div class="uk-panel tm-article-image" style="background:url(<?php echo $image; ?>) #FFF 50% 50% no-repeat; background-size: cover;">
                    <a class="uk-position-cover" href="<?php the_permalink() ?>"><?php the_post_thumbnail(array($width, $height), array('class' => 'uk-invisible')); ?></a>
                </div>
            </div>
        <?php endif; ?>

    <?php if (has_post_thumbnail() && $image_alignment != 'top') : ?>
    </div>
    <?php endif; ?>
<hr>
</article>
