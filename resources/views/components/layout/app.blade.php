<!DOCTYPE html>
<html lang="{{config('app.locale')}}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/src/style.css" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <title>{{config('app.name')}}</title>
</head>

<body class="bg-slate-900 text-slate-50 h-full">
    <x-header />
    {{$slot}}
    <div class="toast toast-end toast-top z-50 hidden shadow-lg" id="delete-toast">
        <div class="alert alert-warning">
            <div class="flex flex-col md:flex-row gap-4 w-full justify-between items-center">
                <span>Tem certeza que deseja excluir este link?</span>
                <div class="flex gap-2">
                    <button class="btn btn-sm btn-outline" id="confirm-delete-btn">Sim, excluir</button>
                    <button class="btn btn-sm btn-ghost" id="cancel-delete-btn">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toast = document.getElementById('delete-toast');
            const confirmBtn = document.getElementById('confirm-delete-btn');
            const cancelBtn = document.getElementById('cancel-delete-btn');
            let currentForm = null;

            document.querySelectorAll('[data-form-id]').forEach(button => {
                button.addEventListener('click', (event) => {
                    event.preventDefault();

                    const formId = button.getAttribute('data-form-id');
                    currentForm = document.getElementById(formId);

                    toast.classList.remove('hidden');
                });
            });


            confirmBtn.addEventListener('click', () => {
                if (currentForm) {

                    currentForm.submit();
                }

                toast.classList.add('hidden');
            });


            cancelBtn.addEventListener('click', () => {
                currentForm = null;
                toast.classList.add('hidden');
            });
        });
    </script>
</body>

</html>