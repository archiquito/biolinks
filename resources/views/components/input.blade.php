@props(['name', 'label'=>null])

<div>
    {{$label}}

    <input {{ $attributes->class(['input']) }}" name="{{$name}}" />
    @error($name)<span class="label"> {{ $message }} </span>@enderror
</div>