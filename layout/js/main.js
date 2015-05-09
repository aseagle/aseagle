// GUI builder category & filter. 

function build_cat_filter(){
	var cat_list = [{"id":1, "name": "Test1", "sub" : [{"id" : 11,"name" : "Test11"}, {"id" : 12, "name" : "Test12", "sub" : [{"id": 1112, "name":"vtest","sub" : [{"id": 1112, "name":"vtest"}]}]},{"id" : 11, "name" : "Test11"},{"id" : 11, "name" : "Test11"}]},{"id":1, "name": "Test1"},{"id":1, "name": "Test1", "sub" : [{"id" : 11,"name" : "Test11"}, {"id" : 12, "name" : "Test12"},{"id" : 11, "name" : "Test11"},{"id" : 11, "name" : "Test11"}]},{"id":1, "name": "Test1"},{"id":1, "name": "Test1", "sub" : [{"id" : 11,"name" : "Test11"}, {"id" : 12, "name" : "Test12"},{"id" : 11, "name" : "Test11"},{"id" : 11, "name" : "Test11"}]},{"id":1, "name": "Test1"},{"id":1, "name": "Test1", "sub" : [{"id" : 11,"name" : "Test11"}, {"id" : 12, "name" : "Test12"},{"id" : 11, "name" : "Test11"},{"id" : 11, "name" : "Test11"}]},{"id":1, "name": "Test1"}];
	var cList = $('ul.cat-side-bar');
	$.each(cat_list, function(i)
	{
		var cat = cat_list[i];
	    var li = $('<li/>')
	        .addClass('ui-menu-item')
	        .attr('role', 'menuitem')
	        .appendTo(cList);
	    
	    var aaa = $('<a/>')
	        .addClass('ui-all')
	        .attr('href', '#' +cat.id)
	        .text(cat.name)
	        .appendTo(li);
	        
        if(cat.sub != null) {
        	add_sub_cat(li, cat.sub)
        }
	});
}

function add_sub_cat(p_li, sub_cat_json) {
	var cList = $('<ul/>').appendTo(p_li);
	$.each(sub_cat_json, function(i)
	{
		var cat = sub_cat_json[i];
	    var li = $('<li/>')
	        .addClass('ui-menu-item')
	        .attr('role', 'menuitem')
	        .appendTo(cList);
	    
	    var aaa = $('<a/>')
	        .addClass('ui-all')
	        .attr('href', '#' +cat.id)
	        .text(cat.name)
	        .appendTo(li);
	        
        if(cat.sub) {
        	add_sub_cat(li, cat.sub)
        }
	});
}

function build_main_product_list() {
	var product_list_json = 
		[{"id":1, "n":"test1","pr" : 100, "m-o": 100, "port":"Saigon",  "pay" : "", "d" : {"cont_1":"test1","c_2":"test2","c_3":"test3","i_1":1,"i_2":2,"i_3":3}},{"id":2, "n":"test2","pr" : 100, "m-o": 100, "port":"Saigon",  "pay" : "", "d" : {"c_1":"test1","c_2":"test2","c_3":"test3","i_1":1,"i_2":2,"i_3":3}},{"id":3, "n":"test3","pr" : 100, "m-o": 100, "port":"Saigon",  "pay" : "", "d" : {"c_1":"test1","c_2":"test2","c_3":"test3","i_1":1,"i_2":2,"i_3":3}},{"id":4, "n":"test4","pr" : 100, "m-o": 100, "port":"Saigon",  "pay" : "", "d" : {"c_1":"test1","c_2":"test2","c_3":"test3","i_1":1,"i_2":2,"i_3":3}}];
	$.each(product_list_json, function(i) {
		build_card_product(product_list_json[i]);
	});
}

function build_card_product(product_json) {
	var cList = $('div.main-area');
	
	var product = $('<div/>')
    .addClass('panel panel-default').appendTo(cList);
	
	var product_head = $('<div/>')
    .addClass('panel-heading clearfix').appendTo(product);
	
	var product_head_text = $('<h3/>')
    .addClass('panel-title pull-left')
    .text(product_json.n).appendTo(product_head);
	
	var button = $('<a class="btn btn-default pull-right" href="#"><i class="fa fa-check"></i>Buy</a>').appendTo(product_head);;
    
    
	var product_content = $('<div/>')
    .addClass('list-group').appendTo(product);
	
	var name;
	for (name in product_json.d) {
		var product_d = $('<div class="list-group-item"><p class="list-group-item-text">'+name+'</p><h4 class="list-group-item-heading">'+product_json.d[name]+'</h4></div>').appendTo(product_content);
	}

	var product_foot = $('<div class="panel-footer"><small>Card footer...</small></div>').appendTo(product);
    
}

// 

$(function() {
	build_cat_filter();
	build_main_product_list();
});