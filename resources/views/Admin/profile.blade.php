@extends('layout')

@section('title', 'Profile')

@section('main')
  <!-- <h1>Welcome back, {{$user->name}}</h1> -->
  <p>Your email is {{$user->email}}</p>
@endsection