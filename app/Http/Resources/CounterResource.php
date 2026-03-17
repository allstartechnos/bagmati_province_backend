<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CounterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'sub_title' => $this->sub_title,
            'slug' => $this->slug,
            'url' => $this->url,
            'description' => $this->description,
            'image' => $this->image ?  asset('images/client/' . $this->image) : null,
            'banner' => $this->banner ?  asset('images/client/' . $this->banner) : null,

        ];
    }
}
