@extends('layouts.admin')

@section('content')
                <div class="card card-default">
                    <div class="card-header">Messages</div>
                    <chat-app :user="{{auth()->user()}}"></chat-app>
                </div>
@endsection