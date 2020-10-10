@extends('layouts.app')



@section('content')
<strong>PENDING PAYMENTS</strong>
<div class="col-md-16">
    <form action="{{URL::to('/searchaccountantspayments')}}" method="POST" role="search">
    {{csrf_field()}}
    <div class="input-group">
        <input type="search" name="searchaccountantspayments" class="form-control" placeholder="search payment by name, address or status">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
            <span class="glyphicon-search"></span></button>
        </span>
    </div>

</form>
</div>


<!-- <div class="table-responsive"> -->
<table class="table">
<thead class="text-primary">
<th>Transaction<br>ID</th>
<th>Amount</br>Paid</th>
<th>Paid</br>For</th>
<th>Date</br>Paid</th>
<!-- <th>Receipt</th> -->

</thead>
<tbody>

@foreach ($shipments as $row )
@if($row->payment_status == "Pending")
<tr>
<td>{{$row->mpesa_code}}</td>
<td>{{$row->totalexpected}}</td>
<td>@if($row->order_shipment == "Order") Order 
@elseif($row->order_shipment == "Shipment") Booking 
@endif
</td>
<td>{{$row->created_at}}</td>


 
</tr>
@endif
@endforeach
</tbody>
</table>
</div>
@endsection
