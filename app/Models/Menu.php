<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Menu extends Model
{
    public function getMenu()
    {
        $menu = $this->get();
        $arrData = [];

        foreach ($menu as $item) {
                $arrData[] = $item['attributes'];
        }

        return $arrData;
    }

    public function scopePublished($query)
    {
        $query->where('title', '=', 'test1' )
            ->orWhere('id', '=', '35' );

    }

    /**
     * @return array
     */
    public function getMenus()
    {
        $arrMenu = [];
        $tree = [];
        $dataset = [];

        $parent = Menu::get();

        foreach ($parent as $key => $item) {
            $arrMenu[] = $item->attributes;
        }

        foreach ( $arrMenu as $item ) {
            $id = $item['m_id'];
            $dataset[$id] = $item;
        }

        foreach ($dataset as $id => &$node) {
            if ($node['parent_id'] == 0) {
                $tree[$id] = &$node;
            } else {
                if (!isset($dataset[$node['parent_id']]['children'])) $dataset[$node['parent_id']]['children'] = [];
                $dataset[$node['parent_id']]['children'][$id] = &$node;
                unset($dataset[$node['m_id']]);
            }
        }

        return $dataset;
    }

    public function getParentPages()
    {
        return $parent = Menu::where('parent_id','=', 0)
            ->where('enabled', '=', 1)
            ->get();
    }


}


