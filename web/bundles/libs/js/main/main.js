// require(["/js/_util/util", "/js/_util/mapping_en"], function(util) {
	// _AsgMainBuilder.LeftSideBar.build(_ajax_cat_filter_json);
	// _AsgMainBuilder.MainContent.build(_ajax_product_list_json);
// });


/*
 * Global var
 * 
 * */

var g_cat_id;
var g_str_cat_id;

var search_str = {}; // {_id1 : [], _id2 : []}
var temp_search_str = {}; // {filter_id : { id1: true/false, id2 : true/false... }} 

// GUI builder category & filter. 
var _AsgMainBuilder = {};
_AsgMainBuilder.LeftSideBar = ( function() {
	// private function 
	function __update_temp_search_str(filter_id, id, value) {
		if((typeof temp_search_str[filter_id] == 'undefined')) {
			temp_search_str[filter_id] = {};
		}
		
		if((typeof temp_search_str[filter_id][id] == 'undefined')) {
			temp_search_str[filter_id][id] = value;
		} else {
			delete temp_search_str[filter_id][id];
		}
	}
	
	function __update_search_str_add(value) {
		if(search_str[Object.keys(value)[0]] == null) {
			search_str[Object.keys(value)[0]] = [];
			search_str[Object.keys(value)[0]].push(value[Object.keys(value)[0]]);
		} else {
			search_str[Object.keys(value)[0]].push(value[Object.keys(value)[0]]);
		}
	}
	
	function __update_search_str_remove(value) {
		var index = search_str[Object.keys(value)[0]].indexOf(value[Object.keys(value)[0]]);
		if (index > -1) {
			search_str[Object.keys(value)[0]].splice(index, 1);
		}
	}

	function __build_search_str() {
		var ret = "";
		if(search_str._0 == null || typeof search_str._0 == 'undefined') {
			ret+="country=0";
		} else {
			var countries = search_str._0;
			ret+="country=";
			if(countries.length == 0) {
				ret+='0';
			} else {
				$.each(countries, function(i) {
					ret+=countries[i] + ",";
				});
			}
		}
		if(search_str != null) {
			var filters = search_str;
			for (id in filters) {
				if( id != '_0') {
					ret+= "&";
					ret+=id+"=";
					default_values = filters[id];
					$.each(default_values, function(i) {
						ret+=default_values[i]+",";
					});
				}
			}
		}
		return ret;
		
	}
	
	function ___ajax_response() {
		//_AsgMainBuilder.MainContent.build(_ajax_product_list_json);
	}
	
 	function __ajax_call(request_str) {
 		$.ajax({
		  url: "filter/"+g_cat_id+"?"+request_str,
		})
		.done(function(data ) {
			_AsgMainBuilder.MainContent.build(data);
		})
		.fail(function() {
			//_AsgMainBuilder.MainContent.build(_ajax_product_list_json);
			alert( "error" );  
		}); 		
	}
	
	function _build_leftsidebar_columleftbox_region(ajax_json, left_side_bar) {
		var region_array_json = region_mapping;
		
		var div_wrapper = $('<div/>')
			.addClass('column-left c-box region-list')
		    .appendTo(left_side_bar);
		
		// --- header 
		$('<div/>').addClass('header').text("Region of Supplier").appendTo(div_wrapper);
		// --- list
		var cbox = $('<div/>')
			.addClass('c-box')
		    .appendTo(div_wrapper);
		var ul_wrapper = $('<ul/>').appendTo(cbox);
			
		var region_id;
		for (region_id in region_array_json) {
			var region = region_array_json[region_id];
		    var li = $('<li/>')
		        .addClass('item')
		        .appendTo(ul_wrapper);
		    
		    var input = $('<input/>')
		        .addClass('region-check')
		        .attr('type', 'checkbox')
		        .attr('name', region_id)
		        .appendTo(li);
		    var a = $('<a/>')
		        //.addClass('')
		        //.attr('href', '#' +cat.id)
		    	.attr('title', region_id)
		        .text(region)
		        .appendTo(li);
		}
		
		/*$.each(region_array_json, function(i) {
			var region = region_array_json[i];
		    var li = $('<li/>')
		        .addClass('item')
		        .appendTo(ul_wrapper);
		    
		    var input = $('<input/>')
		        .addClass('region-check')
		        .attr('type', 'checkbox')
		        .attr('name', region.id)
		        .appendTo(li);
		    var a = $('<a/>')
		        //.addClass('')
		        //.attr('href', '#' +cat.id)
		    	.attr('title', region.id)
		        .text(_AsgUtil.Mapping.getRegionName(region.id))
		        .appendTo(li);
		});*/
		
		function __count_uncheck(input_checkbox) {
			var count=0;
			for(i=0; i< input_checkbox.length; i++) {
				if(input_checkbox[i].checked) count++;
			}
			return count;
		}
		
		$("div.region-list input[type=checkbox]").change(function(e) {			
		    if(this.checked){			
				if(__count_uncheck($("div.region-list input:checkbox")) == 1) {
					$("div.filter-_0 li").hide();
				}
				$("div.filter-_0 li[name="+this.name+"]").show();
		    } else {
				if(__count_uncheck($("div.region-list input:checkbox")) == 0) {
					$("div.filter-_0 li").show();
				} else {
					$("div.filter-_0 li[name="+this.name+"]").hide();
				}
		    }
		});
	}

	function _build_leftsidebar_columleftbox_country(ajax_json, left_side_bar) {
		var country_array_json = ajax_json;
		
		var div_wrapper = $('<div/>')
			.addClass('column-left filter-_0')
		    .appendTo(left_side_bar);
		
		// --- header 
		$('<div/>').addClass('header').text("Country of Supplier").appendTo(div_wrapper);
		// --- list
		var cbox = $('<div/>')
			.addClass('c-box')
		    .appendTo(div_wrapper);
		var ul_wrapper = $('<ul/>').appendTo(cbox);
		$.each(country_array_json, function(i) {
			var country = country_array_json[i];
		    var li = $('<li/>')
		        .addClass('item_' + _AsgUtil.Mapping.getCountryRegion(country.id))
		        .attr('name', _AsgUtil.Mapping.getCountryRegion(country.id))
		        .appendTo(ul_wrapper);
		    
		    var input = $('<input/>')
		        //.addClass('ui-all')
		        .attr('type', 'checkbox')
		        .appendTo(li);
		    var a = $('<a/>')
		        //.addClass('')
		        //.attr('href', '#' +cat.id)
		    	.attr('title', country.id)
		        .text(_AsgUtil.Mapping.getCountryName(country.id).concat(" (",country.count,")"))
		        .appendTo(li);
		});
		
		var filter_id = "_0";
		$("div.filter-"+filter_id+" input[type=checkbox]").change(function(e) {
		    /*if(this.checked){
				//alert("checked country " + $(this).parent().children('a').attr("title"));
		    	__update_search_str_add("countries", $(this).parent().children('a').attr("title"));
		    	alert("send ajax: " + __build_search_str());
		    	//__ajax_call(__build_search_str());
		    } else {
		    	__update_search_str_remove("countries", $(this).parent().children('a').attr("title"));
		    	alert("send ajax: " + __build_search_str());
		    	//__ajax_call(__build_search_str());
		    }*/
			if($("div.filter-"+filter_id).children('#filter_confirm_box').length == 0) {
				console.log("this is first time select");
				_cancel_leftsidebar_columleftbox_confirmbox();
				_build_leftsidebar_columleftbox_confirmbox($("div.filter-"+filter_id));
			}
			
			if(this.checked){
				var temp_str = "{\""+filter_id+"\":\""+$(this).parent().children('a').attr("title")+"\"}";
				var temp = JSON.parse(temp_str);
				__update_temp_search_str(filter_id, $(this).parent().children('a').attr("title"), true);
				//__update_search_str_add("filter", temp);
				//alert("send ajax: " + __build_search_str());
				//alert("filter-"+filter_id+" id = " + $(this).parent().children('a').attr("title"));
			} else {
				var temp_str = "{\""+filter_id+"\":\""+$(this).parent().children('a').attr("title")+"\"}";
				var temp = JSON.parse(temp_str);
				__update_temp_search_str(filter_id, $(this).parent().children('a').attr("title"), false);
				//__update_search_str_remove("filter", temp);
				//alert("send ajax: " + __build_search_str());
			}
		});
	}

	function __add_sub_cat(p_li, sub_cat_json) {
		var ul_wrapper = $('<ul/>').appendTo(p_li);
		$.each(sub_cat_json, function(i)
		{
			var cat = sub_cat_json[i];
		    var li = $('<li/>')
		        //.addClass('ui-menu-item')
		        //.attr('role', 'menuitem')
		        .appendTo(ul_wrapper);
		    
		    if(cat.id == g_cat_id) {
		    	li.addClass('cat-selected');
		    }
		    var aaa = $('<a/>')
		        //.addClass('ui-all')
		        .attr('href', '/' +cat.id)
		        .text(_AsgUtil.Mapping.getCategoryName(cat.id).concat(((cat.count == null) ? "": " ("+cat.count+")")))
		        .appendTo(li);
		        
	        if(cat.sub != null) {
	        	__add_sub_cat(li, cat.sub);
	        }
		});
	}

	function _build_leftsidebar_columleftbox_cat(ajax_json, left_side_bar) {
		var cat_list = ajax_json;
		
		var div_wrapper = $('<div/>')
		.addClass('column-left c-box')
	    .appendTo(left_side_bar);
		
		// --- header 
		$('<div/>').addClass('header').text("Category").appendTo(div_wrapper);
		// --- list
		var cbox = $('<div/>')
			.addClass('c-box')
		    .appendTo(div_wrapper);
		var ul_wrapper = $('<ul/>').addClass('nav').appendTo(cbox);
		$.each(cat_list, function(i)
		{
			var cat = cat_list[i];
		    var li = $('<li/>')
		        //.addClass('ui-menu-item')
		        //.attr('role', 'menuitem')
		        .appendTo(ul_wrapper);
		    if(cat.id == g_cat_id) {
		    	li.addClass('selected-cat');
		    }
		    var aaa = $('<a/>')
		        //.addClass('ui-all')
		        .attr('href', '/' +cat.id)
		        .text(_AsgUtil.Mapping.getCategoryName(cat.id).concat(((cat.count == null) ? "": " ("+cat.count+")")))
		        .appendTo(li);
		        
	        if(cat.sub != null) {
	        	__add_sub_cat(li, cat.sub);
	        }
		});
	}

	function _build_leftsidebar_columleftbox_cat_1(ajax_json, left_side_bar) {
		var cat_list = ajax_json;
		var div_wrapper = $('<div/>')
		.addClass('column-left c-box')
	    .appendTo(left_side_bar);
		
		// --- header 
		$('<div/>').addClass('header').text("Category").appendTo(div_wrapper);
		// --- list
		var cbox = $('<div/>')
			.addClass('c-box')
		    .appendTo(div_wrapper);
		var ul_wrapper = $('<ul/>').addClass('nav').appendTo(cbox);
		$.each(cat_list, function(i) {
			var cat = cat_list[i];
			
			if(cat.parent_id == null) {
				var cat = cat_list[i];
			    var li = $('<li/>')
			        //.addClass('ui-menu-item')
			        .attr("id", cat.id)
			        .appendTo(ul_wrapper);
			    if(cat.id == g_cat_id) {
			    	li.addClass('selected-cat');
			    }
			    var aaa = $('<a/>')
			        //.addClass('ui-all')
			        .attr('href', '/' +cat.id)
			        .text(_AsgUtil.Mapping.getCategoryName(cat.id).concat(((cat.count == null) ? "": " ("+cat.count+")")))
			        .appendTo(li);
			} else {
				var cat = cat_list[i];
				
				var ul_wrapper_1 = $('ul#'+cat.parent_id);
				
				if(ul_wrapper_1.length == 0) {
					var li_wrapper =  $('li#'+cat.parent_id);
					ul_wrapper_1 = $('<ul/>').addClass('nav').attr("id",cat.parent_id).appendTo(li_wrapper);
				} 
				
			    var li = $('<li/>')
			        //.addClass('ui-menu-item')
			        .attr('id', cat.id)
			        .appendTo(ul_wrapper_1);
			    if(cat.id == g_cat_id) {
			    	li.addClass('selected-cat');
			    }
			    var aaa = $('<a/>')
			        //.addClass('ui-all')
			        .attr('href', '/' +cat.id)
			        .text(_AsgUtil.Mapping.getCategoryName(cat.id).concat(((cat.count == null) ? "": " ("+cat.count+")")))
			        .appendTo(li);
			}

		});
	}
	
	function __compile_cat_structure(cat_id) {
		__compile_cat_structure
	}
	
	function _build_leftsidebar_columleftbox_cat_2(left_side_bar) {
		var cat_list = _AsgUtil.LeftSideBar.category_compile(g_cat_id);
		var div_wrapper = $('<div/>')
		.addClass('column-left c-box')
	    .appendTo(left_side_bar);
		
		// --- header 
		$('<div/>').addClass('header').text("Category").appendTo(div_wrapper);
		// --- list
		var cbox = $('<div/>')
			.addClass('c-box')
		    .appendTo(div_wrapper);
		var ul_wrapper = $('<ul/>').addClass('nav').appendTo(cbox);
		$.each(cat_list, function(i) {
			var cat = cat_list[i];
			
			if(cat.parent_id == null) {
				var cat = cat_list[i];
			    var li = $('<li/>')
			        //.addClass('ui-menu-item')
			        .attr("id", cat.id)
			        .appendTo(ul_wrapper);
			    if(cat.id == g_cat_id) {
			    	li.addClass('selected-cat');
			    }
			    var aaa = $('<a/>')
			        //.addClass('ui-all')
			        .attr('href', '/' +cat.id)
			        .text(_AsgUtil.Mapping.getCategoryName(cat.id).concat(((cat.count == null) ? "": " ("+cat.count+")")))
			        .appendTo(li);
			} else {
				var cat = cat_list[i];
				
				var ul_wrapper_1 = $('ul#'+cat.parent_id);
				
				if(ul_wrapper_1.length == 0) {
					var li_wrapper =  $('li#'+cat.parent_id);
					ul_wrapper_1 = $('<ul/>').addClass('nav').attr("id",cat.parent_id).appendTo(li_wrapper);
				} 
				
			    var li = $('<li/>')
			        //.addClass('ui-menu-item')
			        .attr('id', cat.id)
			        .appendTo(ul_wrapper_1);
			    if(cat.id == g_cat_id) {
			    	li.addClass('selected-cat');
			    }
			    var aaa = $('<a/>')
			        //.addClass('ui-all')
			        .attr('href', '/' +cat.id)
			        .text(_AsgUtil.Mapping.getCategoryName(cat.id).concat(((cat.count == null) ? "": " ("+cat.count+")")))
			        .appendTo(li);
			}

		});
	}	
	
	// ---- columleftbox_filter
	
	
	function _build_leftsidebar_columleftbox_filter(ajax_json, left_side_bar) {
		var filter_array_json = _AsgUtil.LeftSideBar.filter_compile(g_str_cat_id);
		
		if(filter_array_json.length <= 0) {
			return;
		}
		$.each(filter_array_json, function(i) {
			var filter_id = filter_array_json[i];
			var header_text = _AsgUtil.Mapping.getColumnName(g_str_cat_id, filter_id);
			if(header_text != null) {
				var div_wrapper = $('<div/>')
				.addClass('column-left c-box filter-'+filter_id)
			    .appendTo(left_side_bar);
				
				// --- header 
				$('<div/>').addClass('header').text(header_text).appendTo(div_wrapper);
				// --- list

				var cbox = $('<div/>')
					.addClass('c-box')
				    .appendTo(div_wrapper);
				var ul_wrapper = $('<ul/>').appendTo(cbox);
				var default_value_array_json = _AsgUtil.Mapping.getDefaultValueArray(g_str_cat_id, filter_id);
				$.each(default_value_array_json, function(i) {
					var default_value_id = default_value_array_json[i];
				    var li = $('<li/>')
				        .addClass('item')
				        .appendTo(ul_wrapper);
				    
				    var input = $('<input/>')
				        //.addClass('ui-all')
				        .attr('type', 'checkbox')
				        .appendTo(li);
				    var a = $('<a/>')
				        //.addClass('')
				        //.attr('href', '#' +cat.id)
				    	.attr('title', default_value_id)
				        .text(_AsgUtil.Mapping.getDefaultValue(default_value_id))
				        .appendTo(li);
				});
			}
			
			$("div.filter-"+filter_id+" input[type=checkbox]").change(function(e) {
				if($("div.filter-"+filter_id).children('#filter_confirm_box').length == 0) {
					console.log("this is first time select");
					_cancel_leftsidebar_columleftbox_confirmbox();
					_build_leftsidebar_columleftbox_confirmbox($("div.filter-"+filter_id));
				} 
			    if(this.checked){
			    	var temp_str = "{\""+filter_id+"\":\""+$(this).parent().children('a').attr("title")+"\"}";
			    	var temp = JSON.parse(temp_str);
			    	__update_temp_search_str(filter_id, $(this).parent().children('a').attr("title"), true);
					//__update_search_str_add("filter", temp);
			    	//alert("send ajax: " + __build_search_str());
					//alert("filter-"+filter_id+" id = " + $(this).parent().children('a').attr("title"));
			    } else {
			    	var temp_str = "{\""+filter_id+"\":\""+$(this).parent().children('a').attr("title")+"\"}";
			    	var temp = JSON.parse(temp_str);
			    	__update_temp_search_str(filter_id, $(this).parent().children('a').attr("title"), false);
					//__update_search_str_remove("filter", temp);
			    	//alert("send ajax: " + __build_search_str());
			    }
			});
		});		
	}
		
	function _confirm_leftsidebar_columleftbox_confirmbox() {
		filter_id = Object.keys(temp_search_str)[0];
		filter_default_value_ids = Object.keys(temp_search_str[filter_id]);
		for(var id in temp_search_str[filter_id]) {
			var temp_str = '{"'+filter_id+'" :"'+id+'"}';
			var temp = JSON.parse(temp_str);
			if(temp_search_str[filter_id][id]) {
				__update_search_str_add(temp);
			} else {
				__update_search_str_remove(temp);
			}
		}
		__ajax_call(__build_search_str());
		temp_search_str = {};
		$('#filter_confirm_box').remove();
	}
	
	function _cancel_leftsidebar_columleftbox_confirmbox() {
		filter_id = Object.keys(temp_search_str)[0];
		var li = $("div.filter-"+filter_id).find("li") ;
		for(var i=0; i < li.length; i++) {
			var id = $(li[i]).children('a').attr("title");
			if(typeof temp_search_str[filter_id][id] != 'undefined') {
				$(li[i]).children('input').prop("checked", !temp_search_str[filter_id][id]);
			}
		}
		temp_search_str = {};
		$('#filter_confirm_box').remove();
	}

	
	function _build_leftsidebar_columleftbox_confirmbox(left_side_bar) {
		var temp = '<div id="filter_confirm_box" class="column-left c-box" style="background-color: green;padding: 5px 10px 5px 10px;box-shadow: 2px 2px 1px #888888;margin-top:8px;">'+
				'<div class="c-box">'+
				'<input class="btn btn-default btn-xs" type="button" value="Confirm" id="filter-confirm">'+
				'<a href="javascript:void(0)" style="color:white;margin-left:18px" id="filter-cancel">Cancel</a>'+
				'</div></div>';
				
		var div_wrapper = $(temp)
	    .appendTo(left_side_bar);
		
		$('#filter-confirm').click(function(){
			_confirm_leftsidebar_columleftbox_confirmbox();
			
		});
		$('#filter-cancel').click(function(){
			_cancel_leftsidebar_columleftbox_confirmbox();
		});
	}
	
	// public function
	return {
		build : function (ajax_json) {
			var cat_list = ajax_json;
			var left_side_bar = $('.left-side-bar');
			
			g_cat_id = ajax_json.current_cat_id;
			g_str_cat_id = g_cat_id.toString();
			
			_build_leftsidebar_columleftbox_region(cat_list.region, left_side_bar);
			_build_leftsidebar_columleftbox_country(cat_list.country, left_side_bar);
			_build_leftsidebar_columleftbox_cat_2(left_side_bar);
			_build_leftsidebar_columleftbox_filter(cat_list.filter, left_side_bar);
			//_build_leftsidebar_columleftbox_confirmbox(left_side_bar);
		},
	}; 
	
})();



_AsgMainBuilder.MainContent = ( function() {
	// private function 
	function _buildCommentForm(product_comments_collapse) {
		var temp = 
			'<div class="input-group">'+
	          '<input type="text" class="form-control">'+
		        '<div class="input-group-btn">'+
		          '<button type="button" class="btn btn-default" tabindex="-1">Action</button>'+
		          '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" tabindex="-1">'+
		            '<span class="caret"></span>'+
		            '<span class="sr-only">Toggle Dropdown</span>'+
		          '</button>'+
		          '<ul class="dropdown-menu dropdown-menu-right" role="menu">'+
		            '<li><a href="#">Action</a></li>'+
		            '<li><a href="#">Another action</a></li>'+
		            '<li><a href="#">Something else here</a></li>'+
		           '<li class="divider"></li>'+
		            '<li><a href="#">Separated link</a></li>'+
		          '</ul>'+
		        '</div>'+
		      '</div>';
		var product = $(temp).appendTo(product_comments_collapse);
      
	}
	
	function _buildCardProduct(ajax_json, div_main_area) {
		var product_json = ajax_json;
		var product = $('<div/>')
	    .addClass('my-card').appendTo(div_main_area);
		
		// -- product header
		//var product_head = $('<h5/>');
	    //.addClass('card-title').text(product_json.n).appendTo(product);
		
		// -- product head image row. 	
		var product_head_image_row = $('<div/>')
	    .addClass('card-heading image row').appendTo(product);
			// ------  product_head_image_row_product_detail
			var product_head_image_row_product_detail = $('<div/>')
			 .addClass('col-xs-8 col-sm-8 card-heading-header').appendTo(product_head_image_row);
			
				var product_head_image_row_product_detail_image = $('<a href="/aseagle/web/app.php/product/show/'+product_json.id+'" target="_blank"><img src="'+product_json.img+'" rel="popover"></a>')
				 .appendTo(product_head_image_row_product_detail);	
				$('<h3 class="title" data-toggle="tooltip" data-placement="bottom" title="'+product_json.n+'"><strong><a href="/aseagle/web/app.php/product/show/'+product_json.id+'" target="_blank">'+product_json.n+'</a></strong></h3>').appendTo(product_head_image_row_product_detail);
				$('<h3>FOB Price: <strong>US$'+product_json.pr+'</strong></h3>').appendTo(product_head_image_row_product_detail);
				$('<h3>Min. order: <strong>'+product_json.m_o+'</strong> (kg)</h3>').appendTo(product_head_image_row_product_detail);
				
				var col;
				var h3_prop = '<h3 class="prop">';
				for (col in product_json.d) {
					if(product_json.d[col] != null)
					h3_prop+="<em>"+_AsgUtil.Mapping.getColumnName(product_json.cat_id, parseInt(col))+":</em>" + product_json.d[col] + "; ";
				}
				h3_prop += "</h3>";
				var product_head_image_row_product_detail = $(h3_prop).appendTo(product_head_image_row_product_detail);
			// ------ product_head_image_row_seller_detail
			var product_head_image_row_seller_detail = $('<div/>')
			 .addClass('col-xs-4 col-sm-4 card-heading-header').appendTo(product_head_image_row);
				var seller_verified_icon = product_json.sup.v ? '<span class="glyphicon glyphicon-check" aria-hidden="true"></span>' : '';
				$('<h3 class="title"><a class="company-hover-label" href="'+product_json.sup.link+'">'+product_json.sup.n+'<div style="display:none;"></div></a>   '+seller_verified_icon+'</h3>').appendTo(product_head_image_row_seller_detail);
				$('<h3>(from '+_AsgUtil.Mapping.getCountryName(product_json.sup.c)+')</h3>').appendTo(product_head_image_row_seller_detail);
				$('<h3 class="prop"><em>Main market:</em> '+product_json.sup.m_m+'</h3>').appendTo(product_head_image_row_seller_detail);
				$('<h3 class="prop"><em>Main product:</em> '+product_json.sup.m_p.toString()+'</h3>').appendTo(product_head_image_row_seller_detail);
				$('<br><br>').appendTo(product_head_image_row_seller_detail);
				var product_head_image_row_seller_detail_button = $('<div class="col-xs-12 pull-right"></div>');
				product_head_image_row_seller_detail_button.appendTo(product_head_image_row_seller_detail);
					$('<button type="button" class="btn btn-primary btn-xs hover-btn btn-block" onclick="request_quotation_modal()">Request Quotation</button>').appendTo(product_head_image_row_seller_detail_button);
					$('<button type="button" class="btn btn-default btn-xs hover-btn btn-block" onclick="contact_supplier_modal()">Contact Supplier</button>').appendTo(product_head_image_row_seller_detail_button);
					

		// -- product short description			
		//var product_body = $('<div/>')
	    //.addClass('card-body').text(product_json.des).appendTo(product);
		
		// -- product comments (user interact with product)
		/*var product_comment = $('<div/>')
	    .addClass('card-comments').appendTo(product);
		
			var product_comments_collapse_toggle= $('<div/>')
		    .addClass('comments-collapse-toggle').appendTo(product_comment);
			$('<a data-toggle="collapse" href="#a'+product_json.id+'-comments">'+ ((product_json.cmt != null) ? product_json.cmt.length : 0) +' comments <i class="icon-angle-down"></i></a>').appendTo(product_comments_collapse_toggle);
			
		
			var product_comments_collapse= $('<div/>')
		    .addClass('comments collapse').attr('id','a'+product_json.id+'-comments').appendTo(product_comment);

			if(product_json.cmt != null)
			for (i = 0; i < product_json.cmt.length; i++) {
				var comment = product_json.cmt[i];
				var tmp = '<div class="comment"><strong>'+comment.un+':</strong>'+comment.c+'<em> '+comment.d+'</em>)</div>';
				$(tmp).appendTo(product_comments_collapse);
			}
			
			_buildCommentForm(product_comments_collapse);*/
			
			
	}
	
	// public function
	return {
		build : function (ajax_json) {
			var product_list = ajax_json;
			var div_main_area = $('div.main-area');
			
			while (div_main_area.children('.my-card')[0]) {
				div_main_area.children('.my-card')[0].remove();
			}
			$.each(product_list, function(i) {
				_buildCardProduct(product_list[i], div_main_area);
			});
		},
	};
	
})();

$(document).ready(function(){
    if(_ajax_cat_filter_json){
	    _AsgMainBuilder.LeftSideBar.build(_ajax_cat_filter_json);
    }
	_AsgMainBuilder.MainContent.build(_ajax_product_list_json);

	_AsgUtil.HeaderNavbar.build();
	
	$("img[rel='popover']").popover({
		trigger: 'hover',
		placement : 'right', //placement of the popover. also can use top, bottom, left or right
		//title : '<div style="text-align:center; color:red; text-decoration:underline; font-size:14px;"> </div>', //this is the top title bar of the popover. add some basic css
		html: 'true', //needed to show html of course
		content : function () {
			return '<div id="popOverBox"><img class="reset-this" src="'+$(this)[0].src + '" /></div>' //this is the content of the html box. add the image here or anything you want really.
		}
	});
	
	var hoverHTMLDemoBasic = '<div class="hover-card-popup"></div>';
	
	$(".company-hover-label").hovercard({
		detailsHTML: hoverHTMLDemoBasic,
		width: 400,
		onHoverIn: function () {
			//alert($(this).children('label').children('div').html());
			$('.hover-card-popup').html($(this).children('a').children('div').html());
		}
	});

});