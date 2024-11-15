<?php

/**
 *
 * Load Moore Posts File
 * Description: Infinite scroll loading more posts
 * @package wpstartertheme
 *
 */

namespace WST_THEME\Inc\Classes;

use WST_THEME\Inc\Traits\Singleton;
use \WP_Query;

class Loadmore
{

    use Singleton;

    protected function __construct()
    {

        $this->setup_hooks();
    }

    protected function setup_hooks()
    {

        // FILTERS & ACTIONS
        add_action('wp_ajax_nopriv_load_more', [$this, 'ajax_script_load_more_posts']);
        add_action('wp_ajax_load_more', [$this, 'ajax_script_load_more_posts']);

        add_shortcode('post_listings', [$this, 'post_script_load_more']);
    }

    public function ajax_script_load_more_posts($initial_request = false)
    {

        if (! $initial_request && ! check_ajax_referer('loadmore_post_nonce', 'ajax_nonce', false)) {
            wp_send_json_error(__('Invalid security token sent.', 'wpstartertheme'));
            wp_die('0', 400);
        }

        $is_ajax_request = ! empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

        $page_no = get_query_var('paged') ? get_query_var('paged') : 1;
        $page_no = ! empty($_POST['page']) ? filter_var($_POST['page'], FILTER_VALIDATE_INT) + 1 : $page_no;

        $args = [
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => 6, // Number of posts per page - default
            'paged'          => $page_no,
        ];

        $query = new WP_Query($args);;

        if ($query->have_posts()):
            // Loop Posts.
            while ($query->have_posts()): $query->the_post();
                get_template_part('template-parts/blog/post-card');
            endwhile;

            // Pagination
            if (! $is_ajax_request) :
                $total_pages = $query->max_num_pages;
                get_template_part('template-parts/components/pagination', null, [
                    'total_pages'  => $total_pages,
                    'current_page' => $page_no,
                ]);
            endif;
        else:
            // Return response as zero, when no post found.
            wp_die('0');
        endif;

        wp_reset_postdata();

        if ($is_ajax_request && ! $initial_request) {
            wp_die();
        }
    }

    public function post_script_load_more()
    {

?>
        <div class="load-more-content-wrap">
            <div id="load-more-content">
                <?php
                $this->ajax_script_load_more_posts(true);

                ?>
            </div>
            <button id="load-more" data-page="1" class="load-more-btn">
                <span><?php esc_html_e('Loading...', 'wpstartertheme'); ?></span>
            </button>
        </div>
<?php

    }
}
