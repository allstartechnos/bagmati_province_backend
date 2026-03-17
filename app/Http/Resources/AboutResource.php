<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutResource extends JsonResource
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
                ? Str::limit($this->description, 1500)
                : Str::limit(strip_tags($this->description), 110),

            // 'image'      => $this->image,
            'banner'     => $this->banner,

            // Full image URL
            'image'  => $this->image
                ? asset('images/about_us/' . $this->image)
                : null,

            'banner'  => $this->banner
                ? asset('images/about_us/' . $this->banner)
                : null,
        ];
    }
}
