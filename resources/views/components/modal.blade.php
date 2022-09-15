<div>
   <div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Origin</label>
                    <input wire:model="origin" class="form-control">
                    @error('origin') <span class="alert text-danger">{{ $message }}<br/></span> @enderror
                    <label>Content</label>
                    <input wire:model="content" class="form-control">
                    @error('content') <span class="alert text-danger">{{ $message }}<br/></span> @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button wire:click="saveData" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
</div>