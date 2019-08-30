@extends('layouts.admin')

@section('styles')
    <style>
      .chat {
          overflow: hidden;
      }
    </style>
@endsection
@section('content')

        <chat-app :user="{{auth()->user()}}" class="chat"></chat-app>

@endsection
