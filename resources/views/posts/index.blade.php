@extends('layouts.cleanblog')

@section('title', isset($title) ? $title : 'All posts')

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url({{ asset('img/home-bg.jpg') }})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>{{ isset($head) ? $head : config('app.name') }}</h1>
                        <span class="subheading">{!!  isset($subhead) ? $subhead : 'A Blog Theme by Start Bootstrap'  !!}  </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                @forelse($posts as $post)
                <div class="post-preview">
                    <a href="{{ url('post', $post->id) }}">
                        <h2 class="post-title">
                            {{ $post->title }}

                        </h2>

                        <h3 class="post-subtitle">
                            {{ $post->description }}
                        </h3>
                    </a>
                    <p class="post-meta">Posted by
                        <a href="{{ url('user', $post->user->id) }}">{{ $post->user->fullname }}</a>
                        on {{ $post->created_at }}</p>
                </div>
                    @include('partials.tags')
                    <hr>
                @empty
                <h3>No posts ...</h3>
                @endforelse

                @include('partials.pager')

            </div>
        </div>
    </div>

@endsection
