<?php

namespace App\Repositories\ImgProducts;

use App\Repositories\{BaseRepository, EloquentRepository};
use App\Repositories\ImgProducts\ImgProductRepository;
use App\Models\ImgProduct;
use Illuminate\Support\Facades\Storage;

class EloquentImgProduct extends EloquentRepository implements BaseRepository, ImgProductRepository
{
    protected $model;

    public function __construct(ImgProduct $img)
    {
        $this->model = $img;
    }

    public function getData($id, $limit = 10, $column = null, $sort = 'desc')
    {
        $imgProduct = $this->model->where('products_id', $id);
        if ($column !== null) {
            $imgProduct = $imgProduct->orderBy($column, $sort);
        }
        $imgProduct = $imgProduct->paginate($limit);
        return $imgProduct;
    }

    public function store($request)
    {
        $data = [
            'image' => $request->file('image')->store('product' . ($request->id)),
            'level' => 0,
            'products_id' => $request->id,
        ];
        return ImgProduct::create($data);
    }

    public function destroy($id)
    {
        $img = $this->model->findOrFail($id);
        Storage::delete($img->image);
        return $img->delete();
    }

    public function changeAvatar($request)
    {
        $table = $this->model->where('products_id', $request->products_id)->update([
            'level' => 0,
        ]);
        $data = [
            'level' => 1,
            'status' => 1,
        ];
        return parent::update($data, $request->image_id);
    }
}
