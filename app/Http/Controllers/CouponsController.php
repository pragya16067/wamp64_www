<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use App\User;
use App\Hostel;
use DB;

class CouponsController extends Controller
{
    //
	public function index()
	{
		$user = \Auth::user();
		if ($user->email == 'admin@ied.com')
		{
			//$coupons = Coupon::all();
			$coupons = DB::select("select * from coupons where rollno <> 1;");
			return view('coupons.index', compact('coupons'));
		}
		elseif ($user->email == 'adminhostel@ied.com')
		{
			$hostels = Hostel::all();
			return view('hostels.index', compact('hostels'));
		}
		else
		{
			$id = $user->id;
			$coupon = Coupon::find($id);
			$rollno = $coupon->rollno;
			$hostel = DB::select("select * from hostels where rollno = '$rollno';");
			
			if($hostel== NULL)
			{
				$last= -99;
			}
			else
			{
				end($hostel);
				$last = key($hostel);
			}
			return view('coupons.show', compact('coupon', 'hostel', 'last'));
		}
	}
	
	public function showCoupon(Request $request)
	{
		
		$coupon = Coupon::find($request->id);
		return view('coupons.showCoupon', compact('coupon'));
	}
	
	public function save(Request $request)
	{
		$time = strtotime($request->sdate);
		$final = date("Y-m-d", strtotime("+1 month", $time));
		Coupon::where('id','=',$request->id)->update([ 'startbalance' => $request->amount, 'start_date' => $request->sdate, 'end_date' => $final]);
		
		if($request->amount == 1700)
		{
			$breakfast=20;
			$lunch=20;
			$tea=20;
			$dinner=20;
		}
		elseif($request->amount == 2000)
		{
			$breakfast=25;
			$lunch=25;
			$tea=25;
			$dinner=25;
		}
		elseif($request->amount == 2200)
		{
			$breakfast=30;
			$lunch=30;
			$tea=30;
			$dinner=30;
		}
		Coupon::where('id','=',$request->id)->update([ 'breakfast' => $breakfast, 'lunch' => $lunch, 'snacks' => $tea, 'dinner' => $dinner]);	
	
		return $this->index();
	}
	
	
	public function setCardStatus(Request $request)
	{ 
		if($request->blocked == 0)
		{
			$request->blocked = 1;
		}
		else
		{
			$request->blocked = 0;
		}
		Coupon::where('id','=',$request->id)->update([ 'blocked' => $request->blocked]);
		return $this->index();
	}
	
	public function show($coupon)
	{
		$coupon = Coupon::find($coupon);
		$rollno = $coupon->rollno;
		$hostel = DB::select("select * from hostels where rollno = '$rollno';");
		if($hostel== NULL)
		{
			$last= -99;
		}
		else
		{
			end($hostel);
			$last = key($hostel);
		}
		
		return view('coupons.show', compact('coupon','hostel','last'));
	}
	
	public function destroy(Request $request)
	{
		$coupon = Coupon::find($request->id);
		Coupon::findOrFail($coupon->id)->delete();
		User::findOrFail($coupon->id)->delete();
		return $this->index();
	}
}
