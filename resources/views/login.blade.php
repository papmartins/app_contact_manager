 @extends('layouts.basic')

@section('title',$title)

@section('content')
<div class="page-content">
    <div class="page-title">
        <p>
        {{$title}}
        </p>
    </div>
    <div class="page-information">
        <div style="width:30%;margin-left:auto;margin-right:auto">
        <form action="{{ route('site.login') }}" method="post">
            @csrf
            <input name="email" value="{{ old('email') }}" type="text" placeholder="Username">
            {{ $errors->has('email') ? $errors->first('email') : '' }}
            <input name="password" value="{{ old('password') }}" type="password" placeholder="Password">
            {{ $errors->has('password') ? $errors->first('password') : '' }}
            <button type="submit" class="borda-preta">Login</button>
        </form>
        {{ isset($erro) && $erro != '' ? $erro : '' }}
        </div>
    </div>
@endsection