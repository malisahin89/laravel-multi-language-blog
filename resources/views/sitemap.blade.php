<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($posts as $post)
        @php
            $translation = $post->translations->first();
        @endphp
        @if ($translation)
            <url>
                <loc> {{ route('frontend.post.show', ['lang' => $translation->language_slug, 'slug' => $translation->slug]) }} </loc>
                <lastmod>{{ $translation->updated_at->toAtomString() }}</lastmod>
                <priority>0.8</priority>
                <changefreq>weekly</changefreq>
            </url>
        @endif
    @endforeach

    @foreach ($categories as $category)
        <url>
            <loc>{{ route('frontend.category', ['lang' => $category->language_slug, 'slug' => $category->slug]) }}</loc>
            <priority>0.7</priority>
            <changefreq>monthly</changefreq>
        </url>
    @endforeach

    @foreach ($tags as $tag)
        <url>
            <loc>{{ route('frontend.tag', ['lang' => $tag->language_slug, 'slug' => $tag->slug]) }}</loc>
            <priority>0.5</priority>
            <changefreq>monthly</changefreq>
        </url>
    @endforeach
</urlset>
