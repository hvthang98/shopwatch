<?php

namespace App\Repositories\Menu;

use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;
use App\Repositories\Menu\MenuRepository;
use App\Models\Menu;

class EloquentMenu extends EloquentRepository implements BaseRepository, MenuRepository
{
    protected $model;

    public function __construct(Menu $menu)
    {
        $this->model = $menu;
    }

    public function get($limit = 15)
    {
        $menus = $this->model->whereNull('menu_parent')->orderBy('sort', 'asc')->get();
        return $menus;
    }

    public function store($data)
    {
        $insert = [
            'name'          => $data['name'],
            'slug'          => $data['slug'],
            'status'        => $data['status'],
            'sort'          => $data['sort'],
            'menu_parent'   => $data['menu_parent'],
        ];
        return  $this->model->create($insert);
    }

    public function update($data, $id)
    {
        $dataUpdate = [
            'name'          => $data['name'],
            'slug'          => $data['slug'],
            'status'        => $data['status'],
            'sort'          => $data['sort'],
            'menu_parent'   => $data['menu_parent'],
        ];

        $this->model->where('id', $id)->update($dataUpdate);
        
        return parent::update($data, $id);
    }

    public function delete($id)
    {
        $menu = $this->model->find($id);
        $menu->deleteChild();
        $menu->delete();
    }

    private function sort($ordernum, $model){
        if ($ordernum != $model->ordernum) {
            $list = Menu::where('ordernum', '>', $ordernum)->get();
            foreach ($list as $item) {
                $num = $item->ordernum;
                $num++;
                $item->ordernum = $num;
                $item->save();
            }
            $data['ordernum'] = $ordernum + 1;
        }
    }

}
