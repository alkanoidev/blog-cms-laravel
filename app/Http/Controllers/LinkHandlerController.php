<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinkHandlerController extends Controller
{
    public function __invoke(Request $request)
    {
        if (filter_var($request->url, FILTER_VALIDATE_URL) !== false) {
            $metaTags = get_meta_tags($request->url);

            if (isset($metaTags['og:image'])) {
                $imageUrl = $metaTags['og:image'];
            }
            if (isset($metaTags['twitter:image'])) {
                $imageUrl = $metaTags['twitter:image'];
            }

            return [
                "success" => 1,
                "meta" => [
                    "title" => $metaTags["title"],
                    "description" => $metaTags["description"],
                    "image" => [
                        "url" => $imageUrl
                    ]
                ]
            ];
        }
    }
}
