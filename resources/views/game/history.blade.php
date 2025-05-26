@extends('game.main')

@section('game-content')
    <table class="history-table">
        @foreach($history as $historyItem)
            <tr>
                <td>{{ $historyItem->quantity }}</td>
                <td>{{ $historyItem->result }}</td>
                <td>${{ $historyItem->winAmount }}</td>
            </tr>
        @endforeach
    </table>
@endsection
