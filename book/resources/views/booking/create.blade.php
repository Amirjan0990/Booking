@extends('layouts.app')

@section('title')
    Добавление
@endsection
<!-- create -->
@section('content')
    <div class="container">
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        <form action="{{route('booking.story')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="">Start_time : </label>
            <input type="date" name="title" class="form-control">
            <label for="">End_time : </label>
            <input type="date" name="text" class="form-control">
            <label for="">Guests : </label>
            <input type="text" name="guests" class="form-control">
            <label for="">Status : </label>
            <input type="text" name="status" class="form-control">
            <label for="">Place_id : </label>
            <select name="place_id" id="" class="form-control">
                @foreach($places as $place)
                    <option value="{{$place->id}}">{{$place->name}}</option>
                @endforeach
            </select>
            <label for="">Client_id : </label>
            <select name="client_id" id="" class="form-control">
                @foreach($clients as $client)
                    <option value="{{$client->id}}">{{$client->name}}</option>
                @endforeach
            </select>
            <input type="submit" value="Добавить" class="btn btn-primary form-control">
        </form>
    </div>
@endsection

@section('footer')
@endsection
