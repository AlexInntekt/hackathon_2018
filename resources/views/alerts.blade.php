@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
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
            <br>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
