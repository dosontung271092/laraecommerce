<?php
class Price{
    static function getSalePercent( $originPrice, $salePrice ){
        return 100 - round( (100 / $originPrice) * $salePrice ) ;
    }


}