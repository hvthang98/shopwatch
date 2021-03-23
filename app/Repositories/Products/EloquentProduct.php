<?php

namespace App\Repositories\Products;

use App\Repositories\BaseRepository;
use App\Repositories\EloquentRepository;
use App\Repositories\Products\ProductRepository;
use App\Models\Product;
use App\Http\Requests\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EloquentProduct extends EloquentRepository implements BaseRepository, ProductRepository
{
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }
    public function getData($limit = null, $column = null, $sort = 'desc')
    {
        $products = $this->model;
        if (!empty($column)) {
            $products = $products->orderBy($column, $sort);
        }
        if (!empty($limit)) {
            $products = $products->paginate($limit);
        }
        return $products;
    }

    public function store($request)
    {
        $data = [
            'name' => $request->name,
            'slug' =>  Str::slug($request->name, '-'),
            'price' => clearNumber($request->price),
            'sellprice' => clearNumber($request->sellprice),
            'quantily' => clearNumber($request->quantily),
            'content' => $request->content,
            'status' => $request->status,
            'ordernum' => $request->ordernum,
            'categories_id' => $request->category,
            'brands_id' => $request->brands,
        ];
        if(isset($request->tags)){
            $data['tags'] = implode(',', $request->tags);
        }
        if(isset($request->infor)){
            $infor = $request->infor;
            foreach($infor as $key => $value){
                if($value['name']==null && $value['content']==null){
                    unset($infor[$key]);
                }
            }
            if(!empty($infor)){
                $data['infor']= json_encode($infor);
            }else{
                $data['infor']=null;
            }
        }else{
            $data['infor']=null;
        }
        $product = parent::store($data);
        if(isset($request->image)){
            $path = $request->file('image')->store('product/'.date('Y_m_d').'_' . ($product->id).'_product');
            $dataImg = [
                'image' => $path,
                'status' =>1,
                'level' =>1,
            ];
            $product->imageProduct()->create($dataImg);
        }
        return $product;
    }

    public function update($request,$id)
    {
        $product = $this->model->findOrFail($id);
        $data = [
            'name' => $request->name,
            'slug' =>  Str::slug($request->name, '-'),
            'price' => clearNumber($request->price),
            'sellprice' => clearNumber($request->sellprice),
            'quantily' => clearNumber($request->quantily),
            'content' => $request->content,
            'status' => $request->status,
            'ordernum' => $request->ordernum,
            'categories_id' => $request->category,
            'brands_id' => $request->brands,
        ];
        if(isset($request->tags)){
            $data['tags'] = implode(',', $request->tags);
        }
        if(isset($request->infor)){
            $infor = $request->infor;
            foreach($infor as $key => $value){
                if($value['name']==null && $value['content']==null){
                    unset($infor[$key]);
                }
            }
            if(!empty($infor)){
                $data['infor']= json_encode($infor);
            }else{
                $data['infor']=null;
            }
        }else{
            $data['infor']=null;
        }
        $product->update($data);
    }
}
