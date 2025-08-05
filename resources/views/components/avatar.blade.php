@props(['photo'])

<div {{ $attributes->class(['avatar flex justify-center items-center w-full']) }}>
    <div class="w-24 rounded-full">
        <img src="storage/photos/{{ $photo }}" alt="Foto de perfil">
    </div>
</div>