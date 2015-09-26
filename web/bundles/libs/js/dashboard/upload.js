

var _AsgDashboard = {};

_AsgDashboard.Upload = ( function() {
	var unit_type = ["ACRE(S)","AMPERE(S)","BAG(S)","BARREL","BLADE","BOX","BUSHEL","CARAT","CARTON","CASE","CENTIMETER","CHAIN","COMBO","CUBIC CENTIMETER","CUBIC FOOT","CUBIC FEET","CUBIC INCH","CUBIC METER","CUBIC YARD","DEGREE CELCIUS","DEGREE FAHRENHEIT","DOZEN","DRAM","FLUID OUNCE","FOOT","FEET","FORTY-FOOT CONTAINER","FURLONG","GALLON","GILL","GRAIN","GRAM","GROSS","HECTARE","HERTZ","INCH","KILOAMPERE","KILOGRAM","KILOHERTZ","KILOMETER","KILOVOLT","KILOOHM","KILOWATT","LITER","LONG TON","MEGAHERTZ","METER","METRIC TON","MILE","MILLIAMPERE","MILLIGRAM","MILLIHERTZ","MILLITER","MILLIMETER","MILLIOHM","MILLIVOLT","MILLIWATT","NAUTICAL MILE","OHM","OUNCE","PACK","PAIR","PALLET","PARCEL","PERCH","PIECE","PINT","PLANT","POLE","POUND ","QUART","QUARTER","ROD","ROLL","SET","SHEET","SHORT TON","SQUARE CENTIMETER","SQUARE FOOT","SQUARE FEET","SQUARE INCH","SQUARE METER","SQUARE MILE","SQUARE YARD","STONE","STRAND","TON","TONNE","TRAY","TWENTY-FOOT CONTAINER","UNIT","VOLT","WATT","WP","YARD"];
	
	function _build_unit_type_dropdown(el) {
		$.each(unit_type, function(i) {
			var temp= '<li><a href="#">'+unit_type[i]+'(S)</a></li>';
			$(temp).appendTo(el);
		});
	}
	
	function __clean_cat_list(cat_level) {
    	var i;
    	for(i=3;i>=cat_level;i--) {
    		var class_cat_tree = '.cat-tree-'+i;    		
    		var div_wrapper = $(class_cat_tree);    		
    		var div_searchlist_wrapper = div_wrapper.find("#searchlist");
    		
    		div_searchlist_wrapper.off();
    		div_searchlist_wrapper.empty();
    		
    		
    	}
    	
    	$(".product-detail-fields").empty();
    }
    
    function _build_cat_list (cat_level, cat_id, json_text) {
		var sub_cats = json_text;		
		var class_cat_tree = '.cat-tree-'+cat_level;		
		var div_wrapper = $(class_cat_tree);		
		var div_searchlist_wrapper = div_wrapper.find("#searchlist");
		
		__clean_cat_list(cat_level);
		
		if(sub_cats.length > 0) {
			$.each(sub_cats, function(i) {
				var temp = '<a class="list-group-item" href="#" tabindex='+i+'><span>'+_AsgUtil.Mapping.getCategoryName(sub_cats[i].id)+'</span></a>';
				$(temp).appendTo(div_searchlist_wrapper);
			});
			
			
			div_searchlist_wrapper.on('click', 'a', function(){
				_build_cat_list(cat_level+1, sub_cats[$(this).attr("tabindex")].id, sub_cats[$(this).attr("tabindex")].c);
			});
		} else {
			_build_product_detail(cat_id);
		}
    } 
    
    
    function __build_textbox(cat_id, col_id, value) {
    	var temp = 
    			'<div class="form-group">'+
				  '<label class="col-md-4 control-label" for="textinput">'+_AsgUtil.Mapping.getColumnName(cat_id, col_id)+'</label>'  +
				  '<div class="col-md-6">'+
				  '<input id="textinput" name="product_detail'+ col_id +'" ' + (value != null ? (' value="'+value+'"') : "") + ' type="text" placeholder="'+_AsgUtil.Mapping.getColumnName(cat_id, col_id)+'" class="form-control input-md" ' + (_AsgUtil.Mapping.getColumnRequired(cat_id, col_id)? "required" : "") +'>'+
				  '</div>'+
				'</div>';
    	var product_details = $(".product-detail-fields");
    		
    	$(temp).appendTo(product_details);
    }
    
    function __build_select_box(cat_id, col_id, value) {
    	var default_values = _AsgUtil.Mapping.getDefaultValueArray(cat_id, col_id);
    	var temp = 
			'<div class="form-group">'+
			  '<label class="col-md-4 control-label" for="textinput">'+_AsgUtil.Mapping.getColumnName(cat_id, col_id)+'</label>'  +
			  '<div class="col-md-6">';
    	temp += '<select id="selectbasic" name="product_detail'+col_id +'" class="form-control" style="padding: 3px">';
    	temp += '<option value="0"></option>';
    	$.each(default_values, function(i) {
    		temp += '<option value="'+default_values[i]+'" ' + (value != null ? (value == default_values[i] ? ' selected=true ' : '') : "") + '>'+_AsgUtil.Mapping.getDefaultValue(default_values[i])+'</option>';
    	});
    	temp += '</select>';
    	temp += '</div>';
    	temp += '</div>';
    	
    	var product_details = $(".product-detail-fields");
    	$(temp).appendTo(product_details);
    }
    
    function __build_select_box_place_of_origin(cat_id, col_id, place_of_origin, value) {
    	var temp = 
			'<div class="form-group">'+
			  '<label class="col-md-4 control-label" for="textinput">Place of Origin</label>'  +
			  '<div class="col-md-6">';
    	temp += '<select id="selectbasic" name="place_of_origin" class="form-control" style="padding: 3px">';
    	
    	for(place_id in place_of_origin) {
    		temp += '<option value="'+place_id+'" '+ (value != null ? (value == place_id ? ' selected=true ' : '') : "") +'>'+_AsgUtil.Mapping.getCountryName(place_id)+'</option>';
    	}
    	temp += '</select>';
    	temp += '</div>';
    	temp += '</div>';
    	
    	var product_details = $(".product-detail-fields");
    	$(temp).appendTo(product_details);
        if(value != null){
            $(temp).find("#selectbasic").val(value);
        }
    }
    
    function _build_product_detail(cat_id) {
    	var current_product_detail_list = cat_col_mapping[cat_id];
    	
    	$("#category_id").val(cat_id);
    	$("#category_id").text(cat_id);
    	
    	//$(".product-detail-fields").empty();
		__build_select_box_place_of_origin(cat_id,null,country_mapping,null);
    	$.each(current_product_detail_list, function(i) {			
    		if(current_product_detail_list[i].n === "Place of Origin") {
    			__build_select_box_place_of_origin(cat_id, i, country_mapping, null);
    		} else if (current_product_detail_list[i].def_v.length > 0){
    			__build_select_box(cat_id, i, null);
    		} else {
    			__build_textbox(cat_id, i, null);
    		}
    	}); 
    }

    function _build_product_detail_edit(cat_id, value_list) {
        var current_product_detail_list = cat_col_mapping[cat_id];

        $("#category_id").val(cat_id);
        $("#category_id").text(cat_id);

        //$(".product-detail-fields").empty();
        $.each(current_product_detail_list, function(i) {
            if(current_product_detail_list[i].n === "Place of Origin") {
                __build_select_box_place_of_origin(cat_id, i, country_mapping, value_list[i.replace("_", "")]);
            } else if (current_product_detail_list[i].def_v.length > 0){
                __build_select_box(cat_id, i, value_list[i.replace("_", "")]);
            } else {
                __build_textbox(cat_id, i, value_list[i.replace("_", "")]);
            }
        });
    }

	return {
		set_form_upload_product : function() {
			// build list of Unit Type
			$(".dropdown-menu-unit-type").each(function() {
				_build_unit_type_dropdown($(this));
			});
			
			// handle click for Unit Type to store to hidden input text.
			$(".dropdown-menu").on('click', 'li a', function(e){
				e.preventDefault();
				$(this).parent().parent().parent().children("input").val($(this).text());
			    $(this).parent().parent().parent().children("button").text($(this).text());
			    $(this).parent().parent().parent().children("button").val($(this).text());
		    });
			
			$(".cat-tree-0").find('#searchlist').btsListFilter('#searchinput', {itemChild: 'span'});
			$(".cat-tree-1").find('#searchlist').btsListFilter('#searchinput', {itemChild: 'span'});
			$(".cat-tree-2").find('#searchlist').btsListFilter('#searchinput', {itemChild: 'span'});
			$(".cat-tree-3").find('#searchlist').btsListFilter('#searchinput', {itemChild: 'span'});
			
			
			 _build_cat_list(0, 1, cat_structure);
		},

        set_form_edit_product : function(cat_id, value_list) {
            // build list of Unit Type
            $(".dropdown-menu-unit-type").each(function() {
                _build_unit_type_dropdown($(this));
            });

            // handle click for Unit Type to store to hidden input text.
            $(".dropdown-menu").on('click', 'li a', function(e){
                e.preventDefault();
                $(this).parent().parent().parent().children("input").val($(this).text());
                $(this).parent().parent().parent().children("button").text($(this).text());
                $(this).parent().parent().parent().children("button").val($(this).text());
            });

            _build_product_detail_edit(cat_id, value_list);
        },

		build : function (ajax_json) {

		}
	}; 
})();


