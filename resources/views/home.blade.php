@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
        Home
        @auth
            <div class="card-body mt-10">
                @if(Auth::user()->image)
                <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->image)}}" alt="profile_image" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
                @endif
            
                <form action="{{ route ('home') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="image">
                    <input type="submit" value="Upload" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                </form>
            </div>
        @endauth
        </div>

    </div>
@endsection  