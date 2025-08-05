<x-layout.app>
    <x-container class="flex flex-col h-full">
        <x-alert />
        @if(auth()->user()->photo)
        <x-avatar class="pt-5" photo="{{auth()->user()->photo}}" />
        @endif
        <h2 class="text-lg font-bold">{{ auth()->user()->name }} </h2>
        <p class="mb-2">{{auth()->user()->resume}}</p>
        <x-card title="Meus Links" class="w-150 mb-4 ">
            <div class="flex justify-center items-center gap-2 mb-4">
                <div class="badge badge-dash badge-info">
                    {{ url('/') }}/{{ auth()->user()->handler }}
                </div>
                <button
                    class="btn btn-ghost btn-xs btn-circle tooltip"
                    data-tip="Copiar link"
                    data-url="{{ url('/') }}/{{ auth()->user()->handler }}"
                    onclick="copyToClipboard(this)">
                    <x-lucide-copy class="h-4 w-4" />
                </button>
            </div>
            @if($links->isEmpty())
            <p>Nenhum link criado ainda.</p>
            @else
            <ul class="flex flex-col justify-center items-center">
                @foreach($links as $link)
                <li class="flex items-center w-full p-2 pb-4 space-x-2">
                    <div class="relative w-14 h-6 flex-shrink-0">
                        <div class="absolute left-0 top-0 @if($loop->first) invisible @endif">
                            <x-form :route="route('link.positionUp', $link->id)" patch>
                                <x-input type="hidden" name="position" value="up" />
                                <div class="tooltip" data-tip="mover para cima">
                                    <x-button class="p-0 border-0 bg-transparent rounded-full flex items-center justify-center shadow-none" type="submit">
                                        <x-lucide-arrow-up-circle class="h-6 w-6 text-gray-500 hover:text-gray-700" />
                                    </x-button>
                                </div>
                            </x-form>
                        </div>

                        <div class="absolute right-0 top-0 @if($loop->last) invisible @endif">
                            <x-form patch :route="route('link.positionDown', $link->id)">
                                <x-input type="hidden" name="position" value="down" />
                                <div class="tooltip" data-tip="mover para baixo">
                                    <x-button class="p-0 border-0 bg-transparent rounded-full flex items-center justify-center shadow-none" type="submit">
                                        <x-lucide-arrow-down-circle class="h-6 w-6 text-gray-500 hover:text-gray-700" />
                                    </x-button>
                                </div>
                            </x-form>
                        </div>
                    </div>

                    <div class="flex-grow">
                        <div class="tooltip w-full" data-tip="acessar link">
                            <a class="btn btn-primary w-full" href="{{ $link->url }}" target="_blank">{{ $link->title }}</a>
                        </div>
                        <p>{{ $link->description }}</p>
                    </div>

                    <div class="flex items-center space-x-2">
                        <div class="tooltip" data-tip="editar link">
                            <a href="{{ route('link.edit', $link->id) }}" class="flex items-center">
                                <x-lucide-edit class="h-5 w-5 text-gray-500 hover:text-gray-700" />
                            </a>
                        </div>

                        <x-form id="delete-form-{{ $link->id }}" delete :route="route('link.destroy', $link->id)">
                            <x-button
                                type="button"
                                class="p-0 border-0 bg-transparent rounded-full flex items-center justify-center shadow-none tooltip"
                                data-tip="deletar link"
                                data-form-id="delete-form-{{ $link->id }}">
                                <x-lucide-trash class="h-5 w-5 text-red-500 hover:text-red-700" />
                            </x-button>
                        </x-form>
                    </div>
                </li>
                @endforeach
            </ul>
            @endif
        </x-card>
    </x-container>
</x-layout.app>
<script>
    function copyToClipboard(button) {
        const url = button.getAttribute('data-url');
        const originalTip = button.getAttribute('data-tip');

        navigator.clipboard.writeText(url)
            .then(() => {
                // Feedback visual: muda o texto do tooltip
                button.setAttribute('data-tip', 'Copiado!');
                setTimeout(() => {
                    button.setAttribute('data-tip', originalTip);
                }, 2000); // Volta ao texto original após 2 segundos
            })
            .catch(err => {
                console.error('Falha ao copiar:', err);
                button.setAttribute('data-tip', 'Erro ao copiar');
                setTimeout(() => {
                    button.setAttribute('data-tip', originalTip);
                }, 2000);
            });
    }
</script>