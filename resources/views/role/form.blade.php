<x-app-layout>
    @section('title')
        {{ $title }} Role
    @endsection
    <div class="">
        @if ($errors)
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="p-2 mb-2 bg-red-500 text-white">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-white">
                {{ $title }} Role
            </h1>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 max-h-screen">
            <div class="bg-gray-700 p-5">
                <form action="{{ $submit }}" method="POST" class="grid grid-cols-2 gap-2">
                    @csrf
                    <div class="">
                        <label class="text-white" for="">Role Name: </label>
                        <input type="text" class="w-full" name="role_name" value="{{ @$role->role_name }}">
                    </div>

                    <div class="mt-5 col-span-2 flex gap-3 items-center">
                        <button type="submit"
                            class="py-2 px-3 border border-green-400 text-green-400 hover:bg-green-400 hover:text-white">
                            Submit
                        </button>
                        <a href="{{ route('roles.listing') }}"
                            class="py-2 px-3 border border-white text-white hover:bg-white hover:text-gray-700">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>
