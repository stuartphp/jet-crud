<?php

namespace App\Http\Livewire\UserManager;

use Livewire\Component;
use App\Models\Role;
use App\Models\Permission;

class RolesChild extends Component
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
    public $message ='';
    public $parent = 'user-manager.roles';
    public $set_permissions=[];

    protected $rules = [
        'item.title' => 'required',
        'item.permissions.*' => 'required'
    ];


    public function showDeleteForm($id)
    {
        $this->confirmingItemDeletion = true;
        $this->primaryKey = $id;
    }

    public function deleteItem()
    {
        Role::destroy($this->primaryKey);
        $this->confirmingItemDeletion = false;
        $this->primaryKey = '';
        $this->reset(['item']);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Deleted']);
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
        Role::create([
            'title' => $this->item['title']
        ]);
        $this->confirmingItemCreation = false;
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Created']);
        $this->emitTo($this->parent, 'refresh');
    }

    public function showEditForm(Role $item)
    {
        $this->resetErrorBag();
        $this->item = $item->load('permissions');
        // $val = $this->item['permissions'];
        // $p=[];
        // $this->item['permissions']=[];
        // foreach($val as $v)
        // {
        //     $p[]=$v->id;
        // }
        // $this->item['permissions']=$p;
        //dd($this->item['permissions']);
        // $val = $item->load('permissions');
        // foreach($val as $v)
        // {
        //     $d[]=$v->pivot_permission_id;
        // }
        // dd($d);
        $this->confirmingItemEdition = true;
    }

    public function editItem()
    {
        $this->validate();
        dd($this->item['permissions']);
        $this->item->update(['title'=>$this->item['title']])->save();
        $this->item->permissions()->sync($this->item['permissions'],[]);
        $this->confirmingItemEdition = false;
        $this->primaryKey = '';
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Updated']);
        $this->emitTo($this->parent, 'refresh');
    }

    public function render()
    {
        return view('livewire.user-manager.roles-child', ['permissions'=>Permission::orderBy('title', 'asc')->pluck('title', 'id')->toArray()]);
    }
}
