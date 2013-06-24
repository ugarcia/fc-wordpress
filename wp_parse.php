<?php?>
  <h1>Initializing parse... <h1/><hr>
  
<?php
  //$filename = $_GET['filename'];
  //$old_host = $_GET['old_host'];
  //$new_host = $_GET['new_host'];
  
  $filename = 'ac3jyz8c_wordpress.sql';
  $old_host = 'frontcoder.com';
  $new_host = 'localhost';
  
  $sql = file_get_contents('./'.$filename, true);
?> 

  <h2>Raw content</h2><?php echo $sql;?><hr>
  
<?php 
  $matriz_fl = preg_grep("/^(.*frontcoder.com.*)*$/", $sql);
  echo $matriz_fl;
?> 

  <h2>Parsed content</h2><?php echo $sql;?><hr>
  
  <h1>... parsing Done!<h1/>
<?php?>