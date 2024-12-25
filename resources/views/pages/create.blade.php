<form action="{{ route('pages.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="title">Titolo</label>
    <input type="text" name="title" id="title" value="{{ old('value') }}">
    @error('title')
        {{ $message }}
    @enderror
    <label for="content">Contenuto</label>
    <textarea name="content" id="content" value="{{ old('content') }}"></textarea>
    @error('content')
        {{ $message }}
    @enderror
    <label for="image">Immagine</label>
    <input type="file" name="image" id="image" value="{{ old('image') }}">
    @error('image')
        {{ $message }}
    @enderror
    <button type="submit">Crea</button>
</form>