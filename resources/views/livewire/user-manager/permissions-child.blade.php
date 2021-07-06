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

    <x-dialog-modal maxWidth="sm" wire:model="confirmingItemEdition">
        <x-slot name="title">
            Edit Record
        </x-slot>
        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label>Group</x-jet-label>
                <x-jet-input class="block mt-1 w-full" type="text" wire:model.defer="item.group" />
            </div>
            <div class="mt-4">
                <x-jet-label>Name</x-jet-label>
                <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" wire:model.defer="item.name" >
                    <option value="">{{ __('Please Select') }}</option>
                    <option value="Create">Create</option>
                    <option value="Read">Read</option>
                    <option value="Update">Update</option>
                    <option value="Delete">Delete</option>
                </select>
            </div>
            <div class="mt-4">
                <x-jet-label>Code</x-jet-label>
                <x-jet-input class="block mt-1 w-full" type="text" wire:model.defer="item.code" />
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
                <x-jet-label>Group</x-jet-label>
                <x-jet-input class="block mt-1 w-full" type="text" wire:model.defer="item.group" />
            </div>
            <div class="mt-4">
                <x-jet-label>Name</x-jet-label>
                <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" wire:model.defer="item.name" >
                    <option value="">{{ __('Please Select') }}</option>
                    <option value="Create">Create</option>
                    <option value="Read">Read</option>
                    <option value="Update">Update</option>
                    <option value="Delete">Delete</option>
                </select>
            </div>
            <div class="mt-4">
                <x-jet-label>Code</x-jet-label>
                <x-jet-input class="block mt-1 w-full" type="text" wire:model.defer="item.code" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingItemCreation', false)">Cancel</x-jet-secondary-button>
            <x-jet-button mode="add" wire:click="createItem()">Save</x-jet-button>
        </x-slot>
    </x-dialog-modal>
</div>
