jQuery(document).ready(function() {
	jQuery("#gre-search-tabbed").tabs();
});

function clearif(id,val)
{
	var id_val = jQuery('#'+id).val();
	if(id_val == val)
	{
		jQuery('#'+id).attr('value','');
	}
}

function resetif(id,val,def)
{
	var id_val = jQuery('#'+id).val();
	
	if(id_val == def)
	{
		jQuery('#'+id).attr('value',val);
	}
}


function check_frm(id)
{
	var frm = document.getElementById(id);
	if(frm.location.value == frm.loc_def.value)
	{
		alert("Please enter a address, city & ZIP");
		return false;
	}
	else
	{
		frm.submit();
	}
}
/*function submit_search_box(loc,def,form)
{
	jQuery('#for-sale-search-box').submit(function(){
		if(jQuery('input:locations').val() == jQuery('#loc-def').val() || jQuery('input:locations').val() == '')
		{
			alert('Please enter an address, city & ZIP');
			return false
		}
	});
}*/