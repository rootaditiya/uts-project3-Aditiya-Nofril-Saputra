<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    //default property
    public $status;
    public $message;
    public $resources;

    public function __construct($status, $message, $resources)
    {
        parent::__construct($resources);
        $this->status = $status;
        $this->message = $message;

    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'success' => $this->status,
            'message' => $this->message,
            'data' => $this->resources,
        ];
    }
}
