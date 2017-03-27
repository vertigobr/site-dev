<?php

$config = array(

    'name' => 'content/wordpress',

    'main' => 'YOOtheme\\Widgetkit\\Content\\Type',

    'config' => array(

        'name'  => 'wordpress',
        'label' => 'WordPress',
        'icon'  => 'plugins/content/wordpress/content.svg',
        'item'  => array('title', 'content', 'media', 'link'),
        'data'  => array(
            'number'   => 5,
            'content'  => 'intro',
            'category' => array(),
            'order_by' => 'post_date',
            'author'   => 'author',
            'date'     => 'publish_up',
            'categories' => 'categories'
        )

    ),

    'items' => function($items, $content, $app) {

        $order = explode('_asc', $content['order_by']);
        $args  = array(
            'numberposts' => $content['number'] ?: 5,
            'category'    => $content['category'] ? implode(',', $content['category']) : 0,
            'orderby'     => isset($order[0]) ? $order[0] : 'post_date',
            'order'       => isset($order[1]) ? 'ASC' : 'DESC',
            'post_status' => 'publish'
        );

        foreach (get_posts($args) as $post) {

            $data = array();

            $data['title']      = get_the_title($post->ID);
            $data['link']       = get_permalink($post->ID);
            $data['author']     = $content['author'] ? get_the_author_meta('display_name', $post->post_author) : '';
            $data['date']       = $content['date'] ? $post->post_date : '';

            $pieces = get_extended($post->post_content);

            if ($content['content'] == 'excerpt') {
                $data['content'] = $app['filter']->apply($post->post_excerpt, 'content');
            } else if ($content['content'] == 'intro') {
                $data['content'] = $app['filter']->apply($pieces['main'], 'content');
            } else {
                $data['content'] = $app['filter']->apply($pieces['main'].$pieces['extended'], 'content');
            }

            if ($content['categories']) {

                $data['categories'] = array();

                foreach(wp_get_post_categories($post->ID) as $catid) {
                    $cat = get_category($catid);
                    $data['categories'][$cat->name] = esc_url( get_category_link($cat->term_id) );
                }

            }

            if ($thumbnail = get_post_thumbnail_id($post->ID)) {
                $image = wp_get_attachment_image_src($thumbnail, 'full');
                $data['media'] = $image[0];
            }

            $data['tags'] = array();

            if ($tags = get_the_tags($post->ID)) {
                foreach($tags as $tag) {
                    $data['tags'][] = $tag->name;
                }
            }

            // map custom fields
            foreach ((array)$content['mapping'] as $map) {
                if (isset($map['name']) && isset($map['field'])) {
                    $value = get_post_meta($post->ID, $map['field']);
                    $data[$map['name']] = array_shift($value);
                }
            }

            $items->add($data);
        }

    },

    'events' => array(

        'init.admin' => function($event, $app) {
            $app['scripts']->add('widgetkit-wordpress-controller', 'plugins/content/wordpress/assets/controller.js');
            $app['angular']->addTemplate('wordpress.edit', 'plugins/content/wordpress/views/edit.php');
        }

    )

);

return defined('WPINC') ? $config : false;
