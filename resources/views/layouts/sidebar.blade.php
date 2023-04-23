<div class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 w-[15%] h-auto">
    <div class="flex flex-col h-full">
        <div class="flex-1 flex flex-col overflow-y-auto">
            <nav class="px-2 py-4 bg-white dark:bg-gray-800 space-y-1">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="!block py-2 mb-2">
                    {{ __('Dashboard') }}
                </x-nav-link>
                <x-nav-link :href="route('user.listing')" :active="request()->routeIs('user.listing')" class="!block py-2 mb-2">
                    {{ __('Users') }}
                </x-nav-link>
                <x-nav-link :href="route('roles.listing')" :active="request()->routeIs('roles.listing')" class="!block py-2 mb-2">
                    {{ __('Roles') }}
                </x-nav-link>
                <x-nav-link :href="route('permissions.listing')" :active="request()->routeIs('permissions.listing')" class="!block py-2 mb-2">
                    {{ __('Permissions') }}
                </x-nav-link>
            </nav>
        </div>
    </div>
</div>
