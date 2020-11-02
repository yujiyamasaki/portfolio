@extends('layouts.app')

@section('content')
<div class="content">

    @auth
    @if($id == 1)

    <form action="{{ route('blog.update') }}" method="POST">
        @csrf
        <input type="hidden" name="blog_id" value="{{ $blog->id }}">

        @isset($categories_web)
        <select name="blog_category">
            @foreach($categories_web as $key => $value)
                @if($key == $blog->blog_category)
                <option value="{{ $key }}" selected>{{ $value }}</option>
                @else
                <option value="{{ $key }}">{{ $value }}</option>
                @endif
            @endforeach
        </select>
        @endisset

        <input type="text" name="blog_title" value="{{ $blog->blog_title }}">
        <textarea name="blog_detail" id="" cols="30" rows="10">{{ $blog->blog_detail }}</textarea>
        <input type="submit" value="update">
    </form>
    <a href="{{ route('blog.delete') }}?blog_id={{ $blog->id }}">delete</a>
    <a href="{{ route('blog.index') }}">blog list</a>

    @else
    <p>権限がありません</p>
    @endif
    @endauth

</div>
@endsection