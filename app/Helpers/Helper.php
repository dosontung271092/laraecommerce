<?php
class Number{
    static function getSalePricePercent( $originPrice, $salePrice ){
        return 100 - round( (100 / $originPrice) * $salePrice ) ;
    }


}