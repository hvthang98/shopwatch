<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable = [
        'name', 'status', 'sort', 'menu_parent', 'slug'
    ];

    public function children()
    {
        return Menu::where('menu_parent', $this->id)->get();
    }

    public function deleteChild()
    {
        if(count($this->children()) <= 0){
            return 0;
        }else{
            $children = $this->children();
            foreach($children as $child){
                $child->deleteChild();
                $child->delete();
            }
        }
    }
}
