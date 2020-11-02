@extends('layouts.app')

@section('content')
<div class="content">
    <h2 class="heading">CONTACT</h2>
    <p class="content__lead">返信できない場合があります。予めご了承ください。</p>
    @if ($errors->any())
    <span class="errorMessage">入力内容に誤りがあります</span>
    @endif
    <form action="{{ route('contact.post') }}" method="POST" class="form">
        @csrf
        <div class="contact__item">
            <label for="name" class="contact__label">お名前</label>
            <input id="name" type="text" name="contact_name" value="{{ old('contact_name') }}" class="contact__text">
            @if($errors->has('contact_name'))
            <span class="errorMessage">{{ $errors->first('contact_name') }}</span>
            @endif
        </div>
        <div class="contact__item">
            <label for="email" class="contact__label">メールアドレス</label>
            <input id="email" type="email" name="contact_email" value="{{ old('contact_email') }}" class="contact__text">
            @if($errors->has('contact_email'))
            <span class="errorMessage">{{ $errors->first('contact_email') }}</span>
            @endif
        </div>
        <div class="contact__item">
            <label for="detail" class="contact__label">お問い合わせ内容</label>
            <textarea id="detail" name="contact_detail" id="" cols="30" rows="10" class="contact__detail">{{ old('contact_detail') }}</textarea>
            @if($errors->has('contact_detail'))
            <span class="errorMessage">{{ $errors->first('contact_detail') }}</span>
            @endif
        </div>
        <div class="contact__item">
            <div class="btn__wrap">
                <input type="submit" value="確認" class="btn">
            </div>
        </div>
    </form>
</div>
@endsection