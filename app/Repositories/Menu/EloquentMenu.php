<?php

namespace App\Repositories\Menu;

use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;
use App\Repositories\Menu\MenuRepository;
use App\Models\Menu;
use App\Http\Requests\Request;

class EloquentMenu extends EloquentRepository implements BaseRepository, MenuRepository
{
    protected $model;

    public function __construct(Menu $menu)
    {
        $this->model = $menu;
    }

    public function get($limit = 15, $column = null, $sort = 'desc')
    {
        $menu = $this->model->query();
        if (!empty($column)) {
            $menu = $menu->orderBy($column, $sort);
        }
        $menu = $menu->paginate($limit);
        return $menu;
    }

    public function store($data)
    {
        $ordernum = $data['ordernum'];
        $list = $this->model->where('ordernum', '>', $ordernum)->get();
        foreach ($list as $item) {
            $num = $item->ordernum;
            $num++;
            $item->ordernum = $num;
            $item->save();
        }
        $data['ordernum'] = $ordernum + 1;
        return  $this->model->create($data);
    }

    public function update($data, $id)
    {
        $model = parent::show($id);
        $ordernum = $data['ordernum'];
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
        return parent::update($data, $id);
    }
}
