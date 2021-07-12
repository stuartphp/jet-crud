<?php

namespace App\Http\Livewire\Products;

use App\Http\Controllers\Admin\ProductsController;
use Livewire\Component;
use App\Models\ProductCategory;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;

    protected $listeners = ['refresh' => '$refresh'];
    public $sortBy = 'name';
    public $searchTerm='';
    public $sortAsc = true;
    public $pageSize = 10;

    public function updatedSearchTerm()
    {
        $this->resetPage();
    }
    public function updatedPageSize()
    {
        $this->resetPage();
    }

    public function render()
    {
        $data = $this->query()
            ->when($this->searchTerm, function($q){
                $q->where('name', 'like', '%'.$this->searchTerm.'%')
                    ->orWhere('slug', 'like', '%'.$this->searchTerm.'%');
            })
            ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate($this->pageSize);

        return view('livewire.products.categories', ['data'=>$data,'categories'=>$this->getCategories()]);
    }

    public function sortBy($field)
    {
        if ($field == $this->sortBy) {
            $this->sortAsc = !$this->sortAsc;
        }
        $this->sortBy = $field;
    }

    public function query()
    {
        return ProductCategory::query();
    }
    public function getCategories()
    {
        return ProductCategory::pluck('name', 'id')->toArray();
    }
}
