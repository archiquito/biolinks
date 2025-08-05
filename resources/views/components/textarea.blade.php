@props(['name', 'label', 'resume'])

<div>
    {{$label}}
    <textarea {{ $attributes->class(['textarea']) }}" name="{{$name}}">{{$resume}}</textarea>
    @error($name)<span class="label"> {{ $message }} </span>@enderror
</div>