<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DemandCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        $isChild = !is_null($this->parent_id);
        return [

            'id'         => $this->id,
            'title'      => $this->title,
            'sub_title'  => $this->sub_title,

            'description' => $this->type === 'page'
                ? Str::limit($this->description, 1300)
                : Str::limit($this->description, 555),


            'image' => $this->image
                ? asset(
                    $isChild
                        ? 'images/jobspage/' . $this->image
                        : 'images/demand/' . $this->image
                )
                : null,

            'banner'  => $this->banner
                ? asset('images/demand/' . $this->banner)
                : null,

            'pages' => DemandCategoryResource::collection($this->whenLoaded('pages')),


        ];
    }
}
