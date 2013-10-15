<?php /*
Template Name: NewsFrame
*/ ?>

<?php get_header(); ?>

    <div id="container">
        <div id="content" role="main">
            <h1 class="entry-title">Latest News</h1>
            <div class='entry-content'>
                <div class='newsContent'>

                    <!-- Latest news video feed -->
                    <div class='latestNewsVideo'>
                        <?php
                            $ch = curl_init("http://rss.cnn.com/services/podcasting/ac360/rss.xml");
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            $data = curl_exec($ch);
                            $xml = simplexml_load_string($data);
                        ?>
                        <video width="600" height="300" preload='auto' controls autoplay loop>
                            <source src="<?php  echo $xml->channel->item[0]->link ?>" type="video/mp4"></source>
                            Format or video not supported on browser, download it from
                            <a href="<?php  echo $xml->channel->item[0]->link; ?>"> here </a>
                        </video>
                        <p>
                            If your browsers does not support MP4, view it
                            <a href="<?php  echo $xml->channel->item[0]->link; ?>"> here </a>
                        </p>
                    </div>

                    <!-- News feed -->
                    <div class='techNews'>
                        <?php
                            include_once(ABSPATH.WPINC.'/feed.php');
                            $rssfeed = fetch_feed('http://rss.cnn.com/rss/edition_technology.rss');
                            $maxitems = $rssfeed->get_item_quantity(12);
                            $rssnews = $rssfeed->get_items(0, $maxitems);
                            if ($maxitems == 0) {
                        ?>
                            <p>No Tech News.</p>
                        <?php
                            } else {
                                foreach ( $rssnews as $item ) {
                                ?>
                                    <div class='newsEntry'>
                                        <h2><?php echo $item->get_title(); ?></h2>
                                        <p><i><?php echo 'Posted '.$item->get_date('j F Y | g:i a'); ?></i></p>
                                        <p><?php echo $item->get_description(); ?></p>
                                        <a href='<?php echo $item->get_permalink(); ?>'>More..</a>
                                        <!-- echo var_dump($item); -->
                                    </div>
                                <?php
                                }
                            }
                        ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- #content -->
        <?php get_sidebar(); ?>
    </div><!-- #container -->

<?php get_footer(); ?>