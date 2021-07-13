<div class="py-2 px-2">
    <div class="bg-white rounded-lg shadow-md p-5">
        <div class="grid grid-cols-3 mb-2">
            <div class="text-xl">{{ __('Users') }}</div>
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

        <table class="table w-full mt-3">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">
                        <a href="#" wire:click="sortBy('name')">
                            <div class="flex items-center">
                                <div>Name</div>
                                <x-icon-sort sortField="name" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                            </div>
                        </a>
                    </th>
                    <th class="py-3 px-6 text-left">
                        <a href="#" wire:click="sortBy('email')">
                            <div class="flex items-center">
                                <div>Email</div>
                                <x-icon-sort sortField="email" :sort-by="$sortBy" :sort-asc="$sortAsc" />
                            </div>
                        </a>
                    </th>
                    <th class="py-3 px-6 text-center">Verified</th>
                    <th class="py-3 px-6 text-center">Role</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($data as $item)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            {{ $item->name }}
                        </td>
                        <td class="py-3 px-6 text-left">
                            {{ $item->email }}
                        </td>
                        <td class="py-3 px-6 text-center">
                            {{ $item->emai_verified_at }}
                        </td>
                        <td class="py-3 px-6 text-center">
                            @foreach ($item->roles as $role )
                            <span
                                class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">{{ $role->title }}</span>
                            @endforeach
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center">
                                <x-edit-button component='user-manager.users-child' id="{{ $item->id }}"/>
                                <x-delete-button component='user-manager.users-child' id="{{ $item->id }}"/>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->links() }}
    </div>
    @livewire('user-manager.users-child')
</div>
