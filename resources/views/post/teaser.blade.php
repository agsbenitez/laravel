<h2>
<a href="{{ route('post.show', [$post->id]) }}">
    {{ $post->title }}
</a>
</h2>
<div class="body">
    {{ Str::words($post->body, 20, '...') }}
</div>
<div class="date">
    {{ $post->created_at }}
</div>
<div class="section">
    <span class="label">Seccion:</span>
    <a href="{{ route('section.show', [$post->section()->id]) }}">
        {{ $post->section()->section }}
    </a>
</div>
<div class="tags">
    <span class="label">Tags:</span>
    @foreach ($post->tags() as $tags)
        <a href="{{ route('tag.show', [$tags->id]) }}">
            {{ $tags->tag }}
        </a>
    @endforeach
</div>