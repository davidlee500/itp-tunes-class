@extends('layout')

@section('title', 'Edit Genre')

@section('main')
  <div class="row">
    <div class="col">
      <form action="/genres" method="post">
        @csrf
        <div class="form-group">
          <label for="genre" id="genre">Genre</label>
          <input type="text" name="genre" class="form-control" value="{{$genres->Name}}">
          <small class="text-danger">{{$errors->first('genre')}}</small>
        </div>
        <button type="submit" class="btn btn-primary">
          Save
        </button>
        
        <!-- Hidden form to get GenreId -->
        <div class="form-group">
          <input type="hidden" name="genreId" class="form-control" value="{{$genres->GenreId}}">
        </div>
        
      </form>
    </div>
  </div>
@endsection