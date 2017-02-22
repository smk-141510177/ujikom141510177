@extends('layouts.app')
@section('judul')
    Welcome
@endsection
@section('content')
    <center><h2>Anda Masuk Sebagai {{Auth::user()->type_user}}</h2></center>
@endsection
