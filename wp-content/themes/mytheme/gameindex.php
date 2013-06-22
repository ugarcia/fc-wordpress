<?php /*
Template Name: GameIndex
*/ ?>

<?php get_header(); ?>

    <div id="container">
        <div id="content" role="main">

            <?php
                $pageid = get_the_ID();
                $games = get_pages(array('child_of' => $pageid));
                foreach ($games as $key => $value) {
                    $name = $value->post_name;
                    $title = $value->post_title;
                    ?>
                        <div class='gameLink'>
                            <a href='<?php echo get_permalink($pageid).$name; ?>'>
                               <img src='<?php echo "/games/${name}/logo.png"; ?>'/><br/>
                               <b><?php echo $title; ?></b>
                            </a>
                        </div>
                    <?php
                }
            ?>

        </div><!-- #content -->

        <?php get_sidebar(); ?>

    </div><!-- #container -->

<?php get_footer(); ?>