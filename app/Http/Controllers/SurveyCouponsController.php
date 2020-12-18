<?php

namespace App\Http\Controllers;

use App\Models\SurveyCoupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SurveyCouponsController extends Controller
{
    public function index()
    {
        $coupons = SurveyCoupon::all();

        return view('survey_coupon', compact('coupons'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required',
        ]);

        $values      = request()->except('_token');
        $file        = $values['image_url'] ?? null;
        $stored_file = null;
        if ($file)
        {
            $fileNameWithExt = $file->getClientOriginalName();
            $fileName        = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension       = $file->getClientOriginalExtension();
            $storedName      = $fileName . '.' . $extension;
            $stored_file     = Storage::putFileAs("uploaded_files/coupon_images", $file, $storedName);
        }

        SurveyCoupon::create([
            'name' => $request->name,
            'description' => $request->description,
            'code' => $request->code,
            'image_url' => $stored_file
        ]);

        return redirect()->back();
    }

    public function update()
    {
        $coupon_values = request('coupons');

        foreach ($coupon_values as $key => $coupon_value)
        {
            $coupon = SurveyCoupon::find($key);

            $file = $coupon_value['coupon_image'] ?? null;
            if ($file)
            {
                $fileNameWithExt = $file->getClientOriginalName();
                $fileName        = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension       = $file->getClientOriginalExtension();
                $storedName      = $fileName . '.' . $extension;
                $stored_file     = Storage::putFileAs("uploaded_files/coupon_images", $file, $storedName);
                $coupon->update([
                    'image_url' => $stored_file,
                ]);
            }

            $coupon->update([
                'name' =>  $coupon_value['name'],
                'description' => $coupon_value['description'],
                'code' => $coupon_value['code']
            ]);

            return redirect()->back();
        }
    }

    public function delete(SurveyCoupon $surveyCoupon)
    {
        $surveyCoupon->delete();

        return redirect(route('coupons.show'));
    }
}
