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
								<th>Actions</th>
							  </tr>
							</thead>
							<tbody>
							
								@foreach ($coupons as $coupon)
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
										<td>
											<form action="coupons/{{$coupon->id}}/edit" method="GET">
												<input type="hidden" name="id" value="{{$coupon->id}}">
												{{ csrf_field() }}
											
												<input type="submit" class="btn btn-default" aria-label="Left Align" value="Edit">
													
											</form>
											<form action="coupons/{{$coupon->id}}" method="POST">
												<input type="hidden" name="id" value="{{ $coupon->id }}">
												{{ csrf_field() }}
												{{ method_field('DELETE')  }}
											
												<input type="submit" class="btn btn-default" aria-label="Left Align" value="Delete">
													
											</form>
										</td>
									</tr>
								@endforeach
							
							</tbody>
						</table>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
