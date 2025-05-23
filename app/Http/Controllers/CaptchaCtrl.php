<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaCtrl extends Controller
{
    public function refresh()
    {
        return response()->json([
            'captcha' => captcha_img('flat'),
        ]);
    }
}
