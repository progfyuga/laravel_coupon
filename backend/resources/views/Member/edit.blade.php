@extends('layouts.app')

@section('title','編集ページ')

@section('css')
<link rel="stylesheet" href="{{ asset('css/Member/edit.css') }}">
@endsection

@section('content')
<div class="container main-content">

    <div class="theme text-center">
        <h1>編集ページ</h1>
        @if(session('message'))
        <p>{{session('message')}}</p>
        @endif
        @if(count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <div class="card border-dark mb-3 mx-auto">

        <div class="card-header">情報を編集する</div>

        <div class="card-body text-dark">
            <form method="POST" action="{{ route('member.update') }}">
                @csrf

                {{--生徒姓--}}{{--生徒名--}}
                <div class="form-group row">
                    <div class="col-6">
                        <label for="student_lastname" class="">生徒姓</label>
                        <input id="student_lastname" class="form-control @error('student_lastname') is-invalid @enderror" name="student_lastname" value="{{ old('student_lastname',$user->student_lastname) }}" required　autocomplete="name">
                    </div>
                    <div class="col-6">
                        <label for="student_firstname" class="">生徒名</label>
                        <input id="student_firstname" class="form-control @error('student_firstname') is-invalid @enderror" name="student_firstname" value="{{ old('student_firstname',$user->student_firstname) }}" required　autocomplete="name">
                    </div>
                </div>
                {{--生徒姓フリガナ--}}{{--生徒名フリガナ--}}
                <div class="form-group row">
                    <div class="col-6">
                        <label for="student_lastname_kana" class="">生徒姓フリガナ</label>
                        <input id="student_lastname_kana" class="form-control @error('student_lastname_kana') is-invalid @enderror" name="student_lastname_kana" value="{{ old('student_lastname_kana',$user->student_lastname_kana) }}" required>
                    </div>
                    <div class="col-6">
                        <label for="student_firstname_kana" class="">生徒名フリガナ</label>
                        <input id="student_firstname_kana" class="form-control @error('student_firstname_kana') is-invalid @enderror" name="student_firstname_kana" value="{{ old('student_firstname_kana',$user->student_firstname_kana) }}" required>
                    </div>
                </div>
                {{--メールアドレス--}}
                <div class="form-group">
                    <label for="email" class="">メールアドレス</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user->email) }}" autocomplete="email">
                </div>
                {{--住所--}}
                <div class="form-group">
                    <label for="address" class="">住所</label>
                    <input id="address" type="" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address',$user->address) }}" autocomplete="address">
                </div>
                {{--電話番号--}}
                <div class="form-group">
                    <label for="tel_no" class="">電話番号</label>
                    <input id="tel_no" type="tel" class="form-control @error('tel_no') is-invalid @enderror" name="tel_no" value="{{ old('tel_no',$user->tel_no) }}" autocomplete="tel">
                </div>
                {{--保護者姓--}}{{--保護者名--}}
                <div class="form-group row">
                    <div class="col-6">
                        <label for="parent_lastname" class="">保護者性</label>
                        <input id="parent_lastname" type="" class="form-control @error('parent_lastname') is-invalid @enderror" name="parent_lastname" value="{{ old('parent_lastname',$user->parent_lastname) }}" required>
                    </div>
                    <div class="col-6">
                        <label for="parent_firstname" class="">保護者名</label>
                        <input id="parent_firstname" type="" class="form-control @error('parent_firstname') is-invalid @enderror" name="parent_firstname" value="{{ old('parent_firstname',$user->parent_firstname) }}" required>
                    </div>
                </div>
                {{--保護者姓フリガナ--}}{{--保護者名フリガナ--}}
                <div class="form-group row">
                    <div class="col-6">
                        <label for="parent_lastname_kana" class="">保護者性フリガナ</label>
                        <input id="parent_lastname_kana" type="" class="form-control @error('parent_lastname_kana') is-invalid @enderror" name="parent_lastname_kana" value="{{ old('parent_lastname_kana',$user->parent_lastname_kana) }}" required>
                    </div>
                    <div class="col-6">
                        <label for="parent_firstname_kana" class="">保護者名フリガナ</label>
                        <input id="parent_firstname_kana" type="" class="form-control @error('parent_firstname_kana') is-invalid @enderror" name="parent_firstname_kana" value="{{ old('parent_firstname_kana',$user->parent_firstname_kana) }}" required>
                    </div>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="update-button">更新</button>
                </div>

            </form>
        </div>
    </div>

    <div class="button-group text-center">
        <a class="return-button" href="{{ route('member.user') }}" role="button">戻る</a>
    </div>
</div>

@endsection