<?php
namespace WebPlatform\AseagleBundle\Services;

class MappingHelper {

    private function get_value_mapping($product, $field){
        if($field == 'product_detail_1'){
            return $product->getProductDetail1();
        }else if($field == 'product_detail_2'){
            return $product->getProductDetail2();
        }else if($field == 'product_detail_3'){
            return $product->getProductDetail3();
        }else if($field == 'product_detail_4'){
            return $product->getProductDetail4();
        }else if($field == 'product_detail_5'){
            return $product->getProductDetail5();
        }else if($field == 'product_detail_6'){
            return $product->getProductDetail6();
        }else if($field == 'product_detail_7'){
            return $product->getProductDetail7();
        }else if($field == 'product_detail_8'){
            return $product->getProductDetail8();
        }else if($field == 'product_detail_9'){
            return $product->getProductDetail9();
        }else if($field == 'product_detail_10'){
            return $product->getProductDetail10();
        }else if($field == 'product_detail_11'){
            return $product->getProductDetail11();
        }else if($field == 'product_detail_12'){
            return $product->getProductDetail12();
        }else if($field == 'product_detail_13'){
            return $product->getProductDetail13();
        }else if($field == 'product_detail_14'){
            return $product->getProductDetail14();
        }else if($field == 'product_detail_15'){
            return $product->getProductDetail15();
        }else if($field == 'product_detail_16'){
            return $product->getProductDetail16();
        }else if($field == 'product_detail_17'){
            return $product->getProductDetail17();
        }else if($field == 'product_detail_18'){
            return $product->getProductDetail18();
        }else if($field == 'product_detail_19'){
            return $product->getProductDetail19();
        }else if($field == 'product_detail_20'){
            return $product->getProductDetail20();
        }else if($field == 'product_detail_21'){
            return $product->getProductDetail21();
        }else if($field == 'product_detail_22'){
            return $product->getProductDetail22();
        }else if($field == 'product_detail_23'){
            return $product->getProductDetail23();
        }else if($field == 'product_detail_24'){
            return $product->getProductDetail24();
        }else if($field == 'product_detail_25'){
            return $product->getProductDetail25();
        }else if($field == 'product_detail_26'){
            return $product->getProductDetail26();
        }else if($field == 'product_detail_27'){
            return $product->getProductDetail27();
        }else if($field == 'product_detail_28'){
            return $product->getProductDetail28();
        }else if($field == 'product_detail_29'){
            return $product->getProductDetail29();
        }else if($field == 'product_detail_30'){
            return $product->getProductDetail30();
        }else if($field == 'product_detail_31'){
            return $product->getProductDetail31();
        }else if($field == 'product_detail_32'){
            return $product->getProductDetail32();
        }else if($field == 'product_detail_33'){
            return $product->getProductDetail33();
        }else if($field == 'product_detail_34'){
            return $product->getProductDetail34();
        }else if($field == 'product_detail_35'){
            return $product->getProductDetail35();
        }else if($field == 'product_detail_36'){
            return $product->getProductDetail36();
        }else if($field == 'product_detail_37'){
            return $product->getProductDetail37();
        }else if($field == 'product_detail_38'){
            return $product->getProductDetail38();
        }else if($field == 'product_detail_39'){
            return $product->getProductDetail39();
        }else if($field == 'product_detail_40'){
            return $product->getProductDetail40();
        }else if($field == 'product_detail_41'){
            return $product->getProductDetail41();
        }else{return " ";}
    }

    public function mapping_products_in_category($products) {
        $pattern_map_rice = '{"product_detail_1":"cultivation_type",
                            "product_detail_2":"variety",
                            "product_detail_3":"moisture",
                            "product_detail_4":"certification",
                            "product_detail_5":"texture",
                            "product_detail_6":"style",
                            "product_detail_7":"admixture",
                            "product_detail_8":"brand_name",
                            "product_detail_9":"crop_year"
                            }';
        $mapping_json = json_decode($pattern_map_rice);

        $arr_pro = array();
        foreach($mapping_json as $key => $val)
        {
            $arr_pro[$val] = (string)self::get_value_mapping($products,$key);
        }
        return $arr_pro;
    }



}