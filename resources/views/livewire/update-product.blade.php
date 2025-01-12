<form wire:submit="save">
    <button wire:click="$refresh">Test</button>
    <input type="text" name="name" id="name" wire:model="form.name">
    @error('form.name')
        <span class="error">{{ $message }}</span>
    @enderror
    <input type="text" name="price" id="price" wire:model.blur="form.price">
    @error('form.price')
        <span class="error">{{ $message }}</span>
    @enderror
    @foreach ($form->images as $image)
        <div>
            <button wire:click="removeProductImage({{ $image->id }})">Remove</button>
            <img src="{{ $image->getUrl() }}" alt="">
        </div>
    @endforeach
    <input type="file" name="images" id="images" wire:model="form.images_tmp" multiple>
    @foreach ($form->images_tmp as $image)
        <img src="{{ $image->temporaryUrl() }}" alt="">
    @endforeach
    @error('form.images.*')
        <span class="error">{{ $message }}</span>
    @enderror
    <button type="submit">Aggiorna</button>
</form>
{{--
<form wire:id="ktMJczYnGlYTZt69PcTO" wire:submit="save">
    <input type="text" name="name" id="name" wire:model="form.name">
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <input type="text" name="price" id="price" wire:model.blur="form.price">
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]-->        <div>
            <button wire:click="removeProductImage(14)">Remove</button>
            <img src="http://localhost:8000/storage/14/pingu3.jpg" alt="">
        </div>
    <!--[if ENDBLOCK]><![endif]-->
    <input type="file" name="images" id="images" wire:model="form.images_tmp" multiple>
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
    <button type="submit">Aggiorna</button>
</form>
--}}