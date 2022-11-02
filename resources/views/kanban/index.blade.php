@extends('layouts.app')

@section('content')
<div>
    @livewire('sortable-task', ['projet' => $projet , 'boards' => $boards])
</div>
@endsection
