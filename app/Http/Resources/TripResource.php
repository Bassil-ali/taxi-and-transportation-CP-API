<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TripResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            "id"                => $this->id,
            "ad_id"             => $this->ad_id,
            "customer_id"       => $this->customer_id,
            "company_id"        => $this->company_id,
            "driver_id"         => $this->driver_id,
            "price"             => $this->price,
            "dues"              => $this->dues,
            "date"              => $this->date,
            "go_time"           => $this->go_time,
            "from_city_id"      => $this->from_city_id,
            "from_region_id"    => $this->from_region_id,
            "from_lat"          => $this->from_lat,
            "from_long"         => $this->from_long,
            "to_city_id"        => $this->to_city_id,
            "to_region_id"      => $this->to_region_id,
            "to_lat"            => $this->to_lat,
            "to_long"           => $this->to_long,
            "status"            => $this->status,
            "status_name"       => $this->status_name,
            "transport_type_name" => $this->ad->transport_type->name_ar ?? null,
           "from_city_name" => $this->ad->from_city->name_ar ?? null,
           "to_city_name" => $this->ad->to_city->name_ar ?? null,
           "from_region_name" => $this->ad->from_region->name_ar ?? null,
           "to_region_name" => $this->ad->to_region->name_ar ?? null,
            "category_name"     => $this->ad->category->name_ar  ?? null,
            "created_at"        => $this->created_at,
            "updated_at"        => $this->updated_at,
        ];
    }
}
