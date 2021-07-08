<div>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-3 px-2 sm:px-4 lg:px-6">
            <div class="flex justify-between items-center">
                <div class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Roles') }}
                </div>
                <x-secondary-button mode="add" wire:click="$emitTo('user-manager.roles-child', 'showCreateForm');">
                    Create</x-secondary-button>
                <div class="flex">
                    <x-page-size />
                    <x-input type="search" wire:model.debounce.300ms="searchTerm"
                        class="ml-3 bg-purple-white shadow rounded border-0" placeholder="Search..." />
                </div>
            </div>
    </header>

    <div class="overflow-x-auto">
        <div class="min-w-screen bg-gray-100 flex items-center justify-center font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <div class="bg-white shadow-md rounded my-6">
                    <table class="table-auto w-full">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">
                                    <a href="#" wire:click="sortBy('title')">
                                        <div class="flex items-center">
                                            <div>Title</div>
                                            <x-icon-sort sortField="title" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                                        </div>
                                    </a>
                                </th>
                                <th class="py-3 px-3 text-left">
                                    Permissions
                                </th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($data as $item)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        {{ $item->title }}
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="grid lg:grid-cols-7 md:grid-cols-4 sm:grid-cols-2  gap-1">
                                        @foreach ($item->permissions as $permission)
                                            <div class="bg-purple-100 text-purple-600 py-1 px-3 rounded-full text-xs mb-3">{{ ucwords(str_replace('_', ' ',$permission->title)) }}</div>
                                        @endforeach
                                    </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            <x-edit-button component='user-manager.roles-child'
                                                id="{{ $item->id }}" />
                                            <x-delete-button component='user-manager.roles-child'
                                                id="{{ $item->id }}" />
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $data->links() }}
            </div>
        </div>
    </div>
    @livewire('user-manager.roles-child')
</div>
