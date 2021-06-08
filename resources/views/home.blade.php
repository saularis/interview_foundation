@extends('app')
@section('content')
<home user="{{ json_encode($user) }}"></home>
@endsection