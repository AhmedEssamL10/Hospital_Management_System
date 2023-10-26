<!-- Modal -->
<div class="modal fade " id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Section</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('sections.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="en_name" placeholder="En Name"
                            aria-label="Username">
                    </div>
                    @error('en_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="ar_name" placeholder="Ar Name"
                            aria-label="Username">
                    </div>
                    @error('ar_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="row ml-1">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="en_desc">En Desc</label>
                            </div>
                            <textarea name="en_desc" id="en_desc" cols="25" rows="9">{{ old('en_desc') }}</textarea>

                        </div>

                        @error('en_desc')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="ar_desc">Ar Desc</label>
                            </div>
                            <textarea name="ar_desc" id="ar_desc" cols="25" rows="9">{{ old('ar_desc') }}</textarea>
                        </div>
                        @error('ar_desc')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <label for="status" style="padding-left: 2%">Status</label>
                    <div class="input-group mb-3">

                        <select name="status" id="status" class="form-control">
                            <option @selected(old('status') == 1) value="1">Active</option>
                            <option @selected(old('status') == 0) value="0">Not Active</option>
                        </select>
                    </div>
                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
