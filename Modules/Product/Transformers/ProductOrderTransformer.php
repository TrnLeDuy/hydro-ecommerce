<?php

namespace Modules\Product\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductOrderTransformer extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $avatar = $this->resource->getAvatar();
        $path = "";
        if ($avatar != ''){
            $path = $avatar->path->getUrl();
        }
        return [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            'avatar' =>   $path
        ];
    }
}
