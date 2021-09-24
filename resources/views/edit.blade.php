
@extends('layouts.basic')
@section('title',$title)

@section('content')
<div class="page-content">
    <div class="page-title">
        <p>
        {{$title}}
        <a href="{{ route('site.index') }}" style="float:right;margin-right:5px">Contact List</a>
        </p>        
    </div>
    <div class="page-information">
        <div style="width:30%;margin-left:auto;margin-right:auto;">
            @component('_components.form_create_edit',['contact' => $contact, 'msg' => ( isset($msg) ? $msg : '')])
            @endcomponent
        </div>
    </div>
</div>
@endsection