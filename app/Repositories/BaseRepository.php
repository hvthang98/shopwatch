<?php

namespace App\Repositories;

use App\Http\Requests\Request;

interface BaseRepository
{
    public function all();
    public function show($id);
    public function store(Request $request);
    public function update(Request $request, $id);
    public function destroy($id);
}
