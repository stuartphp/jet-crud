<?php

namespace App\Http\Livewire\UserManager;

use Livewire\Component;
use App\Models\Permission;

class PermissionsChild extends Component
{
    protected $listeners = [
        'showDeleteForm',
        'showCreateForm',
        'showEditForm',
    ];
    public $confirmingItemDeletion = false;
    public $primaryKey;
    public $confirmingItemCreation = false;
    public $confirmingItemEdition = false;
    public $item;
    public $parent = 'user-manager.permissions';
    protected $rules = [
        'item.name' => 'required',
        'item.group' => 'required',
        'item.code' => 'required',
    ];

    public function render()
    {
        return view('livewire.user-manager.permissions-child');
    }
    public function showDeleteForm($id)
    {
        $this->confirmingItemDeletion = true;
        $this->primaryKey = $id;
    }

    public function deleteItem()
    {
        Permission::destroy($this->primaryKey);
        $this->confirmingItemDeletion = false;
        $this->primaryKey = '';
        $this->reset(['item']);
        $this->alert('Record Deleted');
        $this->emitTo($this->parent, 'refresh');
    }

    public function showCreateForm()
    {
        $this->confirmingItemCreation = true;
        $this->resetErrorBag();
        $this->reset(['item']);
    }

    public function createItem()
    {
        $this->validate();
        Permission::create([
            'group' => $this->item['group'],
            'name' => $this->item['name'],
            'code' => $this->item['code'],
        ]);
        $this->confirmingItemCreation = false;
        //$this->alert('Record Created');
        $this->emit('alert', ['type' => 'success', 'message' => 'Agent has been changed.']);
        $this->emitTo($this->parent, 'refresh');
    }

    public function showEditForm(Permission $item)
    {
        $this->resetErrorBag();
        $this->item = $item;
        $this->confirmingItemEdition = true;
    }

    public function editItem()
    {
        $this->validate();
        $this->item->save();
        $this->confirmingItemEdition = false;
        $this->primaryKey = '';
        $this->alert('Record Updated');
        $this->emitTo($this->parent, 'refresh');
    }

    public function alert($message, $type="success")
    {
        $this->dispatchBrowserEvent('alert', ['type' => $type,  'message' => $message]);
    }
}