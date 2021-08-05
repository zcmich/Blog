<x-layout>

    @foreach ($posts as $post)
        {{--        @dd($loop)--}}
        <article>
            <h1>
{{--                        @dd($post)--}}
                <a href="/posts/{{$post->slug }}">
                    {!! $post->title !!}
                </a>
            </h1>

{{--            @dd($post)--}}
            <p>
            By <a href="/authors/{{ $post->author->username}}">{{ $post->author->name }}</a>   <a href="/categories/{{ $post->category->slug}}">{{ $post->category->name }}</a>
            </p>

            <div>
                {!! $post->excerpt !!}
            </div>
        </article>
    @endforeach

</x-layout>
