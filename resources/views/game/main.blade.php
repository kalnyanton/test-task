@extends('layouts.app')

@section('content')
    <div class="game-wrapper">
        <form action="{{ route('account.deactivate', ['link' => $link]) }}" method="post">
            @csrf
            <button>{{ __('Deactivate this link') }}</button>
        </form>

        <form action="{{ route('account.regenerate', ['link' => $link]) }}" method="post">
            @csrf
            <button>{{ __('Generate new link') }}</button>
        </form>

        <a href="{{ route('game.feeling-lucky', ['link' => $link]) }}" class="button game-button">{{ __('Imfeelinglucky') }}</a>
        <a href="{{ route('game.history', ['link' => $link]) }}" class="button">{{ __('History') }}</a>
    </div>

    @yield('game-content')
@endsection
