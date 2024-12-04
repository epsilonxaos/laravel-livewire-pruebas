<div>
    <h1>{{ $mode === 'create' ? 'Crear recurso' : 'Editar recurso' }}</h1>

    <form wire:submit.prevent="save">

        <div>
            <label for="name">Nombre:</label>
            <input type="text" id="name" wire:model="formData.name" />
            @error('formData.name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            @if ($mode === 'create' && $formData['cover'])
                <p>Vista previa de la imagen:</p>
                <img class="object-cover h-auto" src="{{ $formData['cover']->temporaryUrl() }}" alt="Seleccionada"
                    width="200">
            @endif

            @if ($mode === 'edit')
                <p>Vista previa de la imagen:</p>

                @if ($formData['cover'] == $originalData->cover)
                    <img class="object-cover h-auto" src="{{ asset($formData['cover']) }}" alt="Seleccionada"
                        width="200">
                @elseif ($formData['cover'] !== $originalData->cover)
                    <img class="object-cover h-auto" src="{{ $formData['cover']->temporaryUrl() }}" alt="Seleccionada"
                        width="200">
                @endif

            @endif
            <label for="cover">Cover image:</label>
            <input type="file" id="cover" wire:model="formData.cover" />
            @error('formData.cover')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="description">Descripción:</label>
            <textarea id="description" wire:model="formData.description"></textarea>
            @error('formData.description')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="address">Direccion:</label>
            <input type="text" id="address" wire:model="formData.address" />
            @error('formData.address')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="phone">Telefono:</label>
            <input type="number" id="phone" wire:model="formData.phone" />
            @error('formData.phone')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" wire:model="formData.email" />
            @error('formData.email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">
            {{ $mode === 'create' ? 'Crear' : 'Actualizar' }}
        </button>

    </form>
</div>
