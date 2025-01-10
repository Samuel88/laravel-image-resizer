<form wire:submit="save">
    <input type="text" name="name" id="name" wire:model="form.name">
    @error('form.name')
        <span class="error">{{ $message }}</span>
    @enderror
    <input type="text" name="price" id="price" wire:model.blur="form.price">
    @error('form.price')
        <span class="error">{{ $message }}</span>
    @enderror
    <input type="file" name="image" id="image" wire:model="form.image">
    {{ dump($form->image) }}
    @if ($form->image)
        {{ get_class($form->image) }}
        <img src="{{ $form->image->temporaryUrl() }}">
    @endif
    @error('form.image')
        <span class="error">{{ $message }}</span>
    @enderror
    <button type="submit">Crea</button>
</form>