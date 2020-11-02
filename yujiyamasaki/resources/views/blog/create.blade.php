@extends('layouts.app')

@section('content')
<div class="content">

    @auth
    @if($id == 1)

    <a href="{{ route('blog.index') }}">blog list</a>
    <form action="{{ route('blog.store') }}" method="POST">
        @csrf
        @isset($categories_web)
        <select name="blog_category">
            @foreach($categories_web as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        @endisset
        <input type="text" name="blog_title">
        <textarea id="" cols="30" rows="10" name="blog_detail"></textarea>
        <input type="submit" value="create">
    </form>

    @else
    <p>権限がありません</p>
    @endif
    @endauth

</div>
@endsection