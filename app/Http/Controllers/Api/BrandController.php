<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brands;
use App\Models\BrandCategories;

class BrandController extends Controller
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
    public function index()
    {
        try {
            $brand = Brands::all();
            return response()->json([
                'status' => true,
                'code' => 200,
                'data' => $brand,
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
    public function store(Request $request)
    {
        try {
            $isBrand = Brands::where('name', $request->name)->get();
            if (count($isBrand) > 0) {
                return abort(500, 'name record already exist');
            }
            $brand = Brands::create($request->all());
            return response()->json([
                'status' => true,
                'code' => 201,
                'data' => $brand,
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
            $brand = Brands::find($id);
            return response()->json([
                'status' => true,
                'code' => 200,
                'data' => $brand,
            ]);
        } catch (\Throwable $th) {
            return $this->errorMessage($th, 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            Brands::where('id', $id)->update($request->all());
            $brand = Brands::find($id);
            return response()->json([
                'status' => true,
                'code' => 200,
                'data' => $brand,
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
            Brands::find($id)->delete();
            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'Đã xóa thành công',
            ]);
        } catch (\Throwable $th) {
            return $this->errorMessage($th);
        }
    }

    public function storeForeignCategory(Request $req)
    {
        try {
            $data=BrandCategories::create($req->all());
            return response()->json([
                'status'=>true,
                'code'=>201,
                'data'=>$data,
            ]);
            
        } catch (\Throwable $th) {
            return $this->errorMessage($th);
        }
    }
}
