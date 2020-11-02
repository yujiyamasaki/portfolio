@extends('layouts.app')

@section('content')
<div class="content">
    <h2 class="heading">BLOG</h2>

    @include('search.blog')

    @isset($blog)
    @auth
        @if($id == 1)
        <a href="{{ route('blog.edit') }}?blog_id={{ $blog->id }}">edit</a>
        <a href="{{ route('blog.delete') }}?blog_id={{ $blog->id }}">delete</a>
        @endif
    @endauth

    <span class="blog__category">{{ $categories_web[$blog->blog_category] }}</span>
    <p class="blog__title">{{ $blog->blog_title }}</p>
    <div class="blog__detail">{!! $blog->blog_detail !!}</div>

    <div class="btn__wrap btn__wrap--bottom">
        <a href="{{ route('blog.index') }}" class="btn">一覧へ戻る</a>
    </div>
    
    @else
    <p class="">該当の記事はありません</p>
    @endisset
</div>
@endsection