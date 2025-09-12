<?php 
namespace App\Enums;


enum SlideEnum: string {
    
    const BANNER = 'banner';
    const MAIN = 'main-slide';
    const COMMIT = 'commit';
    const BRAND = 'outstanding-brand';
    const BENEFIT = 'purchase-benefit';

    public static function toArray(){
        return [
            self::BANNER => 'banner',
            self::MAIN => 'main-slide',
            self::COMMIT => 'commit',
            self::BRAND => 'outstanding-brand',
            self::BENEFIT => 'purchase-benefit'
        ];
    }

}