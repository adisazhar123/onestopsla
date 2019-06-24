<?php


namespace OneStopSla\Core\Domain\Helpers;


class LendsStatusHelper
{
    const STATUS =
        [
            'Pending' => 'Menunggu verifikasi admin',
            'Accepted' => 'Diterima',
            'Declined' => 'Ditolak'
        ];
    public static function toIndonesian($category)
    {
        return self::CATEGORIES[$category];
    }
}
