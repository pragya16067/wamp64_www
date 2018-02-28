@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
				<div class="panel-heading">Coupons</div>
				<div class="panel-body">
					<div class="table-responsive">     
						<table class="table table-hover">
							<thead>
							  <tr>
								<th>Id</th>
								<th>Name</th>
								<th>RFID</th>
								<th>Roll No</th>
								<th>Start Balance</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Breakfast</th>
								<th>Lunch</th>
								<th>Snacks</th>
								<th>Dinner</th>
								<th>Blocked Status</th>
								<th>Actions</th>
							  </tr>
							</thead>
							<tbody>
								<tr>
									<td> {{$coupon->id}} </td>
									<td> {{$coupon->name}} </td>
									<td> {{$coupon->rfid}} </td>
									<td> {{$coupon->rollno}} </td>
									<td> {{$coupon->startbalance}} </td>
									<td> {{$coupon->start_date}} </td>
									<td> {{$coupon->end_date}} </td>
									<td> {{$coupon->breakfast}} </td>
									<td> {{$coupon->lunch}} </td>
									<td> {{$coupon->snacks}} </td>
									<td> {{$coupon->dinner}}</td>
									<td> {{$coupon->blocked}}</td>
									<td>
									<form action="/coupons/{{$coupon->id}}/block" method="POST">
											<input type="hidden" name="id" value="{{$coupon->id}}">
											<input type="hidden" name="blocked" value="{{$coupon->blocked}}">
											{{ csrf_field() }}
											
											<input type="submit" class="btn btn-default" aria-label="Left Align" value="Change Block Status of Your Card">
											    
													
									</form>
									</td>
								</tr>
							</tbody>
						</table>
					</div>	
				</div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
				<div class="panel-heading">Hostel Entry/Exit</div>
				<div class="panel-body">
					<div class="table-responsive">     
						<table class="table table-hover">
							<thead>
							  <tr>
								<th>Name</th>
								<th>RFID</th>
								<th>Roll No</th>
								<th>Mobile</th>
								<th>Place Of Visit</th>
								<th>Purpose Of Visit</th>
								<th>Out Date</th>
								<th>Out Time</th>
								<th>In Date</th>
								<th>In Time</th>
							  </tr>
							</thead>
							<tbody>
							
							@if ($last >= 0)
							@for($i=$last; $i>=0; $i--)
							  <tr>
								<td> {{$hostel[$i]->name}} </td>
								<td> {{$hostel[$i]->rfid}} </td>
								<td> {{$hostel[$i]->rollno}} </td>
								<td> {{$hostel[$i]->mobile}} </td>
								<td> {{$hostel[$i]->place}} </td>
								<td> {{$hostel[$i]->purpose}} </td>
								<td> {{$hostel[$i]->out_date}} </td>
								<td> {{$hostel[$i]->out_time}} </td>
								<td> {{$hostel[$i]->in_date}} </td>
								<td> {{$hostel[$i]->in_time}} </td>
							  </tr>
							@endfor
							@endif
							</tbody>
						</table>
					</div>	
				</div>
            </div>
        </div>
    </div>
</div>
@endsection

