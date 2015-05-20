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

var search_str = {
		"countries" : [],
		"filter" :{
		}
};

// GUI builder category & filter. 
var _AsgMainBuilder = {};
_AsgMainBuilder.LeftSideBar = ( function() {
	// private function 
	function __update_search_str_add(key, value) {
		if(key === "countries") {
			search_str.countries.push(value);
		} else { // key === "filter"
			if(search_str.filter[Object.keys(value)[0]] == null) {
				search_str.filter[Object.keys(value)[0]] = [];
				search_str.filter[Object.keys(value)[0]].push(value[Object.keys(value)[0]]);
			} else {
				search_str.filter[Object.keys(value)[0]].push(value[Object.keys(value)[0]]);
			}
			
		}
	}
	
	function __update_search_str_remove(key, value) {
		if(key === "countries") {
			var index = search_str.countries.indexOf(value);
			if (index > -1) {
				search_str.countries.splice(index, 1);
			}
			
		} else { // key === "filter"
			var index = search_str.filter[Object.keys(value)[0]].indexOf(value[Object.keys(value)[0]]);
			if (index > -1) {
				search_str.filter[Object.keys(value)[0]].splice(index, 1);
			}
		}
	}

	function __build_search_str() {
		var ret = "";
		if(search_str.countries != null && search_str.countries.length > 0) {
			var country = search_str.countries;
			ret+="country=";
			$.each(country, function(i) {
				ret+=country[i] + ",";
			});
		} else {
			ret+="country=0";
		}
		if(search_str.filter != null) {
			var filters = search_str.filter;
			for (id in filters) {
				ret+= "&";
				ret+=id+"=";
				default_values = filters[id];
				$.each(default_values, function(i) {
					ret+=default_values[i]+",";
				});
				
			}
			
		}
		return ret;
		
	}
	
	function ___ajax_response() {
		//_AsgMainBuilder.MainContent.build(_ajax_product_list_json);
	}
	
 	function __ajax_call(request_str) {
 		$.ajax({
		  url: "main/filter/"+g_cat_id+"?"+request_str,
		})
		.done(function(data ) {
			alert("success:" + data);
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
		
		
		$("div.region-list input[type=checkbox]").change(function(e) {
			$("div.country-list li").hide();
		    if(this.checked){
				$("div.country-list li[name="+this.name+"]").show();
		    } else {
		    	$("div.country-list li[name="+this.name+"]").hide();
		    }
		});
	}

	function _build_leftsidebar_columleftbox_country(ajax_json, left_side_bar) {
		var country_array_json = ajax_json;
		
		var div_wrapper = $('<div/>')
			.addClass('column-left country-list')
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
		
		
		$("div.country-list input[type=checkbox]").change(function(e) {
		    if(this.checked){
				//alert("checked country " + $(this).parent().children('a').attr("title"));
		    	__update_search_str_add("countries", $(this).parent().children('a').attr("title"));
		    	alert("send ajax: " + __build_search_str());
		    	__ajax_call(__build_search_str());
		    } else {
		    	__update_search_str_remove("countries", $(this).parent().children('a').attr("title"));
		    	alert("send ajax: " + __build_search_str());
		    	__ajax_call(__build_search_str());
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
	
	function _build_leftsidebar_columleftbox_filter(ajax_json, left_side_bar) {
		var filter_array_json = ajax_json;
		
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
			    if(this.checked){
			    	var temp_str = "{\""+filter_id+"\":\""+$(this).parent().children('a').attr("title")+"\"}";
			    	var temp = JSON.parse(temp_str);
			    	__update_search_str_add("filter", temp);
			    	alert("send ajax: " + __build_search_str());
					//alert("filter-"+filter_id+" id = " + $(this).parent().children('a').attr("title"));
			    } else {
			    	var temp_str = "{\""+filter_id+"\":\""+$(this).parent().children('a').attr("title")+"\"}";
			    	var temp = JSON.parse(temp_str);
			    	__update_search_str_remove("filter", temp);
			    	alert("send ajax: " + __build_search_str());
			    }
			});
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
			_build_leftsidebar_columleftbox_cat_1(cat_list.cat, left_side_bar);
			_build_leftsidebar_columleftbox_filter(cat_list.filter, left_side_bar);
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
				$('<h3><a class="company-hover-label" href="">'+product_json.sup.n+'<div style="display:none;"></div></a>   <span class="glyphicon glyphicon-check" aria-hidden="true"></span></h3>').appendTo(product_head_image_row_seller_detail);
				$('<h3>('+_AsgUtil.Mapping.getCountryName(product_json.sup.c)+')</h3>').appendTo(product_head_image_row_seller_detail);
				$('<h3>('+_AsgUtil.Mapping.getCountryName(product_json.sup.c)+')</h3>').appendTo(product_head_image_row_seller_detail);
				$('<h3>('+_AsgUtil.Mapping.getCountryName(product_json.sup.c)+')</h3>').appendTo(product_head_image_row_seller_detail);
				$('<h3></h3>').appendTo(product_head_image_row_seller_detail);
				var product_head_image_row_seller_detail_button = $('<div/>');
				product_head_image_row_seller_detail_button.appendTo(product_head_image_row_seller_detail);
					$('<button type="button" class="btn btn-primary btn-xs hover-btn" onclick="myFunction()">Request Quotation</button>').appendTo(product_head_image_row_seller_detail_button);
					

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