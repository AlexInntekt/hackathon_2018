@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="<?php echo url('/buildings'); ?>">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter building name">
                </div>
                <div class="form-group">
                    <label for="no_floors">No of Floors</label>
                    <input type="text" class="form-control" name="no_floors" id="no_floors" placeholder="No. of Floors">
                </div>
                <div class="form-group">
                    <label for="parking_lot">Select parking lot</label>
                    <select multiple class="form-control" name="parking" id="parking_lot">
                        @foreach($parkings as $parking)
                            <option value="{{$parking->id}}">{{$parking->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-md-6"><table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Building Name</th>
      <th scope="col">Number of Floors</th>
      <th scope="col">Parking lot</th>
    </tr>
  </thead>
  <tbody>
  @foreach($buildings as $building)
        
    <tr>
      <th scope="row">{{$building->id}}</th>
      <td>{{$building->name}}</td>
      <td>{{$building->numberOfFloors}}</td>
      @foreach($parkings as $parking)
        @if($building->parking_lot_id == $parking->id)
        <td>{{$parking->name}}</td>
        @endif
      @endforeach
    </tr>
    @endforeach
  </tbody>
</table>
        </div>
    </div>
</div>
@endsection
