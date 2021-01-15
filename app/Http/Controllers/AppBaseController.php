<?php

namespace App\Http\Controllers;

use InfyOm\Generator\Utils\ResponseUtil;
use Response;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }

    public function sendSuccess($message)
    {
        return Response::json([
            'success' => true,
            'message' => $message
        ], 200);
    }

    public function search($query, $table_id)
    {

        // return Response::json([
        //     'success' => true,
        //     'message' => $query
        // ], 200);
    }

    public function getImagePath($category, $id, $fileNames, $multiple=false){
        if(strlen($fileNames)<3){
            return null;
        }
        $fileNames=str_replace('"', '', $fileNames);
        $fileNames=str_replace('[', '', $fileNames);
        $fileNames=str_replace(']', '', $fileNames);
        $fileNames=str_replace(' ', '', $fileNames);
        
        $images = explode(',' , $fileNames);        
        if($multiple){        
            $all_images=[];
            if(is_array($images)){
                for($i=0; $i<count($images); $i++){                 
                    $all_images[]=asset('upload/uploaz/'.$category.'/image/'.$id.'/' . $images[$i]);
                }
            }            
            return json_encode($all_images);
        }else{
            // $fileName=json_decode($images[0], true);
            return asset('upload/uploaz/'.$category.'/image/'.$id.'/' . $images[0]);
        }
               
    }

    public function filter_items($request, $items){ 
        // if($request->has('search')){
        //     $items=$items->where('name', 'like', '%'.$request['search'].'%');
        // }  
        if($request->has('skip')){
            $items=$items->skip($request['skip']);
        }
        if($request->has('limit')){
            $items=$items->limit($request['limit']);
        }
        if($request->has('paginate')){
            $items=$items->paginate($request['paginate']);
        }else{
            $items=$items->get();
        }

        // foreach($items as $item){
        //     if($item['image']){
        //         $item['image']=$this->getImagePath('ShopCategory', $item['id'], $item['image']);
        //     }
        // }
        return $items;
    }
}
