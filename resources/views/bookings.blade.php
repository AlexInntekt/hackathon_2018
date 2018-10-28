@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
        </div> 
        <div class="col-md-4">
            <form method="POST" action="<?php echo url('/booking'); ?>">
                @csrf
                @if($user_id == null)
                    <div class="form-group">
                        <label for="email_guest">Email</label>
                        <input type="email" class="form-control" name="email_guest" id="email_guest" placeholder="Enter your email">
                    </div>
                @endif
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
                    <select onchange="displayRooms()" class="form-control" name="floor" id="floor">
                        <option value="">Choose a floor</option>
                    </select>
                </div>
                @foreach($floors as $floor)
                  <input type="hidden" class="all_floors" value="{{$floor->building_id}},{{$floor->number}},{{$floor->id}},{{$floor->status}}">
                @endforeach
                <div class="form-group">
                    <label for="room">Select room</label>
                    <select class="form-control" name="room" id="room">
                        <option value="">Choose a room</option>
                    </select>
                </div>
                @foreach($rooms as $room)
                  <input type="hidden" class="all_rooms" value="{{$room->floor_id}},{{$room->name}},{{$room->id}}">
                @endforeach
                <div class="form-group">
                    <label for="start_time">Start Time</label>
                    <input type="time" class="form-control" name="start_time" id="start_time">
                </div>
                 <div class="form-group">
                    <label for="end_time">End Time</label>
                    <input type="time" class="form-control" name="end_time" id="end_time">
                </div>
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
                        if(value[0]==building){
                          var c = document.createElement("option");
                          c.text = value[1];
                          c.value = value[2];
                          x.options.add(c, cnt);
                          cnt++;
                        }
                      }
                    }
                    function displayRooms(){
                      $("#room").empty();
                      var f = document.getElementById("floor");
                      var floor = f.options[f.selectedIndex].value;
                      var all_rooms = document.getElementsByClassName('all_rooms');
                      var x = document.getElementById("room");
                      var i;
                      var cnt = 0;
                      for(i=0;i<all_rooms.length;i++){
                        var value = all_rooms[i].value.split(',');
                        if(value[0]==floor){
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
        <div class="col-md-4">
        </div> 
    </div>
</div>
@endsection
