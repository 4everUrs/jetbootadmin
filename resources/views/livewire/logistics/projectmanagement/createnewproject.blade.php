<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('New Project') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <section class="content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">General</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Project Name</label>
                                    <input wire:model='title' type="text" id="inputName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Project Description</label>
                                    <textarea wire:model='description' id="inputDescription" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Project manager</label>
                                    <input wire:model='manager' type="text" id="inputName" class="form-control">
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Budget</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputEstimatedBudget">Estimated budget</label>
                                    <input wire:model='budget' type="number" id="inputEstimatedBudget" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputEstimatedDuration">Estimated project duration</label>
                                    <div class="input-group">
                                        <input wire:model='term' type="number" id="inputEstimatedDuration" class="form-control">
                                        <select wire:model='terms' class="form-control">
                                            <option value="">Select</option>
                                            <option value="months">Month(s)</option>
                                            <option value="years">Year(s)</option>
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <button wire:click="createProject" class="btn btn-success float-right">Create New Project</button>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
