<?php /*
Template Name: Cocos2dTest
*/ ?>

<?php get_header(); ?>

    <div id="container">
        <div id="content" role="main">

            <h1>Testing Cocos2d-html5</h1><hr><br>

            <h2>Test - 01</h2> <hr>
            <h2>Ok, first test with spritesheets/plist based animations</h2><br>
            <p>Only arrow keys supported</p><br>
            <iframe src='/cocos2d-html5-test/cocos2d-html5-test01' style='width:100%; height:40em;'></iframe>  <br>
            <p>Seems to work fine, next stop: Load from CocosBuilder .ccbi instead ...</p>
            <br>

            <h2>Test - 02</h2>  <hr>
            <h2>Now layout/animations/physics using Cocosbuilder and Box2D</h2>  <br>
            <p>Only arrow keys & spacebar supported</p>   <br>
            <iframe src='/cocos2d-html5-test/cocos2d-html5-test02' style='width:100%; height:40em;'></iframe>   <br>
            <p>mmmm .. this can be powerful stuff, next stop: Handle different input events ...</p>   <br>
            <br>

            <h2>Test - 03</h2>  <hr>
            <h2>Handling keyboard/mouse/touch/accelerometer input events ...</h2>  <br>
            <p>Only arrow keys & spacebar supported</p>   <br>
            <iframe src='/cocos2d-html5-test/cocos2d-html5-test03' style='width:100%; height:40em;'></iframe>   <br>
            <p>Looks ok handling inputs, next stop: Add obstacles/enemies ... and recode everything into CoffeeScript haha!! </p>   <br>
            <br>

        </div><!-- #content -->
        <?php get_sidebar(); ?>
    </div><!-- #container -->

<?php get_footer(); ?>