@props(['title', 'link', 'search'=>'true'])
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
