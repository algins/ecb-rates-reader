<?php

namespace App\Http\Resources;

use App\Models\EcbRate;
use Illuminate\Http\Resources\Json\JsonResource;

class EcbRateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'currency' => $this->currency,
            'rate' => $this->rate,
            'date' => $this->date,
            'history' => EcbRate::historical()->where('currency', $this->currency)->get(),
        ];
    }
}
