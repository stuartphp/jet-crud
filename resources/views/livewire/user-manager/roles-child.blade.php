<div>
    <x-confirmation-modal maxWidth="md" wire:model="confirmingItemDeletion">
        <x-slot name="title">Delete</x-slot>
        <x-slot name="content">Are you sure you want to delete this record?</x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingItemDeletion', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            <x-jet-danger-button class="ml-2" mode="delete" wire:click="deleteItem()" wire:loading.attr="disabled">
                {{ __('Delete Record') }}
            </x-jet-danger-button>
        </x-slot>
    </x-confirmation-modal>

    <x-dialog-modal maxWidth="7xl" wire:model="confirmingItemEdition">
        <x-slot name="title">
            Edit Record
        </x-slot>
        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label>Title</x-jet-label>
                <x-jet-input class="block mt-1 w-full" type="text" wire:model.defer="item.title" />
            </div>
            <div class="mt-4">
                <x-jet-label>Permissions</x-jet-label>
                <div class="grid grid-cols-4 gap-2">
                    @foreach ($permissions as $id =>$permission)
                    <label for="{{ $permission }}" class="flex items-center">
                        @if (array_search($id, array_column($item['permissions'],'id')))
                            Yes 
                        @else
                            <x-jet-checkbox id="{{ $permission }}" wire:model.defer="item.permissions" value="{{ $id }}"/>
                        @endif
                        <span class="ml-2 text-sm text-gray-600">{{ $permission }}{{ $id }}</span>
                    </label>
                    @endforeach
                </div>
                    {{-- <select wire:model.defer="item.permissions[]" id="permissions" class="form-multiselect block w-full mt-1" multiple="multiple" required>
                        @foreach($permissions as $id => $permission)
                            <option value="{{ $id }}" {{ isset($item->permissions) && $item->permissions->contains($id) ? 'selected' : '' }}>{{ $permission }}</option>
                        @endforeach
                    </select> --}}

            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingItemEdition', false)">Cancel</x-jet-secondary-button>
            <x-jet-button mode="add" wire:click="editItem()">Save</x-jet-button>
        </x-slot>
    </x-dialog-modal>

    <x-dialog-modal maxWidth="sm" wire:model="confirmingItemCreation">
        <x-slot name="title">
            Add Record
        </x-slot>
        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label>Title</x-jet-label>
                <x-jet-input class="block mt-1 w-full" type="text" wire:model.defer="item.title" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingItemCreation', false)">Cancel</x-jet-secondary-button>
            <x-jet-button mode="add" wire:click="createItem()">Save</x-jet-button>
        </x-slot>
    </x-dialog-modal>
</div>
