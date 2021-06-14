@extends('layouts.app')

@section('content')
<div class="container" style="">
    <div style="width:100%;">
        <h3>
        <?php
        if($userPhoto){
          $user->userPhoto = $userPhoto;
        }
        if($project){
          $user->project = $project;
        }
        if($socialMedia){
          $user->socialMedia = $socialMedia;
        }
        ?>
        </h3>
        @if(Auth::check() && ($user->id == Auth::user()->id))
            <editable-component 
                :user="{{ $user }}"
            > </editable-component>
        @endif
        
        <!-- Header section -->
        @switch ($user->category)
            @case('fotograaf')
                <header5-component 
                :user="{{ $user }}"
                > </header5-component>
                <images1-component
                    :user="{{ $user }}">
                </images1-component>
                <contact2-component
                    :user="{{ $user }}">
                </contact2-component>
                <project1-component
                    :user="{{ $user }}">
                </project1-component>
                @break
            @case('developer')
                <header4-component 
                :user="{{ $user }}"
                > </header4-component>
                <project2-component
                    :user="{{ $user }}">
                </project2-component>
                <contact1-component
                    :user="{{ $user }}">
                </contact1-component>
                <images2-component
                    :user="{{ $user }}">
                </images2-component>
                @break
            @case('designer')
                <header3-component 
                :user="{{ $user }}"
                > </header3-component>
                <images1-component
                    :user="{{ $user }}">
                </images1-component>
                <contact2-component
                    :user="{{ $user }}">
                </contact2-component>
                <project2-component
                    :user="{{ $user }}">
                </project2-component>
                @break
            @case('marketing')
                <header2-component 
                :user="{{ $user }}"
                > </header2-component>
                <project1-component
                    :user="{{ $user }}">
                </project1-component>
                <contact1-component
                    :user="{{ $user }}">
                </contact1-component>
                <images2-component
                    :user="{{ $user }}">
                </images2-component>
                @break
            @default
                <header5-component 
                :user="{{ $user }}"
                > </header5-component>
                <project1-component
                    :user="{{ $user }}">
                </project1-component>
                <contact1-component
                    :user="{{ $user }}">
                </contact1-component>
                <images2-component
                    :user="{{ $user }}">
                </images2-component>
        @endswitch
    </div>
</div>

@endsection

<style>
</style>