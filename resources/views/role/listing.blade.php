<x-app-layout>
    @section('title')
        Roles Listing
    @endsection
    <div class="">
        @if (session('error') || session('success'))
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-end">
                @if (session('error'))
                    <div class="bg-red-500 text-white p-3 rounded-md">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="bg-green-500 text-white p-3 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        @endif
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-white">
                {{ __('Roles Listing') }}
            </h1>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 max-h-screen">
            <table class="w-full text-center">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-800 w-12">
                            #
                        </th>
                        <th
                            class="px-6 py-3 border-b border-gray-200 bg-gray-800 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                            Name
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-800"></th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($roles as $key => $role)
                        <tr>
                            <td class="px-6 py-3 border-b border-gray-200 bg-gray-800 text-white">
                                {{ $key + 1 }}
                            </td>
                            <td
                                class="px-6 py-3 border-b border-gray-200 bg-gray-800 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                {{ $role->role_name }}
                            </td>
                            <td class="px-6 py-3 border-b border-gray-200 bg-gray-800 flex justify-center">
                                <a href="{{ route('roles.edit', $role->id) }}"
                                    class="border border-orange-500 text-orange-400 p-1 hover:bg-orange-500 hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
