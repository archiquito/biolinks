@props([
'title',
'actions'=> null
])

<div {{ $attributes->class(['card card-border border-gray-500 w-96']) }}>
    <div class="card-body">
        <div class="card-title">{{$title}}</div>
        {{$slot}}
        <div class="card-actions justify-between pt-6 pr-4">
            {{$actions}}
        </div>
    </div>

</div>