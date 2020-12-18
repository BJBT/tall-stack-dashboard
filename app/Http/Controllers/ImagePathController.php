<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Survey;
use App\Models\SurveyCoupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ImagePathController extends Controller
{
    public function get_badge_image(Employee $employee)
    {
        $path = $employee->badge_image;
        if (!Storage::exists($path))
        {
            abort(404);
        }

        $file     = Storage::get($path);
        $type     = Storage::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }

    public function get_survey_image(Survey $survey)
    {
        $path = $survey->image_url;
        if (!Storage::exists($path))
        {
            abort(404);
        }

        $file     = Storage::get($path);
        $type     = Storage::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }

    public function get_coupon_image(SurveyCoupon $surveyCoupon)
    {
        $path = $surveyCoupon->image_url;
        if (!Storage::exists($path))
        {
            abort(404);
        }

        $file     = Storage::get($path);
        $type     = Storage::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }
}
