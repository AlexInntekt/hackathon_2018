@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item"><a href="<?php echo url('/buildings');?>">Buildings</a></li>
                <li class="list-group-item"><a href="<?php echo url('/room');?>">Rooms</a></li>
                <li class="list-group-item"><a href="<?php echo url('/company');?>">Companies</a></li>
                <li class="list-group-item"><a href="<?php echo url('/employees');?>">Internal employees</a></li>
                <li class="list-group-item"><a href="<?php echo url('/parking');?>">Parking lots</a></li>
                <li class="list-group-item"><a href="<?php echo url('/alerts');?>">Complaints</a></li>
                <li class="list-group-item"><a href="<?php echo url('/bookings');?>">All bookings</a></li>
            </ul>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
