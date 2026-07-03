<?php

namespace App\Http\Controllers;

use App\Models\RedirectedUrl;
use App\Models\RedirectStatistics;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RedirectedUrlController extends Controller
{
    public function redirect(string $hash, Request $request): RedirectResponse
    {
        $redirectedUrl = RedirectedUrl::byHash($hash)->first();

        if (empty($redirectedUrl)) {
            throw new NotFoundHttpException('Url not found.');
        }

        RedirectStatistics::createCompleted($redirectedUrl, $request);

        return redirect($redirectedUrl->orig_url);
    }
}
