<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Spatie\ImageOptimizer\OptimizerChain;
use Spatie\ImageOptimizer\Optimizers\Jpegoptim;

class ImageSizeReducement extends Controller
{
    private OptimizerChain $optimizer;

    public function __construct(OptimizerChain $optimizer)
    {
        $this->optimizer = $optimizer;
    }

    public function index(Request $request)
    {
        return view("image_size_reducement.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "image" => "required|file|mimes:png,jpg,jpeg,svg"
        ]);

        $this->optimizer
            ->addOptimizer(new Jpegoptim([
                '--strip-all',
                '--size=200k',
            ]))
            ->optimize(
                $request->file("image")->path()
            );

        return response()->file($request->file("image") );
    }
}
