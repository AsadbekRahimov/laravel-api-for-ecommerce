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


}