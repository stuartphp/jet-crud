<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class Index extends Component
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

    public function sortBy($field)
    {
        if ($field == $this->sortBy) {
            $this->sortAsc = !$this->sortAsc;
        }
        $this->sortBy = $field;
    }

    public function query()
    {
        return Product::query();
    }
    public function getCategories()
    {
        return Product::pluck('name', 'id')->toArray();
    }
    public function render()
    {
        $data = $this->query()
        ->when($this->searchTerm, function($q){
            $q->where('name', 'like', '%'.$this->searchTerm.'%');
        })
        ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
        ->paginate($this->pageSize);
        return view('livewire.products.index', ['data'=>$data]);
    }
}
