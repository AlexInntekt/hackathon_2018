@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="<?php echo url('/parking'); ?>">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter parking name">
                </div>
                <div class="form-group">
                    <label for="parking_spaces">Number of Parking Spaces</label>
                    <input type="text" class="form-control" name="parking_spaces" id="parking_spaces" placeholder="No. of Parking Spaces">
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
        <div class="col-md-6">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Parking Name</th>
              <th scope="col">Number of Parking Spaces</th>
            </tr>
          </thead>
          <tbody>
          @foreach($parkings as $parking)   
            <tr>
              <th scope="row">{{$parking->id}}</th>
              <td>{{$parking->name}}</td>
              <td>{{$parking->number_of_parking_spaces}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        </div>
    </div>
</div>
@endsection
