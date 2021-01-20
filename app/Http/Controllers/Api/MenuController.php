<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    private function errorMessage($error, $code = null)
    {
        return response()->json([
            'status' => false,
            'code' => $code ?? 500,
            'message' => $error->getMessage(),
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        try {
            $limit = $req->limit ?? config('app.paginate.per_page');
            $data = Menu::query();
            if ($req->column && $req->sort) {
                $data = $data->orderBy($req->column, $req->sort);
            }
            $data = $data->paginate($limit);
            return response()->json([
                'status'=>true,
                'code' =>200,
                'data'=>$data->items(),
                'meta'=> [
                    'currentPage' => $data->currentPage(),
                    'perPage'     => $data->perPage(),
                    'total'       => $data->total(),
                ],
            ]);
        } catch (\Throwable $th) {
            return $this->errorMessage($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        try {
            $menu= Menu::create($req->all());
            return response()->json([
                'status' =>true,
                'code' =>201,
                'data' =>$menu,
            ]);
        } catch (\Throwable $th) {
            return $this->errorMessage($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $menu= Menu::find($id);
            return response()->json([
                'status' =>true,
                'code' =>200,
                'data' =>$menu,
            ]);
        } catch (\Throwable $th) {
            return $this->errorMessage($th,404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        try {
            Menu::where('id',$id)->update($req->all());
            $menu = Menu::find($id);
            return response()->json([
                'status' =>true,
                'code' =>200,
                'data' =>$menu,
            ]);
        } catch (\Throwable $th) {
            return $this->errorMessage($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Menu::destroy($id);
            return response()->json([
                'status' =>true,
                'code' =>200,
                'message' =>'Đã xóa thành công',
            ]);
        } catch (\Throwable $th) {
            return $this->errorMessage($th);
        }
    }
}
