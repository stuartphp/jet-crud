<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\ProductCategory;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoriesChild extends Component
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
    public $parent = 'products.categories';

    public function rules(){
        return [
            'item.name' => 'required',
            'item.slug' => ['required', Rule::unique('product_categories', 'slug')->ignore($this->primaryKey)],
            'item.parent_id' => 'required',
            'item.is_active' => 'boolean',
        ];
    }

    public function validationAttributes()
    {
        return [
            'item.name' => 'Name',
            'item.slug' => 'Slug',
            'item.parent_id' => 'required',
        ];
    }

    public function render()
    {
        return view('livewire.products.categories-child',[
            'categories'=>$this->getCategories()
        ]);
    }

    public function updated($name, $value)
    {
        if($name == 'item.name')
        {
            $this->item['slug']=Str::slug($value);
        }
    }

    public function showDeleteForm($id)
    {
        $this->confirmingItemDeletion = true;
        $this->primaryKey = $id;
    }

    public function deleteItem()
    {
        ProductCategory::destroy($this->primaryKey);
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
        ProductCategory::create([
            'name' => $this->item['name'],
            'parent_id' => $this->item['parent_id'],
            'slug' => $this->item['slug'],
            'is_active' => $this->item['is_active'],
        ]);
        $this->confirmingItemCreation = false;
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Created']);
        $this->emitTo($this->parent, 'refresh');
    }

    public function showEditForm(ProductCategory $item)
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
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Updated']);
        $this->emitTo($this->parent, 'refresh');
    }

    public function getCategories()
    {
        return ProductCategory::orderBy('parent_id')->orderBy('name')->get();
    }
}
