<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;

class SwaggerUiController extends Controller
{
    public function redirectToDocs()
    {
        return redirect('/swagger-ui/index.html', 302);
    }

    public function serveFile($file = '')
    {
        $path = public_path('swagger-ui/' . $file);

        if (File::exists($path)) {
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $mimeTypes = [
                'css' => 'text/css',
                'js' => 'application/javascript',
                'png' => 'image/png',
                'html' => 'text/html',
            ];
            $mime = $mimeTypes[$extension] ?? 'text/plain';
            return Response::make(File::get($path), 200, ['Content-Type' => $mime]);
        }

        abort(404);
    }
}
