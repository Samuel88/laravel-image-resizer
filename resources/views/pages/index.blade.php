<x-layouts.app>
    @foreach ($pages as $page)
        <div>
            <h3>{{ $page->title }}</h3>
            <a href="{{ route('pages.edit', $page) }}">Edita</a>
            <form method="post" action="{{ route('pages.destroy', $page) }}" onsubmit="return confirm('Sei sicuro ?')">
                @csrf
                @method('DELETE')
                <button type="submit">Cancella</button>
            </form>
            <p>{{ $page->content }}</p>
            <img src="{{ $page->getFirstMediaUrl() }}" alt="">
        </div>
    @endforeach
</x-app>
