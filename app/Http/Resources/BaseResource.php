<?php


namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
{
    protected $code;

    protected $message;

    protected $data;

    public function __construct($resource, $code, $message)
    {
        $this->code = $code;
        $this->message = $message;
        $this->data = $resource;
        parent::__construct($resource);
    }


    public function toArray($request)
    {
        return [
            'statusCode' => $this->code,
            'message' => $this->message,
            'data' => $this->data
        ];
    }

    public function getImagePath($category, $id, $fileNames, $multiple=false){
        $images = explode(',' , $fileNames);
        if($multiple){
            $files=str_replace("\"", '', $images);
            $images=[];
            foreach($files as $fileName){
                $images[]=asset('upload/uploaz/'.$category.'/image/'.$id.'/' . $fileName);
            }
            return $images;
        }else{
            $fileName=str_replace("\"", '', $images[0]);
            return asset('upload/uploaz/'.$category.'/image/'.$id.'/' . $fileName);
        }
               
    }

    // public function 


}