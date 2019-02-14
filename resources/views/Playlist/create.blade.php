@extends('layout')

@section('title', 'Add a Playlist')

@section('main')
  <div class="row">
    <div class="col">
      <form action="/playlists" method="post">
        @csrf
        <div class="form-group">
          <label for="name" id="name">Name</label>
          <input type="text" name="name" class="form-control" value="{{old('Name')}}">
          <small class="text-danger">{{$errors->first('name')}}</small>
        </div>
        <button type="submit" class="btn btn-primary">
          Save
        </button>
      </form>
    </div>
  </div>
@endsection