@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600">{{ __('Whoops! Algo salio mal.') }}</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            
                <li>{{ 'La informacion no coincide' }}</li>
            
        </ul>
    </div>
@endif
