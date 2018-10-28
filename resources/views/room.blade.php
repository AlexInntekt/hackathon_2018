@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="<?php echo url('/room'); ?>">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter room name">
                </div>

            <div class="form-group">
              <select name="type" id="type">
                <option value="Office">Office</option>
                <option value="ConferenceRoom">Conference Room</option>
              </select>
            </div>

            <div class="form-group">
                    <label for="building">Select building</label>
                    <select onchange="displayFloors();" class="form-control" name="building" id="building">
                        <option value="">Choose a building</option>
                        @foreach($buildings as $building)
                            <option value="{{$building->id}}">{{$building->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="floor">Select floor</label>
                    <select  class="form-control" name="floor" id="floor">
                        <option value="">Choose a floor</option>
                    </select>
                </div>
                @foreach($floors as $floor)
                  <input type="hidden" class="all_floors" value="{{$floor->building_id}},{{$floor->number}},{{$floor->id}},{{$floor->status}}">
                @endforeach
                <script>
                    function displayFloors(){
                      $("#floor").empty();
                      var b = document.getElementById("building");
                      var building = b.options[b.selectedIndex].value;
                      var all_floors = document.getElementsByClassName('all_floors');
                      var x = document.getElementById("floor");
                      var i;
                      var cnt = 0;
                      for(i=0;i<all_floors.length;i++){
                        var value = all_floors[i].value.split(',');
                        if(value[0]==building && value[3]!=1){
                          var c = document.createElement("option");
                          c.text = value[1];
                          c.value = value[2];
                          x.options.add(c, cnt);
                          cnt++;
                        }
                      }
                    }
                </script>
               
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
        <th scope="col">Floor</th>
        <th scope="col">Type</th>
      </tr>
    </thead>
    <tbody>
    @foreach($rooms as $room)
          
      <tr>
        <th scope="row">{{$room->id}}</th>
        <td>{{$room->name}}</td>

          @foreach($floors as $floor)
            @if($floor->id == $room->floor_id)
              @foreach($buildings as $building)
                @if($building->id == $floor->building_id)
                <td>{{$building->name }}</td>
                @endif
              @endforeach
            @endif
          @endforeach

        @foreach($floors as $floor)
          @if($floor->id == $room->floor_id)
            <td> {{$floor->number}}</td>
            @endif
        @endforeach
          <td> {{$room->type}}</td>

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
