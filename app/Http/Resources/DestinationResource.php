<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DestinationResource extends JsonResource
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

            'description' => $this->type === 'page'
                ? Str::limit($this->description, 1300)
                : Str::limit(strip_tags($this->description), 90),

            'image' => $this->image ?  asset('images/destination/' . $this->image) : null,
            'banner' => $this->banner ?  asset('images/destination/' . $this->banner) : null,

        ];
    }
}
