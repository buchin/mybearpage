@extends('layout')

@section('content')
<section>
    <form action="{{ route('home') }}" method="post" enctype="multipart/form-data">
        @csrf
        <h1>My Bear Page</h1>
        <p>Give your <a href="https://bear.app/" target="_blank">Bear note</a> a web page, so you can share it to the the world*. ʕ•ᴥ•ʔ</p>

        <strong>How to use:</strong>
        <ol>
            <li>Export your note as <a href="https://mybear.page/notes/1" target="_blank">Textbundle</a></li>
            <li>Upload it in the form below</li>
            <li>You get an unique link to share (ᵔᴥᵔ)</li>
        </ol>
        <fieldset>
          <legend>Textbundle upload form</legend>

          {{-- <label for="textbundle">Texbundle</label> --}}
          <input name="textbundle" type="file">

          <input type="submit" value="Submit">

        </fieldset>
        <p><small>* Currently works with single note export</small></p>
    </form>
</section>
<section>
<a href="https://www.producthunt.com/posts/my-bear-page?utm_source=badge-featured&utm_medium=badge&utm_souce=badge-my-bear-page" target="_blank"><img src="https://api.producthunt.com/widgets/embed-image/v1/featured.svg?post_id=271597&theme=light" alt="My Bear Page - Give your Bear note a web page, so you can share it online | Product Hunt" style="width: 250px; height: 54px;" width="250" height="54" /></a>
<nav style="font-size: small; text-align: center;">
    <ul>
        <li><a href="https://github.com/buchin/mybearpage" target="_blank">We &hearts; Open Source</a></li>
    </ul>
</nav>
</section>
@endsection
