@foreach ($pages as $page)
    <div>
        <h3>{{ $page->title }}</h3>
        <p>{{ $page->content }}</p>
        <img src="{{ $page->getFirstMediaUrl() }}" alt="">
    </div>
@endforeach