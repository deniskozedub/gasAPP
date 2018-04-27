<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\MapAddRequest;
use App\Http\Resources\MapCollection;
use App\Http\Resources\MapResource;
use App\Models\Map;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MapController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except('index','show');
    }

    public function index()
    {
        return MapCollection::collection(Map::all());
    }

    public function show(Map $map)
    {
        return new MapResource($map);
    }

    public function destroy(Map $map)
    {
        $map->delete();
        return response('DELETE',204);
    }

    public function store(MapAddRequest $request,Map $map)
    {
        $map::create($request->all());
        return response("CREATE",201);
    }

    public function update(Request $request,Map $map)
    {
        $map->update($request->all());
        return response("UPDATE",200);
    }

}
