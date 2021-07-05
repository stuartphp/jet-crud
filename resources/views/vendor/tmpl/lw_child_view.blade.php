<div>
    <div class="modal" tabindex="-1" id="addModal" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-lg">
                    <i class="fa fa-save text-default"></i>&nbsp;Create new Record
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Create Record</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary btn-sm" wire:click="createItem()">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="editModal" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-lg">
                    <i class="fa fa-edit text-default"></i>&nbsp;Update
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Update Record</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-warning btn-sm" wire:click="editItem()">Update</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="delModal" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-lg">
                    <i class="fa fa-warning text-danger"></i>&nbsp;Delete
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this record?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger btn-sm" wire:click="deleteItem()">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
