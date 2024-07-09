<?php

/**
 * Sidebar template
 * Description: Display sidebar Area
 * @package wpstartertheme
 *
 */

get_header();

if (is_active_sidebar('default-sidebar')) :

?>

    <aside id="default-sidebar">

        <?php dynamic_sidebar('default-sidebar'); ?>

    </aside>

<?php

endif;

get_footer();
