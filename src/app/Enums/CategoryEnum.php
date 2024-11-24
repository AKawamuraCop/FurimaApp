<?php

namespace App\Enums;

enum CategoryEnum: int
{
    case Fashion = 1;
    case Electronic = 2;
    case Interior = 3;
    case Ladies = 4;
    case Mens = 5;
    case Cosmetics = 6;
    case Books = 7;
    case Games = 8;
    case Sports = 9;
    case Kitchen = 10;
    case Handmade = 11;
    case Accessories =12;
    case Toys = 13;
    case Babies = 14;

    public function label(): string
    {
        return match ($this) {
            self::Fashion => 'ファッション',
            self::Electronic => '家電',
            self::Interior => 'インテリア',
            self::Ladies => 'レディース',
            self::Mens => 'メンズ',
            self::Cosmetics => 'コスメ',
            self::Books => '本',
            self::Games => 'ゲーム',
            self::Sports => 'スポーツ',
            self::Kitchen =>'キッチン',
            self::Handmade => 'ハンドメイド',
            self::Accessories => 'アクセサリー',
            self::Toys => 'おもちゃ',
            self::Babies =>'ベビー・キッズ'
        };
    }
}