<?php


namespace App\Http\Controllers\API\V1;


use App\Http\Controllers\Controller;
use App\Traits\ApiTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

abstract class ApiController extends Controller
{
    use ApiTrait;

    abstract protected function params($request);

    abstract protected function getRules($request);

    public function index(Request $request)
    {
        // $user = Auth::guard('api')->user();
        $per_page = $request->get('per_page', 20);
        $model = $this->model->paginate($per_page);
        return new $this->resourceCollection($model);
    }

    public function store(Request $request)
    {
        $params = $this->params($request);
        return new $this->resource($this->model->create($params),201,'Created successfully');
    }

    public function show($id)
    {
        $model = $this->model->find($id);
        try {
            $this->throwWhenModelEmpty($model);
            return new $this->resource($model);
        } catch (Exception $e) {
            return $this->apiResponse($e->getMessage(), 404);
        }
    }

    public function update(Request $request, $id)
    {

        $model = $this->model->find($id);
        try {
            $this->throwWhenModelEmpty($model);
            $model->update($this->params($request));
            return new $this->resource($model);
        } catch (Exception $e) {
            return $this->apiResponse($e->getMessage(), 404);
        }

    }

    public function destroy($id)
    {
        $model = $this->model->find($id);
        try {
            $this->throwWhenModelEmpty($model);
            $model->delete();
            return $this->apiResponse('DELETE_SUCCESS');
        } catch (Exception $e) {
            return $this->apiResponse($e->getMessage(), 404);
        }
    }

    // public function attachRelation(){

    // }


}