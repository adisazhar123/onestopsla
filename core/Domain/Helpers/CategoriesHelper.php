<?php


namespace OneStopSla\Core\Domain\Helpers;

/**
 * Class CategoriesHelper
 *
 * This helper will translate English defined categories to the Indonesian language
 * @package OneStopSla\Core\Helpers\Domain
 */
class CategoriesHelper
{
    const CATEGORIES =
        [
            'Vehicle' => 'Kendaraan',
            'Housing' => 'Rumah',
            'Other' => 'Lain-lain'
        ];
    public static function toIndonesian($category)
    {
        return self::CATEGORIES[$category];
    }
}
