@extends('layout')

@section('title')
{{ $note->title }}
@endsection

@section('head')
<meta name="bear-note-unique-identifier" content="{{ $note->bear_id }}"
<meta name="created" content="{{ $note->created_at->format('c') }}"/>
<meta name="modified" content="{{ $note->updated_at->format('c') }}"/>
@endsection

@section('content')
<section class="note">

    <div class="note-content">
    {!! $note->html !!}
    </div>

</section>
<section>
    <fieldset style="background: lightyellow;">
        <legend>Share This Note</legend>
        <div id="copied" style="color: darkgreen;">
            <span style="color: #545454;">Tap to copy</span>
        </div>
        <input type="text" value="{{ url()->current() }}" onclick="document.execCommand('selectall',null,false);document.execCommand('copy');document.getElementById('copied').innerHTML = 'Link copied'">

    </fieldset>

    <nav style="font-size: small; text-align: center;">
        <ul>
            <li><a href="{{ route('home') }}">What is this?</a></li>
            <li><a href="#report">Report Note</a></li>
        </ul>
    </nav>
</section>
@endsection
