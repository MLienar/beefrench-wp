

<form role="search" action="<?=  esc_url( home_url('/produits')) ?>">
  <input id="search" type="search" placeholder="Search..." autofocus required value="<?= get_search_query(); ?>" name="s"/>
  <button type="submit">Go</button>    
</form>