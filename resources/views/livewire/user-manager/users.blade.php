<div>
    <div class="max-w-7xl mx-auto sm:px-2 lg:px-4">
        <div class="flex justify-between bg-white shadow items-center mb-3 px-2 py-2 mb-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
            <x-jet-button class="ml-4" wire:click="$emitTo('user-manager.users-child', 'showCreateForm');">
                {{ __('Create New') }}
            </x-jet-button>
            <input type="text" class="" wire:model.debounce.300ms="searchTerm" />
        </div>

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td data-label="{{ __('Name') }}">{{ $item->name }}</td>
                            <td data-label="{{ __('Email') }}">{{ $item->email }}</td>
                            <td data-label="{{ __('Action') }}" class="">
                            <a href="#" class="" mode="edit" wire:click="$emitTo('user-manager.users-child', 'showEditForm',  {{ $item->id}});"><x-icon-edit class="w-4 h-4 text-blue-700"></x-icon-edit></a>
                            <a href="#" class="" mode="delete" wire:click="$emitTo('user-manager.users-child', 'showDeleteForm',  {{ $item->id}});"><x-icon-trash class="w-4 h-4 text-red-700"></x-icon-trash></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $data->links() }}
    </div>

    @livewire('user-manager.users-child')
</div>
