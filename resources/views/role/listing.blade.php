<x-app-layout>
    @section('title')
        Roles Listing
    @endsection
    <div class="">
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
                            <td class="px-6 py-3 border-b border-gray-200 bg-gray-800">
                                <button
                                    class="border border-red-500 text-red-400 p-1 hover:bg-red-500 hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
