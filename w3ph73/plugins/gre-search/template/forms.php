			<div id="gre-search-tabbed">
					<!-- The tabs -->
					<ul>
						<li><a href="#gre-search-t1" title="<?php _e('For Sale'); ?>"><?php _e('For Sale'); ?></a></li>
						<li><a href="#gre-search-t2" title="<?php _e('Sold Houses'); ?>"><?php _e('Sold Houses'); ?></a></li>
						<li><a href="#gre-search-t3" title="<?php _e('Search Broker'); ?>"><?php _e('Search Broker'); ?></a></li>
					</ul>
					<!-- tab 1 -->
					<div id="gre-search-t1">
						<form method="post" id="frm-gre-search-t1" name="frm-gre-search-t1" action="" onsubmit="check_frm('frm-gre-search-t1'); return false;">
							<input type="hidden" id="loc_def" name="loc_def" value="Address,City & Zip"/>
							<input type="hidden" name="search-type" value="fs"/>
							<div class="gre-search-t1-location">Location</div><input type='text' id="location1" name='location' value="Address,City & Zip" onfocus="clearif('location1','Address,City & Zip');" onblur="resetif('location1','Address,City & Zip','');" onclick="clearif('location1','Address,City & Zip');"/>
							<div>e.g. "New York, NY", "89148", "San Francisco, CA"... </div>
							<div>Property Type</div><select name="prty-type">
														<option value="">All</option>
														<option value="1">Single-Family Home</option>
														<option value="2">Condo</option>
														<option value="3">Townhome</option>
														<option value="4">Coop</option>
														<option value="5">Apartment</option>
														<option value="6">Loft</option>
														<option value="7">TIC</option>
														<option value="5,2,3">Apt/Condo/Twnhm</option>
														<option value="9">Mobile/Manufactured</option>
														<option value="10">Farm/Ranch</option>
														<option value="11">Lot/Land</option>
														<option value="12">Multi-Family Home</option>
														<option value="13">Income/Investment</option>
														<option value="14">Houseboat</option>
														<option value="15">Unspecified</option>
													</select>
													
							<div>Price Range</div>$ <input type='text' id="min_for_sale" name='min' value="min" onclick="clearif('min_for_sale','min')" onfocus="clearif('min_for_sale','min');" onblur="resetif('min_for_sale','min','');"/> $ <input type='text' name='max' id="max_for_sale" value="max" onclick="clearif('max_for_sale','max')" onfocus="clearif('max_for_sale','max');" onblur="resetif('max_for_sale','max','');" />
							<div>Beds</div><select name="beds">
														<option value="0">Any</option>
														<option value="1-2">1+</option>
														<option value="2-3">2+</option>
														<option value="3-4">3+</option>
														<option value="4-5">4+</option>
														<option value="5-6">5+</option>
													</select>
							<div>Baths</div><select name="baths">
														<option value="0">Any</option>
														<option value="1-2">1+</option>
														<option value="2-3">2+</option>
														<option value="3-4">3+</option>
														<option value="4-5">4+</option>
														<option value="5-6">5+</option>
													</select>
							<div>Sqft</div><select name="sqft">
														<option value="0">Any</option>
														<option value="250">250+ sqft</option>
														<option value="500">500+ sqft</option>
														<option value="1000">1,000+ sqft</option>
														<option value="1250">1,250+ sqft</option>
														<option value="1500">1,500+ sqft</option>
													</select>
							<div><input type="checkbox" name="oh" id="oh" value="p"/> Show me only <strong>Open Houses</strong></div>
							<div><input type="checkbox" name="price_change" id="price_change"/> Show me only <strong>Price Reductions</strong></div>
							<div>
								<input type="submit" name="gre-search-submit" value="Search"/>
							</div>
						</form>
					</div>
					<!-- tab 2 -->
					<div id="gre-search-t2">
						<form method="post" id="frm-gre-search-t2" name="frm-gre-search-t2" action="" onsubmit="check_frm('frm-gre-search-t2'); return false;">	
							<input type="hidden" id="loc_def" name="loc_def" value="Address,City & Zip"/>
							<input type="hidden" name="search-type" value="sh"/>
							<div class="gre-search-t2-location">Location</div><input type='text' id="location2" name='location' value="Address,City & Zip" onfocus="clearif('location2','Address,City & Zip');" onblur="resetif('location2','Address,City & Zip','');" onclick="clearif('location2','Address,City & Zip');"/>
							<div>e.g. "New York, NY", "89148", "San Francisco, CA"... </div>
							<div>Property Type</div><select name="prty-type">
														<option value="">All</option>
														<option value="1">Single-Family Home</option>
														<option value="2">Condo</option>
														<option value="3">Townhome</option>
														<option value="4">Coop</option>
														<option value="5">Apartment</option>
														<option value="6">Loft</option>
														<option value="7">TIC</option>
														<option value="5,2,3">Apt/Condo/Twnhm</option>
														<option value="9">Mobile/Manufactured</option>
														<option value="10">Farm/Ranch</option>
														<option value="11">Lot/Land</option>
														<option value="12">Multi-Family Home</option>
														<option value="13">Income/Investment</option>
														<option value="14">Houseboat</option>
														<option value="15">Unspecified</option>
													</select>
							<div>Price Range</div>$ <input type='text' name='min' id="min_sold_house" value="min" onclick="clearif('min_sold_house','min')" onfocus="clearif('min_sold_house','min');" onblur="resetif('min_sold_house','min','');"/> $ <input type='text' name='max' id="max_sold_house" value="max" onclick="clearif('max_sold_house','max')" onfocus="clearif('max_sold_house','max');" onblur="resetif('max_sold_house','max','');" />
							<div>Beds</div><select name="beds">
														<option value="0">Any</option>
														<option value="1-2">1+</option>
														<option value="2-3">2+</option>
														<option value="3-4">3+</option>
														<option value="4-5">4+</option>
														<option value="5-6">5+</option>
													</select>
							<div>Baths</div><select name="baths">
														<option value="0">Any</option>
														<option value="1-2">1+</option>
														<option value="2-3">2+</option>
														<option value="3-4">3+</option>
														<option value="4-5">4+</option>
														<option value="5-6">5+</option>
													</select>
							<div>Sold within</div><select name="sold">
														<option value="0">All</option>
														<option value="3">3 months</option>
														<option value="6">6 months</option>
														<option value="9">9 months</option>
													</select>
							<div>
								<input type="submit" name="gre-search-submit" value="Search"/>
							</div>
						</form>
					</div>
					<!-- tab 3 -->
					<div id="gre-search-t3">
						<form method="post" id="frm-gre-search-t3" name="frm-gre-search-t3" action="" onsubmit="check_frm('frm-gre-search-t3'); return false;">
							<input type="hidden" id="loc_def" name="loc_def" value="Address,City & Zip"/>
							<input type="hidden" name="search-type" value="sb"/>
							<div class="gre-search-t3-location">Location</div><input type='text' id="location3" name='location' value="Address,City & Zip" onfocus="clearif('location3','Address,City & Zip');" onblur="resetif('location3','Address,City & Zip','');" onclick="clearif('location3','Address,City & Zip');"/>
							<div>e.g. "New York, NY", "89148", "San Francisco, CA"... </div>
							<div>Name</div><input type='text' name='name'/>
							<div>
								<input type="submit" name="gre-search-submit" value="Search"/>
							</div>
						</form>
					</div>
				</form>
			</div><!-- tabbed -->	