@props(['title', 'link', 'search'=>'true'])
<div class="grid grid-cols-3 mb-2">
    <div class="text-xl">Users</div>
    <div>
        <a href="#" class="hover:text-indigo-500" wire:click="$emitTo('user-manager.users-child', 'showCreateForm');">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
        </a>
    </div>
    <div class="flex justify-start">
        <x-page-size class="w- h-9" />
        <x-input type="search" wire:model.debounce.300ms="searchTerm"
            class="ml-3 bg-purple-white shadow rounded border-0 h-9" placeholder="Search..." />
    </div>
</div>
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-3 px-2 sm:px-4 lg:px-6">
        <div class="flex justify-between items-center">
            <div class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $title }}
            </div>
            {{ $link }}
            <div class="flex justify-end">
                @if($search == 'true')
                <x-page-size class="w-20 h-9" />
                <x-input type="search" wire:model.debounce.300ms="searchTerm"
                    class="ml-3 bg-purple-white shadow rounded border-0 h-9" placeholder="Search..." />
                    @endif
            </div>
        </div>
</header>
