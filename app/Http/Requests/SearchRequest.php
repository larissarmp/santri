<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

/**
 * Class SearchRequest
 * @package App\Http\Requests
 */

class SearchRequest extends FormRequest
{
     /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
    
    /**
     * @return array|\Illuminate\Database\Eloquent\Builder|string
     */
    public function dbQuery()
    {

        $query = User::get();

        if (isset($this->q) && !empty($this->q)) {
            $query->where(function ( $query ) {
                $query->where("name", 'LIKE', "%{$this->q}%");
            });
        }
        return $query;
    }
    public function all($keys = null)
    {
        $attributes = $this->parseFilters(parent::all($keys), $keys);
        return $attributes;
    }

    protected function parseFilters($all, $keys)
    {
        Carbon::serializeUsing(function (Carbon $date) {
            return $date->toDateTimeString();
        });

     
        $all['q'] = $all['q'] ?? null;

        if (is_array($keys)) {
            return Arr::only($all, $keys);
        }
        return $all;
    }

}

