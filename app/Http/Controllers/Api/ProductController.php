<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function errorMessage($error, $code)
    {
        return response()->json([
            'status' => false,
            'code' => $code,
            'message' => $error->getMessage(),
        ])->setStatusCode($code);
    }

    public function index(Request $req)
    {
        try {
            $limit = $req->limit ?? config('app.paginate.per_page');
            $products = Products::query();
            if ($req->column && $req->sort) {
                $products = $products->orderBy($req->column, $req->sort);
            };
            $products = $products->paginate($limit);
            return response()->json([
                'status' => true,
                'code'   => Response::HTTP_OK,
                'data'   => $products->items(),
                'meta'   => [
                    'currentPage' => $products->currentPage(),
                    'perPage'     => $products->perPage(),
                    'total'       => $products->total(),
                ],
            ]);
        } catch (\Throwable $th) {
            return $this->errorMessage($th, 500);
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
            $product = Products::create($req->all());
            return response()->json([
                'status' => true,
                'code' => 201,
                'data' => $product,
            ])->setStatusCode(201);
        } catch (\Throwable $th) {
            return $this->errorMessage($th, 500);
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
            $product = Products::find($id);
            if (!$product) {
                return abort(404, 'Not found record');
            }
            return response()->json([
                'status' => true,
                'code' => Response::HTTP_OK,
                'data' => $product,
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
            $product = Products::where('id', $id)->update($request->all());
            $product = Products::find($id);
            return response()->json([
                'status' => true,
                'code' => Response::HTTP_OK,
                'data' => $product, 
            ]);
        } catch (\Throwable $th) {
            return $this->errorMessage($th, 500);
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
            Products::destroy($id);
            return response()->json([
                'status' => true,
                'code' => Response::HTTP_OK,
                'message'=>'Delete record id = '.$id, 
            ]);
        } catch (\Throwable $th) {
            return $this->errorMessage($th, 500);
        }
    }
}
