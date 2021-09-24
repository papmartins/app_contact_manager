{{-- {{ $contact}} --}}
    {{ $msg ?? '' }}
    @if(isset($contact->id))
        <form method="post" action="{{ route('site.update',[$contact->id,'msg' => '']) }}">
            @csrf
            @method('PUT')
    @else
        <form method="post" action="{{ route('site.store') }}">
            @csrf
    @endif
        <input type="hidden" name="id" value="{{ $contact->id ?? '' }}">
        <input type="text" value="{{ $contact->name ?? old('name') }}" name="name" placeholder="Name">
        {{ $errors->has('name') ? $errors->first('name') : '' }}  
        <input type="text" value="{{ $contact->contact ?? old('contact') }}" name="contact" placeholder="Contact">
        {{ $errors->has('contact') ? $errors->first('contact') : '' }}
        <input type="email" value="{{ $contact->email ?? old('email') }}" name="email" placeholder="Email">
        {{ $errors->has('email') ? $errors->first('email') : '' }}
        <button type="submit">Save</button> 