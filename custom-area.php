/*
 * Step 1. Add Link (Tab) to My Account menu
 */
add_filter ( 'woocommerce_account_menu_items', 'misha_log_history_link', 40 );
function misha_log_history_link( $menu_links ){
 
	$menu_links = array_slice( $menu_links, 0, 5, true ) 
	+ array( 'supporto' => 'Richiedi supporto' )
	+ array_slice( $menu_links, 5, NULL, true );
 
	return $menu_links;
 
}
/*
 * Step 2. Register Permalink Endpoint
 */
add_action( 'init', 'misha_add_endpoint' );
function misha_add_endpoint() {
 
	// WP_Rewrite is my Achilles' heel, so please do not ask me for detailed explanation
	add_rewrite_endpoint( 'supporto', EP_PAGES );
 
}
/*
 * Step 3. Content for the new page in My Account, woocommerce_account_{ENDPOINT NAME}_endpoint
 */
add_action( 'woocommerce_account_supporto_endpoint', 'misha_my_account_endpoint_content' );
function misha_my_account_endpoint_content() {
 
	// of course you can print dynamic content here, one of the most useful functions here is get_current_user_id()
	
   echo 'Compila il form per essere ricontattato indicando il tuo numero di ordine';
	
	echo do_shortcode('YOUR CUSTOM PAGE ');
 
}

