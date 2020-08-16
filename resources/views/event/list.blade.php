@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Rendezvények') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">@lang('messages.event.name')</th>
                            <th scope="col">@lang('messages.event.date')</th>
                            <th scope="col">@lang('messages.event.ticket_price')</th>
                            <th scope="col">@lang('messages.performer.name')</th>
                            <th scope="col">@lang('messages.venue.name')</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td><a href="{{ route('event.show', $event->id) }}" title="@lang('messages.detail')">{{ $event->name }}</a></td>
                                    <td>{{ $event->date }}</td>
                                    <td>{{ $event->ticket_price }} Ft</td>
                                    <td>
                                        <ul>
                                        @foreach ($event->performers()->get()->pluck('name') as $performer)
                                            <li>{{ $performer }}</li>
                                        @endforeach
                                        </ul>
                                    </td>
                                    <td>{{ $event->location()->get()->pluck('name')[0] }}</td>
                                    <td>
                                        @if (in_array(Auth::user()->id, $event->users()->get()->pluck('id')->toArray()))
                                            {{ __('Erre a rendezvényre már vettél jegyet') }}
                                        @else
                                            <a href="{{ route('ticket_purchase', $event->id) }}">
                                                <button type="button" data-toggle="tooltip" title="@lang('messages.event.ticket_purchase')" class="btn btn-primary float-left">
                                                    @lang('messages.event.ticket_purchase')
                                                </button>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
