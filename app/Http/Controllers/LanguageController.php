<?php

namespace App\Http\Controllers;

use App\Http\Components\API\BaseApiTrait;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{

    use BaseApiTrait;

    //Set Locale language
    public function setLang($locale)
    {
        try {
            //update $locale for this user
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            $user->lang = $locale;
            $user->save();

            //put local into session locale 
            App::setLocale($locale);
            Session::put('locale', $locale);

            $result = [
                'id'    => $user->id,
                'lang'  => $user->lang
            ];

            return $this->handleResponse($this->apiDataUpdated('Language'), 200, $result);
        } catch (Exception $error) {
            return $this->handleError($error);
        }
    }
}
