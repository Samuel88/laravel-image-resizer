<form wire:submit="save">
    <input type="text" name="name" id="name" wire:model="form.name">
    @error('form.name')
        <span class="error">{{ $message }}</span>
    @enderror
    <input type="text" name="price" id="price" wire:model.blur="form.price">
    @error('form.price')
        <span class="error">{{ $message }}</span>
    @enderror
    <input type="file" name="images" id="images" wire:model="form.images_tmp" multiple>
    @foreach ($form->images_tmp as $image)
        <img src="{{ $image->temporaryUrl() }}" alt="">
    @endforeach
    @error('form.images.*')
        <span class="error">{{ $message }}</span>
    @enderror
    <button type="submit">Crea</button>
</form>