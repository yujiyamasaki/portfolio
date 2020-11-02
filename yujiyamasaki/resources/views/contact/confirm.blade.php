@extends('layouts.app')

@section('content')
<div class="content">
    <h2 class="heading">CONTACT</h2>
    <form action="{{ route('contact.send') }}" method="POST" class="form">
        @csrf
        <div class="contact__item">
            <p class="contact__label">お名前</p>
            <p class="contact__text">{{ $contact_input['contact_name'] }}</p>
        </div>
        <div class="contact__item">
            <p class="contact__label">メールアドレス</p>
            <p class="contact__text">{{ $contact_input['contact_email'] }}</p>
        </div>
        <div class="contact__item">
            <p class="contact__label">お問い合わせ内容</p>
            <p class="contact__text">{{ $contact_input['contact_detail'] }}</p>
        </div>
        <div class="contact__item">
            <div class="btn__wrap">
                <input type="submit" value="戻る" name="back" class="btn btn--back">
                <input type="submit" value="送信" class="btn">
            </div>
        </div>
    </form>
</div>
@endsection