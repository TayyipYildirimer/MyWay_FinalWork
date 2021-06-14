@extends('layouts.app')

@section('content')

<div class="container">
    <div style="width:100%;">
      <div>
        <search-component :users="{{$users}}"></search-component>
      </div>
      <!--<div>
        <portfolios-component :users="{{$users}}"></portfolios-component>
      </div>-->
    </div>
</div>

@endsection