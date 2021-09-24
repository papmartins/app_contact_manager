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
        <div style="width:30%;margin-left:auto;margin-right:auto">
            <table border="1" style="text-align:left;width:100%">
                <tr>
                    <td>ID:</td>
                    <td>{{$contact->id}}</td>
                </tr>
                <tr>
                    <td>Nome:</td>
                    <td>{{$contact->name}}</td>
                </tr>
                <tr>
                    <td>Descrição:</td>
                    <td>{{$contact->contact}}</td>
                </tr>
                <tr>
                    <td>Peso:</td>
                    <td>{{$contact->email}}</td>
                </tr>
                <tr>
                        <td>
                            <form method="post" id="form_{{$contact->id}}" action="{{ route('site.destroy',$contact->id) }}"
                             onsubmit="return confirm('Do you really want to delete the contact of {{ $contact->name }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td> 
                        <td><a href="{{ route('site.edit',$contact->id) }}">Edit</a></td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection