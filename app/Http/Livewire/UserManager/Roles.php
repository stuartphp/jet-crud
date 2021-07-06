<?php

namespace App\Http\Livewire\UserManager;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Role;

class Roles extends Component
{
    use WithPagination;

    protected $listeners = ['refresh' => '$refresh'];
    public $sortBy = 'name';
    public $searchTerm='';
    public $sortAsc = true;

    public function updatedSearchTerm()
    {
        $this->resetPage();
    }

    public function render()
    {
        $data= $this->query()
            ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate(10);
        return view('livewire.user-manager.roles', ['data'=>$data]);
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
        return Role::query();
    }
}
