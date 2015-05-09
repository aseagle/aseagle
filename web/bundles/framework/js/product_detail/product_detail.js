/**
 * Created by HiepLuong on 12/26/14.
 */
var _AsgProductDetailBuilder = {};
_AsgProductDetailBuilder.DetailInfo = ( function() {
    // private function
    function _buildDetailInfo(ajax_json, div_main_area) {

        var product_json = ajax_json;
        var table = $('<table/>').addClass('w100').appendTo(div_main_area);
        var col;
        var index = 0;
        var tr = $("<tr/>");
        for (col in product_json.d) {
            index++;
            $("<td/>").addClass('col-name').addClass('w11').html(_AsgUtil.Mapping.getColumnName(product_json.cat_id, parseInt(col))).appendTo(tr);
            $("<td/>").addClass('col-value').addClass('w22').text(product_json.d[col]).appendTo(tr);

            if(index == 3){
                tr.clone().appendTo(table);
                tr = $("<tr/>");
                index = 0;
            }
        }
        if(index != 0) tr.clone().appendTo(table);
    }

    // public function
    return {
        build : function (json_product) {
            var div_main_area = $('div.detail-info .content');
            _buildDetailInfo(json_product, div_main_area);

        }
    };
})();

$(document).ready(function(){
    _AsgProductDetailBuilder.DetailInfo.build(_json_product);
    _AsgUtil.HeaderNavbar.build();
});