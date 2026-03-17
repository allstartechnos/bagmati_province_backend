<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DocumentResource extends JsonResource
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
            'id'         => $this->id,
            'title'      => $this->title,
            'sub_title'  => $this->sub_title,

            // HTML → plain text + limit chars
            'description' => $this->type === 'page'
                ? Str::limit($this->description, 1300)
                : Str::limit(strip_tags($this->description), 110),
 
            // Full image URL
            'image'  => $this->image
                ? asset('images/document/' . $this->image)
                : null,

            'banner'  => $this->banner
                ? asset('images/document/' . $this->banner)
                : null,
        ];
    }
}
