<?php

/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage Terrific
 * @since Terrific 1.0
 */
?>
<div class="sidebar widget-area" role="complementary">
    <div class="inner">
        <header class="head">
            <?php
            terrific_module('Search', array('template' => 'search'));
            ?>
        </header>
        <?php dynamic_sidebar('sidebar-1')
        ?>
    </div>
</div>