<?php

namespace Tests\Feature;

use App\Models\SurveyCoupon;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CouponsTest extends TestCase
{

    public function setUp() :void
    {
        parent::setUp();

        User::where('id', '>', 0)->delete();
        $user = User::factory()->create();
        auth()->login($user);
    }

    /** @test */
    public function a_user_can_create_a_new_coupon()
    {
        SurveyCoupon::where('id', '>', 0)->delete();

        $this->visitRoute('coupons.show');
        $this->type('New Coupon', 'name');
        $this->type('The newest', 'description');
        $this->type('1111', 'code');
        $this->press('Add');
        $this->seePageIs(route('coupons.show'));

        $coupon = SurveyCoupon::first();
        $this->assertEquals('New Coupon', $coupon->name);
        $this->assertEquals('The newest', $coupon->description);
        $this->assertEquals('1111', $coupon->code);
    }

    /** @test */
    public function a_user_can_update_a_coupon()
    {
        SurveyCoupon::where('id', '>', 0)->delete();

        $coupon = SurveyCoupon::factory()->create([
           'name' => 'New Coupon',
           'description' => 'The newest',
           'code' => 1111
        ]);

        $this->visitRoute('coupons.show');
        $this->seeInField("coupons[{$coupon->id}][name]", 'New Coupon');
        $this->type('New Coupon!', "coupons[{$coupon->id}][name]");
        $this->seeInField("coupons[{$coupon->id}][description]", 'The newest');
        $this->type('The newest!', "coupons[{$coupon->id}][description]");
        $this->seeInField("coupons[{$coupon->id}][code]", '1111');
        $this->type('0000', "coupons[{$coupon->id}][code]");
        $this->press('Update');
        $this->seePageIs(route('coupons.show'));

        $new_coupon = SurveyCoupon::first();
        $this->assertEquals('New Coupon!', $new_coupon->name);
        $this->assertEquals('The newest!', $new_coupon->description);
        $this->assertEquals('0000', $new_coupon->code);
    }
}
