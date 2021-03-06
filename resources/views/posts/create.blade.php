@extends('layouts.cleanblog')

@section('title',isset($title) ? $title : 'New post')

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url({{ asset('img/post-bg.jpg') }})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>{{ isset($head) ? $head : 'New Post' }}</h1>
                        <span class="subheading">{{ isset($subhead) ? $subhead :  'Vytvorenie noveho postu' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ URL::to('post') }}" method="post" id="postForm" novalidate>
                    {{ csrf_field() }}
                    @include('posts.form')
                </form>

            </div>
        </div>

    </div>

@endsection
