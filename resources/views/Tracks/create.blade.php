@extends('layout')

@section('title', 'Add a Track')

@section('main')
  <div class="row">
    <div class="col">
      <form action="/tracks" method="post">
        @csrf

        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label text-sm-right" id="name">Name</label>
          <div class="col-sm-9">
            <input type="text" name="name" class="form-control" value="{{old('name')}}">
            <small class="text-danger">{{$errors->first('name')}}</small>
          </div>
        </div>

        <!-- Dropdown for albums -->
        <div class="form-group row">
          <label for="album" class="col-sm-2 col-form-label text-sm-right" id="album">Album</label>
          <div class="col-sm-9">
            <select name="album" id="album" class="form-control">
                <option value=""> -- All -- </option>

                <!-- album dropdown options -->
                @foreach($albums as $album)
                    <option value="{{$album->AlbumId}}" {{$album->AlbumId==old('album') ? "selected" : ""}}>
                        {{$album->Title}}
                    </option>
                @endforeach
            </select>
            <small class="text-danger">{{$errors->first('album')}}</small>
          </div>
        </div>

        <!-- Dropdown for media types -->
        <div class="form-group row">
          <label for="media_type" class="col-sm-2 col-form-label text-sm-right" id="media_type">Media Type</label>
          <div class="col-sm-9">
            <select name="media_type" id="media_type" class="form-control">
                <option value=""> -- All -- </option>
    
                @foreach($media_types as $media_type)
                    <option value="{{$media_type->MediaTypeId}}" {{$media_type->MediaTypeId==old('media_type') ? "selected" : ""}}>
                        {{$media_type->Name}}
                    </option>
                @endforeach
            </select>
            <small class="text-danger">{{$errors->first('media_type')}}</small>
          </div>
        </div>

        <!-- Dropdown for genres -->
        <div class="form-group row">
          <label for="genre" class="col-sm-2 col-form-label text-sm-right" id="genre">Genre</label>
          <div class="col-sm-9">
            <select name="genre" id="genre" class="form-control">
                <option value=""> -- All -- </option>
    
                @foreach($genres as $genre)
                    <option value="{{$genre->GenreId}}" {{$genre->GenreId==old('genre') ? "selected" : ""}}>
                        {{$genre->Name}}
                    </option>
                @endforeach
            </select>
            <small class="text-danger">{{$errors->first('genre')}}</small>
          </div>
        </div>

        <!-- Text input for composer -->
        <div class="form-group row">
          <label for="composer" class="col-sm-2 col-form-label text-sm-right" id="composer">Composer</label>
          <div class="col-sm-9">
            <input type="text" name="composer" class="form-control" value="{{old('composer')}}">
            <small class="text-danger">{{$errors->first('composer')}}</small>
          </div>
        </div>

        
        <div class="form-group row">
        <!-- Number input for milliseconds -->
          <label for="milliseconds" class="col-sm-2 col-form-label text-sm-right" id="milliseconds">Milliseconds</label>
          <div class="col-sm-2">
            <input type="number" name="milliseconds" class="form-control" value="{{old('milliseconds')}}">
            <small class="text-danger">{{$errors->first('milliseconds')}}</small>
          </div>

        <!-- Number input for bytes -->
          <label for="byte" class="col-sm-1 col-form-label text-sm-right" id="byte">Bytes</label>
          <div class="col-sm-2">
            <input type="number" name="byte" class="form-control" value="{{old('byte')}}">
            <small class="text-danger">{{$errors->first('byte')}}</small>
          </div>
        <!-- Number input for unit price -->
          <label for="unit_price" class="col-sm-1 col-form-label text-sm-right" id="unit_price">Unit Price</label>
          <div class="col-sm-2">
            <input type="number" name="unit_price" class="form-control" value="{{old('unit_price')}}">
            <small class="text-danger">{{$errors->first('unit_price')}}</small>
          </div>
        </div>

        <button type="submit" class="btn btn-primary" style="float:right; width:25%;">
            Save
        </button>
      </form>
    </div>
  </div>
@endsection