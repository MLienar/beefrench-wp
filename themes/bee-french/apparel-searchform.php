<form role="search" action="<?=  esc_url( home_url('/apparel')) ?>">
<input type="hidden" name="post_type2[]" value="apparel" /> 
  <input id="search" type="search" placeholder="Search..." autofocus required value="<?= get_search_query(); ?>" name="s"/>
  <button type="submit">Go</button>    
</form>