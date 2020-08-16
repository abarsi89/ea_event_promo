@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ $event->name }}</div>

                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>{{ $event->date }}</td>
                            </tr>
                            <tr>
                                <td>{{ $event->location()->get()->pluck('name')[0] }}</td>
                            </tr>
                            <tr>
                                <td>{{ $event->ticket_price }} Ft</td>
                            </tr>
                            <tr>
                                <td>{{ $event->description }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <ul>
                                    @foreach ($event->performers()->get()->pluck('name') as $performer)
                                        <li>{{ $performer }}</li>
                                    @endforeach
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @if (in_array(Auth::user()->id, $event->users()->get()->pluck('id')->toArray()))
                        {{ __('Erre a rendezvényre már vettél jegyet') }}
                    @else
                        <a href="{{ route('ticket_purchase', $event->id) }}">
                            <button type="button" data-toggle="tooltip" title="@lang('messages.event.ticket_purchase')" class="btn btn-primary float-left">
                                @lang('messages.event.ticket_purchase')
                            </button>
                        </a>
                    @endif
                    <a href="{{ route('event.index') }}">
                        <button type="button" class="btn btn-secondary btn-close">
                            {{ __('Vissza a rendezvényekhez') }}
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
