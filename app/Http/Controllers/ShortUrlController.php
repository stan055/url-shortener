<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortRequest;
use App\Models\ShortUrl;

class ShortUrlController extends Controller
{

    public function shorten(ShortRequest $request)
    {

        if($request->original_url) {

            $new_url = ShortUrl::create([ 'original_url' => $request->original_url ]);

            if($new_url) {
                $msg = 'Your short url:  <a style="color:blue;" href="'. url($new_url->id) .'">' . url($new_url->id) . '</a>';

                return back()->with('success', $msg);    
            }
        }

        return back();
    }


    public function redirect301($code) 
    {
        $short_url = ShortUrl::where('id', $code)->first();

        if($short_url) {
            return redirect()->to(url($short_url->original_url));
        }

        return redirect()->to(url('/'));
    }

}
