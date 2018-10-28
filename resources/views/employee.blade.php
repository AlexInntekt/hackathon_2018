@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="<?php echo url('/employee'); ?>">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter employee name">
                </div>

                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" name="type" id="type" placeholder="Enter employee type">
                </div>
                
            <div class="form-group">
                    <label for="building">Select building</label>
                    <select class="form-control" name="building" id="building">
                        <option value="">Choose a building</option>
                        @foreach($buildings as $building)
                            <option value="{{$building->id}}">{{$building->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-md-6">

           <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
         <th scope="col">Name</th>
        <th scope="col">Building Name</th>
        <th scope="col">Type</th>
      </tr>
    </thead>
    <tbody>
    @foreach($employees as $employee)
          
      <tr>
        <th scope="row">{{$employee->id}}</th>
        <td>{{$employee->name}}</td>
        @foreach($buildings as $building)
          @if($building->id == $employee->building_id)
            <td>{{$building->name}}</td>
            @endif
            @endforeach
        <td> {{ $employee->type}} </td>

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
