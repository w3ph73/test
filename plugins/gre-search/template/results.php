<div id="gre_search_results">
<?php 
	if($listing):
	
?>

	<?php
		foreach($listing as $row):
		
	?>
		<div class="gre_search_result_list">
			<?php
				echo $row->city.', ';
				echo $row->blurb.', ';
				echo $row->address.', ';
				echo $row->bedrooms.', ';
				echo $row->bathrooms.', ';
				echo $row->saleprice;
			?>
		</div>
	<?php
		endforeach;
	?>

<?php
	else :
?>
	<div id="gre_search_result_not_found">
		No Search Result
	</div>
<?php
	endif;
?>
</div>