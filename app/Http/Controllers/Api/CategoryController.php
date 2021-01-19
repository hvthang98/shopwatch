<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoryController extends Controller
{
    private function errorMessage($error, $code = null)
    {
        return response()->json([
            'status' => false,
            'code' => $code ?? 500,
            'message' => $error->getMessage(),
        ])->setStatusCode($code ?? 500);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $category = Categories::all();
            return response()->json([
                'status' => true,
                'code' => 200,
                'data' => $category,
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
            $category = Categories::create($request->all());
            return response()->json([
                'status' => true,
                'code' => 201,
                'data' => $category
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
            $category = Categories::find($id);
            return response()->json([
                'status' => true,
                'code' => 200,
                'data' => $category
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
            $category = Categories::where('id', $id)->update($request->all());
            return response()->json([
                'status' => true,
                'code' => 200,
                'data' => $category
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
            Categories::destroy($id);
            return response()->json([
                'status' => true,
                'code' => Response::HTTP_OK,
                'message' => 'Delete record id = ' . $id,
            ]);
        } catch (\Throwable $th) {
            return $this->errorMessage($th, 500);
        }
    }
}
