@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <ul class="list-group">
                @if($user_id == 1)
                    <li class="list-group-item"><a href="<?php echo url('/buildings');?>">Buildings</a></li>
                    <li class="list-group-item"><a href="<?php echo url('/room');?>">Rooms</a></li>
                    <li class="list-group-item"><a href="<?php echo url('/company');?>">Companies</a></li>
                    <li class="list-group-item"><a href="<?php echo url('/employee');?>">Internal employees</a></li>
                    <li class="list-group-item"><a href="<?php echo url('/parking');?>">Parking lots</a></li>
                @endif
                <li class="list-group-item"><a href="<?php echo url('/alerts');?>">Complaints</a></li>
                <li class="list-group-item"><a href="<?php echo url('/booking');?>">All bookings</a></li>
            </ul>
        </div>
        <div class="col-md-8">
            <form method="POST" enctype="multipart/form-data" action="<?php echo url('/alerts'); ?>">
                @csrf
                <div class="form-group">
                    <label for="complaint">Complaint</label>
                    <textarea  class="form-control" name="complaint" id="complaint" placeholder="Enter the Complaint"></textarea>
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" class="form-control" name="photo" id="photo" accept="image/*;capture=camera">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
