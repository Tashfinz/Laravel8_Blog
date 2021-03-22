@component('mail::message')
# Your Post was liked

{{ $liker->name }} liked one of your posts liked one of your posts

@component('mail::button', ['url' => route('posts.show', $post)])
    View Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
