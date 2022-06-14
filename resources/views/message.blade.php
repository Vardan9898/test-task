<x-app-layout>
    <x-slot name="header">
        <div class="flex">
                <a class="nav-link" href="{{ route('telegram') }}">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Telegram</h2>
                </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a class="nav-link" href="{{ url('/updated-activity') }}">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Check Activity</h2>
                </a>
            </h2>
        </div>
    </x-slot>

    @section('content')
        <div class="flex justify-center">
            <form action="{{ url('/send-message') }}" method="post" class="mt-5 col-7 flex flex-col">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" class="form-control" placeholder="Enter your query"
                              rows="10"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    @endsection

    <div class="container">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                @yield('content')
            </div>
        </div>
    </div>
</x-app-layout>
