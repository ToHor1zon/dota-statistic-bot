<?php

namespace App\Services\ApiStratz;

use Exception;
use App\Services\QraphQLService;

class ItemService
{
    public static function getItemData(int $itemId)
    {
        try {
            return QraphQLService::get('
                {
                    constants {
                        item(id: ' . $itemId . ') {
                            image
                        }
                    }
                }
            ')['constants']['item'];
        } catch (Exception $e) {
            throw $e;
        }
    }
}
