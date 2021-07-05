<div>
    <div class="card">
        <div class="card-header">
            <div class="row align-items-start">
                <div class="col-9 text-lg">Users</div>
                <div class="col-1 text-end"><a href="#" wire:click="$emitTo('admin.users-child', 'showCreateForm');"><i class="fa fa-plus mt-2"></i></a></div>
                <div class="col-2"><input type="text" class="form-control form-control-sm" wire:model.debounce.300ms="searchTerm" placeholder="Search" aria-label="Search"/></div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th wire:click="sortBy('name')" class="pointer"><x-sort-icon sortField="name" :sort-by="$sortBy" :sort-asc="$sortAsc" /> Name</th>
                        <th wire:click="sortBy('email')" class="pointer"><x-sort-icon sortField="email" :sort-by="$sortBy" :sort-asc="$sortAsc" /> Email</th>
                        <th wire:click="sortBy('mobile')" class="pointer"><x-sort-icon sortField="mobile" :sort-by="$sortBy" :sort-asc="$sortAsc" /> Mobile</th>
                        <th>Is Admin</th>
                        <th class="col-1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $result)
                        <tr>
                            <td>{{ $result->name }}</td>
                            <td>{{ $result->email }}</td>
                            <td>{{ $result->mobile }}</td>
                            <td>{{ ($result->is_admin==1) ? 'Admin' : 'User' }}</td>
                            <td class="text-end">
                                <a href="#" title="Edit" wire:click="$emitTo('admin.users-child', 'showEditForm',  {{ $result->id}});"><i class="fa fa-edit text-lg text-default px-2"></i></a>
                                <a href="#" title="Delete" wire:click="$emitTo('admin.users-child', 'showDeleteForm',  {{ $result->id}});"><i class="fa fa-trash text-lg text-danger px-2"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $results->links() }}
        </div>
    </div>
    @livewire('admin.users-child')

</div>
