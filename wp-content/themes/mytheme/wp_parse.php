<?php
/*
Template Name: SQLParse
*/
    ob_start();
?>
    <?php get_header(); ?>

    <div id="container">
        <div id="content" role="main">
            <h1 class="entry-title">Browse a file and parse!</h1>
            <div class='entry-content'>
                <form enctype="multipart/form-data" method="post">
                    <input type='file' name='dbfile'><br>
                    <input type='text' name='old_host' placeholder='Enter SOURCE Domain Here' required><br>
                    <input type='text' name='new_host' placeholder='Enter TARGET Domain Here' required><br>
                    <input type='submit' value='Parse'>
                </form>
            </div>
        </div><!-- #content -->
        <?php get_sidebar(); ?>
    </div><!-- #container -->

    <?php get_footer(); ?>

<?php
if (isSet($_FILES['dbfile'])) {
    $filename = $_FILES['dbfile']['tmp_name'];
    $srcFilename = $_FILES['dbfile']['name'];
    if (!file_exists($filename)) die('<b>File not found</b>');
    if (!isset($_POST['old_host']) || $_POST['old_host'] == '') die('<b>Source domain not found</b>');
    if (!isset($_POST['new_host']) || $_POST['new_host'] == '') die('<b>Target domain not found</b>');
    $old_host = $_POST['old_host'];
    $new_host = $_POST['new_host'];
    $new_host_url = 'http://'.$new_host;
    $sql = file_get_contents($filename, true);
    $parsed = preg_replace_callback(
        '/s:(\d+):([^;]*)http:\/\/'.$old_host.'/',
        function($matches) {
            $size = intval($matches[1]) + strlen($GLOBALS['new_host']) - strlen($GLOBALS['old_host']);
             $entry = 's:'.$size.':'.$matches[2].$GLOBALS['new_host_url'];
            return $entry;
        },
        $sql
    );
    $parsed2 = preg_replace('/http%3A%2F%2F'.$old_host.'/', 'http%3A%2F%2F'.$new_host, $parsed);
    $parsed3 = preg_replace('/http:\/\/'.$old_host.'/', $new_host_url, $parsed2);
    $parsedName = 'parsed_'.$srcFilename;
    $bs_pos = strrpos($filename, "\\");
    $rs_pos = strrpos($filename, "/");
    $parsedPath = substr($filename, 0, max($bs_pos, $rs_pos)+1);
    file_put_contents($parsedPath.$parsedName, $parsed3);
    ob_end_clean();
    header('Content-type: application/text');
    header('Content-Disposition: attachment; filename="'.$parsedName.'"');
    readfile($parsedPath.$parsedName);
}
?>