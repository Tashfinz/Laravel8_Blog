@props(['post' => $post])

<div class="mb-2 dark:bg-gray-800">

    <div class="flex items-center">
    <img class="image rounded-circle" src="{{asset('/storage/images/'.$post->user->image)}}" alt="profile_image" style="width: 35px;height: 35px;">
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a> <span class=" ml-2 text-gray-600
    text-sm">{{ $post->created_at->diffForHumans() }}</span>
    </div>

    <div class="flex items-center">
    <p class="mb-2">{{ $post->body }}</p>
    </div>

    <div class="flex items-center">
    @auth 
        <a class="text-blue-500" href="{{ route('posts.edit',$post->id) }}">Edit</a>
            @endauth
                @can('delete', $post)
                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="ml-1 text-red-500">Delete</button>
                    </form>
            @endcan
    </div>

    <div class="flex items-center">
    @auth 
            @if (!$post->likedBy(auth()->user()))
                <form action="{{ route('posts.likes', $post->id) }}" method="post" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">Like</button>
                </form>
            @else
                <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Unlike</button>
                </form>
            @endif
    @endauth
        <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
    </div>

</div>
