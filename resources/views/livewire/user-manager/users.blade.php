<div>
    <x-crud-header>
        <x-slot name="title"><a href="{{ route('users-management.users') }}">{{ __('Users') }}</a></x-slot>
        <x-slot name="link"><x-secondary-button mode="add" wire:click="$emitTo('user-manager.users-child', 'showCreateForm');">Create</x-secondary-button></x-slot>
    </x-crud-header>

    <div class="overflow-x-auto">
        <div class="min-w-screen bg-gray-100 flex items-center justify-center font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <div class="bg-white shadow-md rounded my-4">
                    <table class="w-full">
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
                </div>
                {{ $data->links() }}
            </div>
        </div>
    </div>
    @livewire('user-manager.users-child')
</div>
