<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Game;

class BetRequest extends FormRequest
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
    public function rules(Game $game)
    {   
        return [
            'home_result' => 'required|integer|numeric',
            'away_result' => 'required|integer|numeric',
            'sign' => 'required'
        ];
          
    }
    public function messages()
    {
        return [
            "home_result.required"=> "Il campo è richiesto.",
            "home_result.integer" =>"Il campo deve essere numerico",
            "home_result.numeric"=> "Il campo deve essere numerico.",
            "away_result.required"=> "Il campo è richiesto.",
            "away_result.integer" =>"Il campo deve essere numerico",
            "away_result.numeric" =>"Il campo deve essere numerico",
            "sign.required" => "Il campo è richiesto"
        ];
    }
}
