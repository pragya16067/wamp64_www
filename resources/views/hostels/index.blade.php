@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
				<div class="panel-heading">Hostels</div>
				<div class="panel-body">
				
					<div class="table-responsive">          
						<table class="table table-hover">
							<thead>
							  <tr>
								<th>Id</th>
								<th>Name</th>
								<th>RFID</th>
								<th>Roll No</th>
								<th>Mobile</th>
								<th>Out Date</th>
								<th>Out Time</th>
								<th>Place</th>
								<th>Purpose</th>
								<th>In Date</th>
								<th>In Time</th>
							  </tr>
							</thead>
							<tbody>
							
								@foreach ($hostels as $hostel)
									<tr>
										<td> {{$hostel->id}} </td>
										<td> {{$hostel->name}} </td>
										<td> {{$hostel->rfid}} </td>
										<td> {{$hostel->rollno}} </td>
										<td> {{$hostel->mobile}} </td>
										<td> {{$hostel->out_date}} </td>
										<td> {{$hostel->out_time}} </td>
										<td> {{$hostel->place}} </td>
										<td> {{$hostel->purpose}} </td>
										<td> {{$hostel->in_date}} </td>
										<td> {{$hostel->in_time}} </td>
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
