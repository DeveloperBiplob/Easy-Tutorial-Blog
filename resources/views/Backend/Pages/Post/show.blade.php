<style>
    .post-card{
        width: 600px;
        display: block;
        padding: 10px;
        box-sizing: border-box;
        margin: auto;

    }
    .post-card.image{
        display: block;
    }
    img {
        vertical-align: middle;
        border-style: none;
        width: 100%;
    }
    .title h3 {
        margin-top: 10px;
        color: #ff9800;
        font-family: sans-serif;
        font-size: 25px;
        font-weight: 500;
    }
</style>
@extends('Backend.Layouts.backend_master')

@section('title', 'Admin | Show Post')

@section('master-content')
    <div class="card m-3">
        <div class="card-header">
            <h3 class="text-info float-left">Show Post</h3>
            <a href="{{ route('admin.post.index') }}" class="btn btn-success btn-sm float-right">Back Dashboard</a>
        </div>
        <div class="card-body">
            <div class="post-card">
                <div class="image">
                    <img src="{{ asset($post->image) }}" alt="">
                </div>
                <div class="title">
                    <h3>Title: {{ $post->title }}</h3>
                    <span>Author: {{ $post->author->name }}</span> |
                    <span>Cateogy: {{ $post->category->name }}</span>
                </div>
                <div class="des">
                    <p>{!! $post->description !!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
