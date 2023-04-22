<x-app-layout>
    @section('title')
        User Listing
    @endsection
    <div class="relative">
        {{-- toast --}}
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
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between">
            <h1 class="text-3xl font-bold text-white">
                {{ __('Users') }}
            </h1>
            <a href="{{ route('user.add') }}"
                class="border border-green-500 text-green-500 hover:bg-green-500 hover:text-white px-3 py-2 text-sm">
                Add
            </a>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 max-h-screen">
            <table class="w-full text-center">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-800">
                            #
                        </th>
                        <th
                            class="px-6 py-3 border-b border-gray-200 bg-gray-800 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                            Name
                        </th>
                        <th
                            class="px-6 py-3 border-b border-gray-200 bg-gray-800 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                            Email
                        </th>
                        <th
                            class="px-6 py-3 border-b border-gray-200 bg-gray-800 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                            Role
                        </th>
                        <th
                            class="px-6 py-3 border-b border-gray-200 bg-gray-800 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                            Created At
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-800"></th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($userListing as $key => $user)
                        @if (auth()->user()->role != 1)
                            @if ($user->role != 1)
                                <tr>
                                    <td class="px-6 py-3 border-b border-gray-200 bg-gray-800 text-white">
                                        {{ $key + 1 }}
                                    </td>
                                    <td
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-800 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                        {{ $user->name }}
                                    </td>
                                    <td
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-800 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                        {{ $user->email }}
                                    </td>
                                    <td
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-800 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                        {{ $user->get_role->role_name }}
                                    </td>
                                    <td
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-800 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                        {{ $user->created_at }}
                                    </td>
                                    <td class="px-6 py-3 border-b border-gray-200 bg-gray-800 flex gap-3">
                                        <a href="{{ route('user.edit', $user->id) }}"
                                            class="border border-orange-500 text-orange-400 p-1 hover:bg-orange-500 hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </a>
                                        @if (auth()->user()->id != $user->id)
                                            <button
                                                class="border border-red-500 text-red-400 p-1 hover:bg-red-500 hover:text-white"
                                                onclick="deleteItem({{ $user->id }})" x-data=""
                                                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @else
                            <tr>
                                <td class="px-6 py-3 border-b border-gray-200 bg-gray-800 text-white">
                                    {{ $key + 1 }}
                                </td>
                                <td
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-800 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                    {{ $user->name }}
                                </td>
                                <td
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-800 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                    {{ $user->email }}
                                </td>
                                <td
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-800 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                    {{ $user->get_role->role_name }}
                                </td>
                                <td
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-800 text-left text-xs leading-4 font-medium text-gray-300 uppercase tracking-wider">
                                    {{ $user->created_at }}
                                </td>
                                <td class="px-6 py-3 border-b border-gray-200 bg-gray-800 flex gap-3">
                                    <a href="{{ route('user.edit', $user->id) }}"
                                        class="border border-orange-500 text-orange-400 p-1 hover:bg-orange-500 hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a>
                                    @if (auth()->user()->id != $user->id)
                                        <button
                                            class="border border-red-500 text-red-400 p-1 hover:bg-red-500 hover:text-white"
                                            onclick="deleteItem({{ $user->id }})" x-data=""
                                            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $userListing->links() }}
            </div>
        </div>
    </div>
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()">
        <form method="post" action="{{ route('user.delete') }}" class="p-6">
            @csrf
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <input type="hidden" name="id" id="userId">

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>

    <script>
        function deleteItem(id) {
            document.getElementById('userId').value = id;
        }
    </script>
</x-app-layout>
