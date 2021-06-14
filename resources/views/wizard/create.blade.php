@extends('layouts.app')

@section('content')
<div class="container">
    <div style="width:100%;margin-top: -1%;">
      <a href="/">
        <img src="/images/logotransparant.png" style="width:10%;position:relative;left:45%;">
      </a>
    </div>
    <wizard-component :colors="'{{ $colors }}'"></wizard-component>
</div>

@endsection