@extends('layouts.basic')

@section('title',$title)

@section('content')
<?php
        session_start();
?>
<div class="page-content">
    <div class="page-title">
        @if(isset($_SESSION['name']))
        <a href="{{ route('site.logout') }}" style="float:left;margin-left:5px;margin-top:10px">Logout</a>
        @else
        <a href="{{ route('site.login') }}" style="float:left;margin-left:5px;margin-top:10px">Login</a>
        @endif
        <p>
        {{$title}}
        <a href="{{ route('site.new') }}" style="float:right;margin-right:5px">New Contact</a>
        </p>
    </div>
    <div class="page-information">
        <div style="width:90%;margin-left:auto;margin-right:auto;">
        {{-- para ver lazy e eager loading  --}}
        {{-- {{ $contacts->toJson()}}  --}}
            <table border=1 width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
            @foreach($contacts as $contact)
                    <tr>
                        <td>{{$contact->id}}</td>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->contact}}</td>
                        <td>{{$contact->email}}</td>
                        <td><a href="{{ route('site.show',$contact->id) }}">View</td>
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
            @endforeach 
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="{{$contacts->previousPageUrl()}}">Previous</a></li>
                    @for($i = 1; $i<=$contacts->lastPage();$i++)
                        <li class="page-item {{ $contacts->currentPage() == $i ? 'active' : '' }}"><a class="page-link" 
                                href="{{$contacts->url($i)}}">{{ $i }}</a></li>
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{$contacts->nextPageUrl()}}">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection