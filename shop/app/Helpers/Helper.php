<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class Helper
{
    public static function menu($menus, $parent_id=0, $char = ''){
        $html = '';

        foreach ($menus as $key => $menu){
            if ($menu->parent_id == $parent_id){
                $html .= '
                <tr>
                    <td>'. $menu->id .'</td>
                    <td>'. $char . $menu->name .'</td>
                    <td>'. self::active($menu->active) .'</td>
                    <td>'. $menu->updated_at .'</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/menus/edit/'. $menu->id . '">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href="" onclick="removeRow('. $menu->id . ',\'/admin/menus/destroy\')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                ';

                unset($menus[$key]);

                $html .= self::menu($menus, $menu->id, '<i class="fas fa-chevron-circle-right px-3"></i>');
            }
        }
        return $html;
    }

    public static function active($active = 0): string{
        return $active == 0 ? '<span class="btn btn-danger btn-xs">NO</span>' : '<span class="btn btn-success btn-xs">YES</span>';
    }

    public static function menus($menus, $parent_id = 0, $isMobile) :string
    {
        $html = '';
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                if(!$isMobile){
                    if($menu->parent_id == 0) $html .= '<li class="sub-mega-menu sub-mega-menu-one"><a class="menu-title" ';
                    if($menu->parent_id != 0) $html .= '<li><a ';
                } else {
                    $html .= '<li class="mobile-menu-item"><a ';
                }
                $html .= 'href="/danh-muc/' . $menu->id . '-' . Str::slug($menu->name, '-') . '.html">' . $menu->name . '</a>';

                unset($menus[$key]);
                
                if (self::isChild($menus, $menu->id)) {
                    $html .= '<ul class="dropdown"><li><a>';
                    $html .= self::menus($menus, $menu->id, $isMobile);
                    $html .= '</a></li></ul>';
                }

                $html .= '</li>';
            }
        }

        return $html;
    }

    // public static function menusMobile($menus, $parent_id = 0) :string
    // {
    //     $html = '';
    //     foreach ($menus as $key => $menu) {
    //         if ($menu->parent_id == $parent_id) {
    //             $html .= '<li class="mobile-menu-item"><a ';
    //             $html .= 'href="/danh-muc/' . $menu->id . '-' . Str::slug($menu->name, '-') . '.html">' . $menu->name . '</a>';

    //             unset($menus[$key]);
                
    //             if (self::isChild($menus, $menu->id)) {
    //                 $html .= '<ul class="dropdown"><li><a>';
    //                 $html .= self::menusMobile($menus, $menu->id);
    //                 $html .= '</a></li></ul>';
    //             }

    //             $html .= '</li>';
    //         }
    //     }

    //     return $html;
    // }

    // public static function menusMobile($menus, $parent_id = 0, $isMobile) :string
    // {
    //     return self::menus($menus, $parent_id, $isMobile);
    // }

    // public static function menusDesktop($menus, $parent_id = 0, $isMobile) :string
    // {
    //     return self::menus($menus, $parent_id, $isMobile);
    // }

    public static function isChild($menus, $id) : bool
    {
        foreach ($menus as $menu) {
            if ($menu->parent_id == $id) {
                return true;
            }
        }

        return false;
    }

    public static function price($price = 0, $priceSale = 0)
    {
        if ($priceSale != 0) return number_format($priceSale);
        if ($price != 0)  return number_format($price);
        return '<a href="/contact" 
        style="background-color: #f1466821; color: #cc0f35; border-radius: 5px;padding: 2px 10px;margin: 0 10px 10px 0;">
        Contact</a>';
    }
}