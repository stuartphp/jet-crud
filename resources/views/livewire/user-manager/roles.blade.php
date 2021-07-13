<div class="py-2 px-2">
    <div class="bg-white rounded-lg shadow-md p-5">
        <div class="grid grid-cols-3 mb-2">
            <div class="text-xl">{{ __('Roles') }}</div>
            <div>
                <a href="#" class="hover:text-indigo-500" onclick="window.location.href='{{ route('roles.create') }}'">
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


                    <table class="table w-full mt-3">
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
                                            <div class="w-4 mr-2">
                                                <a href="{{ route('roles.edit', [ $item->id ]) }}" class="text-gray-700 hover:text-indigo-400">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="w-4 mr-2">
                                                <a href="#" class="text-gray-700 hover:text-red-500" wire:click="showDeleteForm({{$item->id}});">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                {{ $data->links() }}
    </div>
            <form action="{{ route('roles.destroy', [$primaryKey]) }}" id="DelForm" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('DELETE')
    <x-confirmation-modal wire:model="confirmingItemDeletion">

        <x-slot name="title">Delete</x-slot>
        <x-slot name="content">Are you sure you want to delete this record?</x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingItemDeletion', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            <x-jet-danger-button class="ml-2" type="submit">
                {{ __('Delete Record') }}
            </x-jet-danger-button>
        </x-slot>

    </x-confirmation-modal></form>
</div>
