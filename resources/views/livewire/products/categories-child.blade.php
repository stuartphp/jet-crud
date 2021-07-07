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
                <x-jet-label>Name</x-jet-label>
                <x-jet-input class="block mt-1 w-full" type="text" wire:model.defer="item.name" />
            </div>
            <div class="mt-4">
                <x-jet-label>Parent</x-jet-label>
                <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" wire:model.defer="item.parent_id" >
                    <option value="">{{ __('Please Select') }}</option>
                    <option value="0">{{ __('Main Category') }}</option>
                    @foreach ($categories as $cat)
                        @if ($cat->parent_id==0)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @foreach ($categories as $sub )
                                @if ($sub->parent_id == $cat->id)
                                    <option value="{{ $sub->id }}">- {{ $sub->name }}</option>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="block mt-4">
                <label for="is_active" class="flex items-center">
                    <x-jet-checkbox id="is_active" wire:model.defer="item.is_active" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Is Active') }}</span>
                </label>
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
                <x-jet-label>Name</x-jet-label>
                <x-jet-input class="block mt-1 w-full" type="text" wire:model.defer="item.name" />
            </div>
            <div class="mt-4">
                <x-jet-label>Parent</x-jet-label>
                <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" wire:model.defer="item.parent_id" >
                    <option value="">{{ __('Please Select') }}</option>
                    <option value="0">{{ __('Main Category') }}</option>
                    @foreach ($categories as $cat)
                        @if ($cat->parent_id==0)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @foreach ($categories as $sub )
                                @if ($sub->parent_id == $cat->id)
                                    <option value="{{ $sub->id }}">- {{ $sub->name }}</option>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="block mt-4">
                <label for="is_active2" class="flex items-center">
                    <x-jet-checkbox id="is_active2" wire:model.defer="item.is_active" />
                    <span class="ml-2 text-sm text-gray-800">{{ __('Is Active') }}</span>
                </label>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingItemCreation', false)">Cancel</x-jet-secondary-button>
            <x-jet-button mode="add" wire:click="createItem()">Save</x-jet-button>
        </x-slot>
    </x-dialog-modal>
</div>
