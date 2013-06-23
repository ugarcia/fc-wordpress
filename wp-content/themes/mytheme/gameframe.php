<?php /*
Template Name: GameFrame
*/ ?>

<?php get_header(); ?>

    <div id="container">
        <div id="content" role="main">
            <iframe src='/games/<?php echo $post->post_title; ?>' style='width:100%; height:60em;'></iframe>
        </div><!-- #content -->
        <?php get_sidebar(); ?>
    </div><!-- #container -->

<?php get_footer(); ?>