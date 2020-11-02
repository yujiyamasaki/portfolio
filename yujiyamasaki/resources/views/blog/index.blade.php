@extends('layouts.app')

@section('content')
<div class="content">
    <h2 class="heading">BLOG</h2>

@include('search.blog')

@if($blogsTotal == 0)
    <p class="blog__total">ブログは{{ $blogsTotal }}件です
        @auth
            @if($id == 1)
            &nbsp;/&nbsp;<a href="{{ route('blog.create') }}">create</a>
            @endif
        @endauth
    </p>
    @else
    <p class="blog__total">ブログは{{ $blogsTotal }}件です
        @auth
            @if($id == 1)
            &nbsp;/&nbsp;<a href="{{ route('blog.create') }}">create</a>
            @endif
        @endauth
    </p>

    <ul class="blog__list">
        @foreach($blogs as $blog)
        <li class="blog__item">

            @auth
                @if($id == 1)
                <a href="{{ route('blog.edit') }}?blog_id={{ $blog->id }}">edit</a>
                <a href="{{ route('blog.delete') }}?blog_id={{ $blog->id }}">delete</a>
                @endif
            @endauth

            <a href="{{ route('blog.detail') }}?blog_id={{ $blog->id }}" class="blog__link">
                <span class="blog__category">{{ $categories_web[$blog->blog_category] }}</span>
                <p class="blog__title">{{ $blog->blog_title }}</p>
                <p class="blog__date"><i class="far fa-clock"></i>{{ $blog->created_at->format('Y.m.d') }}posted</p>
            </a>
        </li>
        @endforeach
    </ul>
    {{-- $blogs->links() --}}
    {{ $blogs->appends(request()->query())->links() }}

@endif

</div>
@endsection