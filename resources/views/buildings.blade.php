@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="/buildings">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter building name">
                </div>
                <div class="form-group">
                    <label for="no_floors">No of Floors</label>
                    <input type="text" class="form-control" id="no_floors" placeholder="No. of Floors">
                </div>
                <div class="form-group">
                    <label for="parking_lot">Select parking lot</label>
                    <select multiple class="form-control" id="parking_lot">
                        @foreach($parkings as $parking)
                            <option value="{{$parking->id}}">{{$parking->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-md-6">
        </div>
    </div>
</div>
@endsection
