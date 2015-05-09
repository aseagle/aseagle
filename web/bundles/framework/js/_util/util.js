
var _AsgUtil = {};


_AsgUtil.Mapping = ( function() {
	var pub = {};
	
	pub.getColumnName = function (cat_id, c_id) {
		c_id = ""+c_id;
		if(c_id.indexOf("_") == -1) {
			c_id = "_"+c_id;
		}
		if(cat_col_mapping[cat_id][c_id] != null) 
			return cat_col_mapping[cat_id][c_id].n;
		return false;		
	}
	
	pub.getColumnId = function (cat_id, key) {
		return cat_col_mapping[cat_id][key].c_id;
	}

	pub.getDefaultValueArray = function (cat_id, key) {
		return cat_col_mapping[cat_id][key].def_v;
	}
	
	pub.getColumnRequired = function (cat_id, key) {
		return cat_col_mapping[cat_id][key].rq;
	}
	
	pub.getColumnRstr = function (cat_id, key) {
		return cat_col_mapping[cat_id][key].rstr;
	}
	
	pub.getDefaultValue = function (key) {
		return cat_col_defaultvalue_mapping[key];
	}

	pub.getRegionName = function (key) {
		return region_mapping[key];
	}

	pub.getCountryName = function (key) {
		return country_mapping[key].n;
	}

	pub.getCountryRegion = function (key) {
		return country_mapping[key].r;
	}

	pub.getCategoryName = function (key) {
		return cat_mapping[key];
	}
	
	return pub;
})();

_AsgUtil.HeaderNavbar = ( function() {
	var pub = {};
	var cat_list = [];
	
	function __add_cat_list(cat_list, cat_structure, count, level) {
		$.each(cat_structure, function(i) {
			var cat = cat_structure[i];
			var temp = {};
			temp.id = cat.id;
			temp.level = level;
			cat_list[count] = temp;
			count ++;
			
			if(cat.c != null) {
				count = __add_cat_list(cat_list, cat.c, count, level+1);
			}
		});
		return count;
	}
	
	pub.build = function () {
		var navbar = $('#aseagle-navbar');

		var count = 0;
		var level = 0;
		// --- list
		var ul_wrapper_count = -1;
		var ul_wrapper = [];
		
		__add_cat_list(cat_list, cat_structure, count, level);
		
		count = -1;
		$.each(cat_list, function(i){
			if(count > 7) {
				count = 0;				
			} else {
				count++;
			}
			
			if(count == 0) {
				ul_wrapper_count++;
				ul_wrapper[ul_wrapper_count] = $('<ul/>').addClass('col-sm-2 list-unstyled').appendTo(navbar);
			}
			
			var cat = cat_list[i];
			
		    var li = $('<li/>')
		        //.addClass('ui-menu-item')
		        //.attr('role', 'menuitem')
		        .appendTo(ul_wrapper[ul_wrapper_count]);
		    if(cat.level == 0) {
		    	li.attr('style', 'font-weight: bold; font-size: large;')
		    } else if (cat.level == 1) {
		    	li.attr('style', 'font-size: larger;')
		    } else {
		    	li.attr('style', 'padding-left: 5px;font-size: small;')
		    }
		    var aaa = $('<a/>')
		        //.addClass('ui-all')
		        .attr('href', '/' +cat.id)
		        .text(_AsgUtil.Mapping.getCategoryName(cat.id))
		        .appendTo(li);
		});

	}
	return pub;d
})();