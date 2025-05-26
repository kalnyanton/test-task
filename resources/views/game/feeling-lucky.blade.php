@extends('game.main')

@section('game-content')
    <div class="game-result-wrapper">
        <div class="game-quantity">{{ $gameResultDto->quantity }}</div>
        <div class="game-result">{{ $gameResultDto->result }}</div>
        <div class="game-amount">${{ $gameResultDto->winAmount }}</div>
    </div>
@endsection
