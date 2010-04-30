<?php
/*
Plugin Name: Great Real Estate Search
Plugin URI: 
Description: Search real estate listing by using the Great Real Estate plugin.
Version: 1.0
Author: Programmer80
Author URI: 
License: 
*/


class GRE_Search
{
	function __construct()
	{
		
	}
	/*
		Display Form
	*/
	function gre_search_form_display()
	{
		do_action('gre_submit_search');
		$output = '';
		ob_start();
		include_once(dirname(__FILE__).'/template/forms.php');
		$output = ob_get_contents();
		ob_end_clean();
		return $output.$this->gre_search_results();
	}
	/*
		End Display Form
	*/
	
	/*
		Display Result
	*/
	function gre_search_results()
	{
		global $wpdb,$post;

			$select = 'city,blurb,address,bedrooms,bathrooms,saleprice';
			$pre_where = '';
			$output = '';
			
			if( $_POST )
			{
				$search_type = $_POST['search-type'];
				if($search_type == 'fs')
				{
					if($_POST['location'] != '')
					{
						$loc = $wpdb->escape($_POST['location']);
						$pre_where .= "(address LIKE '%$loc%' OR postcode LIKE '%$loc%' OR city LIKE '%$loc%')";
					}
					
					if($_POST['min'] != 'min' && ($_POST['max'] == '' || $_POST['max'] == 'max'))
					{
						$min = $wpdb->escape($_POST['min']);
						$pre_where .= " AND saleprice > $min";
					}
					else if(($_POST['min'] == '' || $_POST['min'] == 'min') && $_POST['max'] != 'max')
					{
						$max = $wpdb->escape($_POST['max']);
						$pre_where .= " AND saleprice <= $max";
					}
					else if($_POST['min'] != 'min' && $_POST['max'] != 'max')
					{
						$min = $wpdb->escape($_POST['min']);
						$max = $wpdb->escape($_POST['max']);
						$pre_where .= " AND (saleprice >= $min AND saleprice <= $max)";
					}
					
					if($_POST['beds'] != 0)
					{
						$arr = explode('-',$_POST['beds']);
						$min = $wpdb->escape($arr[0]);
						$max = $wpdb->escape($arr[1]);
						$pre_where .= " AND (bedrooms >= $min AND bedrooms <= $max)";
					}
					
					if($_POST['baths'] != 0)
					{
						$arr = explode('-',$_POST['baths']);
						$min = $wpdb->escape($arr[0]);
						$max = $wpdb->escape($arr[1]);
						$pre_where .= " AND (bathrooms >= $min AND bathrooms <= $max)";
					}
					
					if($_POST['sqft'] != 0)
					{
						$sqft = $wpdb->escape($_POST['sqft']);
						$pre_where .= " AND acsf >= $sqft";
					}
					if(isset($_POST['price_change']))
					{
						$pre_where .= " AND reduceprice <> '0' AND saleprice > reduceprice";
						$select .= ",reduceprice";
					}
				}
				else if($search_type == 'sh')
				{
					if($_POST['location'] != '')
					{
						$loc = $wpdb->escape($_POST['location']);
						$pre_where .= "(address LIKE '%$loc%' OR postcode LIKE '%$loc%' OR city LIKE '%$loc%')";
						$pre_where .=" AND saledate <> '0000-00-00'";
					}
					
					if($_POST['min'] != 'min' && ($_POST['max'] == '' || $_POST['max'] == 'max'))
					{
						$min = $wpdb->escape($_POST['min']);
						$pre_where .= " AND saleprice >= $min";
					}
					else if(($_POST['min'] == '' || $_POST['min'] == 'min') && $_POST['max'] != 'max')
					{
						$max = $wpdb->escape($_POST['max']);
						$pre_where .= " AND saleprice <= $max";
					}
					else if($_POST['min'] != 'min' && $_POST['max'] != 'max')
					{
						$min = $wpdb->escape($_POST['min']);
						$max = $wpdb->escape($_POST['max']);
						$pre_where .= " AND (saleprice >= $min AND saleprice <= $max)";
					}
					
					if($_POST['beds'] != 0)
					{
						$arr = explode('-',$_POST['beds']);
						$min = $wpdb->escape($arr[0]);
						$max = $wpdb->escape($arr[1]);
						$pre_where .= " AND (bedrooms >= $min AND bedrooms <= $max)";
					}
					
					if($_POST['baths'] != 0)
					{
						$arr = explode('-',$_POST['baths']);
						$min = $wpdb->escape($arr[0]);
						$max = $wpdb->escape($arr[1]);
						$pre_where .= " AND (bathrooms >= $min AND bathrooms <= $max)";
					}
					
					if($_POST['sold'] != 0)
					{
						$num_month = $wpdb->escape($_POST['sold']);
						$pre_where .= " AND (saledate <= DATE_ADD(listdate, INTERVAL $num_month MONTH))";
					}
				}
				else
				{
					if($_POST['location'] != '')
					{
						$loc = $wpdb->escape($_POST['location']);
						$pre_where .= "(address LIKE '%$loc%' OR postcode LIKE '%$loc%' OR city LIKE '%$loc%')";
					}
				}
				
				$where .= (empty($pre_where))? "" : "WHERE $pre_where";
						
				$listing = $wpdb->get_results("SELECT $select FROM $wpdb->gre_search_listing $where");
				if($listing)
				{
					$output .= "<div>";
					foreach ($listing as $row) 
					{
						
						$output .= "<div>City : $row->city</div>";
						$output .= "<div>Blurb : $row->blurb</div>";
						$output .= "<div>Address : $row->address</div>";
						$output .= "<div>Bedrooms : $row->bedrooms</div>";
						$output .= "<div>Bathrooms : $row->bathrooms</div>";
						$output .= "<div>Saleprice : $ ". number_format($row->saleprice) ."</div>";
						if($row->reduceprice)
						{
							$output .= "<div>Reduce Saleprice : $ ". number_format($row->reduceprice) ."</div>";
						}
						$output .= "<hr/>";
					}
					$output .= "</div>";
					
				}
				else
				{
					$output .= "<div>No Result Found</div>";
				}
				return '<br/>'.$output;
			}
	}
	/*
		End Display Result
	*/
}
/* 
	Display Form
	
	The short code will be called by the page assign to it and display the forms in the page.
	Need to add this "[gre-search]" to the page for the short code to work.
*/
add_shortcode('gre-search', 'gre_search_show_forms');
function gre_search_show_forms()
{
	global $wpdb;
	$output = '';
	$wpdb->gre_search_listing = $wpdb->prefix.'greatrealestate_listings';
	$search = new GRE_Search();
	$output = $search->gre_search_form_display();
	return $output;
}
/*
	End Display Form
*/

/*
	Load JQuery

	load the jquery script once the wp_print_scripts is activated
	and call the gre_search_scripts() function
*/
add_action('wp_print_scripts','gre_search_scripts');
function gre_search_scripts()
{
	// check if it is the admin page, if is in the admin
	// page it will not load the jquery script
	if(!is_admin())
	{
		wp_enqueue_script(array('jquery','jquery-ui-core','jquery-ui-tabs'));
		wp_enqueue_script('tabs','/wp-content/plugins/gre-search/js-includes/tabs.js');
	}
}
/*
	End Load JQuery
*/

/*
	Load CSS Script

	load the css script once the wp_print_scripts is activated
	and call the gre_search_styles() function
*/
add_action('wp_print_styles','gre_search_styles');
function gre_search_styles()
{
	// check if it is the admin page, if is in the admin
	// page it will not load the css script
	if(!is_admin())
	{
		wp_enqueue_style('jquery-ui-css','/wp-content/plugins/gre-search/css-includes/jquery-ui-1.7.2.custom.css');
		wp_enqueue_style('search-form','/wp-content/plugins/gre-search/css-includes/search-form.css');
	}
}
/*
	End CSS Script
*/
?>
