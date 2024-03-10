<?php

namespace App\Services\ApiStratz;

use Exception;
use App\Services\QraphQLService;

class ItemService
{
    public static function getItemData(array $itemIds)
    {
        $query = '{
            constants {
        ';

        foreach($itemIds as $newKey => $itemId) {
            $query .= '
                ' . $newKey . ': item(id: ' . (int) $itemId . ') {
                    shortName
                }';

        }

        $query .= '
            }
        }';
        
        try {
            $res =  QraphQLService::get($query)['constants'];

            $itemImages = [];

            foreach($res as $key => $value) {
                if(!$value) {
                    $itemImages[$key] = null;
                } else {
                    $itemImages[$key] = $value['shortName'] ? 'https://cdn.stratz.com/images/dota2/items/' . $value['shortName'] . '.png' : null;
                }
            }
            
            return $itemImages;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
