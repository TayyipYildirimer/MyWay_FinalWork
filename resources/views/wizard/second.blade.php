@extends('layouts.app')

@section('content')
<div  style="overflow:hidden;padding-bottom:0;">
  <div class="container">
      <div style="width:100%;z-index:-2;">
        <a href="/">
          <img src="/images/logo_white.png" style="width:10%;position:relative;left:45%;z-index:99;">
        </a>
      </div>
      <!--<img style="max-width:300px;max-height:300px;" src="imageURL">
      foreach($colors as $color)
      <h1 style="color:#color}}">color}}</h1>
      endforeach
      foreach($palette as $color)
          {color}}
      endforeach
      foreach(hexColors as ex)
          <h1 style="color:{$ex}}">{$ex}}</h1>
      endforeach-->
    <div data-app>
     <wizard2-component :colors="'{{ $str_hexColors }}'"></wizard2-component>
    </div>
  </div>
</div>

@endsection