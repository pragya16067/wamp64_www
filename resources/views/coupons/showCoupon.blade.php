@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
				<div class="panel-heading">Issue Coupon</div>
				<div class="panel-body">
					<form action="/coupons/{{$coupon->id}}" method="POST">
					<input type="hidden" name="id" value="{{ $coupon->id }}">
					  <div class="form-group">
						<label for="Amount" >Amount Paid:</label>
						<select class="form-control" name="amount">
							<option>1700</option>
							<option>2000</option>
							<option>2200</option>
						</select>
					  </div>
					  <div class="form-group">
						<label for="StartDate">Date:</label>
						<input type="date" class="form-control" name="sdate">
					  </div>
					 {{ csrf_field() }}
					  <button type="submit" class="btn btn-default">Save</button>
					</form>
				</div>
            </div>
        </div>
    </div>
</div>
					
@endsection

