<x-layouts.app>
    <form action="{{ route('pages.update', $page) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="title">Titolo</label>
        <input type="text" name="title" id="title" value="{{ old('value', $page->title) }}">
        @error('title')
            {{ $message }}
        @enderror
        <label for="content">Contenuto</label>
        <textarea name="content" id="content">{{ old('content', $page->content) }}</textarea>
        @error('content')
            {{ $message }}
        @enderror
        <label for="image">Immagine</label>
        <input type="file" name="image" id="image" value="{{ old('image', $page->getFirstMediaUrl()) }}">
        @error('image')
            {{ $message }}
        @enderror
        <button type="submit">Edita</button>
    </form>
</x-layouts.app>