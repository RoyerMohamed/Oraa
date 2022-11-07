<div>
    @foreach ($soustaches as $soustache)
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" wire:click="set_value" wire:model="is_checked" value="{{$soustache}}">
            <label class="form-check-label" for="flexSwitchCheckDefault">{{ $soustache->nom }}</label>
        </div>
        Show value {{$is_checked->id}}
    @endforeach
</div>
