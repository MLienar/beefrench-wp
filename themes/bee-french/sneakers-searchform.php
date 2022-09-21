<?php 
  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
  {
      $url = "https";
  }
  else
  {
      $url = "http"; 
  }  
  $url .= "://"; 
  $url .= $_SERVER['HTTP_HOST']; 
  $url .= $_SERVER['REQUEST_URI']; 
  $urlname = explode("/", $url);
  $urlpost = $urlname[3];
  $urlpost .= '/';
?>

<form role="search" action="<?=  esc_url( home_url($urlpost)) ?>">
<input type="hidden" name="post_type[]" value="sneakers" /> 
  <input id="search" type="search" placeholder="Search..." autofocus required value="<?= get_search_query(); ?>" name="s"/>
  <button type="submit">Go</button>    
</form>