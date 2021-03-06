<?php


namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\ResourceCollection;

class BaseCollection extends ResourceCollection
{
    protected $code;

    protected $message;

    protected $totalPage;

    protected $page;

    protected $data;

    public function __construct($resource, $code, $message)
    {
        $this->code = $code;
        $this->message = $message;
        parent::__construct($resource);
    }

    public function setData()
    {
        $this->data = $this->collection;
        return $this;
    }



    public function toArray($request)
    {
        return [
            'statusCode' => $this->code,
            'message' => $this->message,
            'page' => [
                'totalCount' => $this->lastPage(),
                'page' => $this->currentPage()
            ],
            'data' => $this->data
        ];
    }


    public function withResponse($request, $response)
    {
        $jsonResponse = json_decode($response->getContent(), true);
        unset($jsonResponse['links'], $jsonResponse['meta']);
        $response->setContent(json_encode($jsonResponse));
    }

    public function getImagePath($category, $id, $fileNames, $multiple=false){
        $images = explode(',' , $fileNames);
        if($multiple){
            $files=json_decode($images, true);
            $images=[];
            foreach($files as $fileName){
                $images[]=asset('upload/uploaz/'.$category.'/image/'.$id.'/' . $fileName);
            }
            return $images;
        }else{
            $fileName=json_decode($images[0], true);
            return asset('upload/uploaz/'.$category.'/image/'.$id.'/' . $fileName);
        }
               
    }

}