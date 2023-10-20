<!-- Modal -->
<div class="modal fade " id="edit{{ $section->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Section</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('sections.update', $section->id) }}" method="POST">
                {{ method_field('patch') }}
                @csrf
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="en_name" placeholder="En Name"
                            aria-label="Username" value="{{ old('en_name') ?? $section->en_name }}">
                    </div>
                    @error('en_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="ar_name" placeholder="Ar Name"
                            value="{{ old('en_name') ?? $section->ar_name }}">
                    </div>
                    @error('ar_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="status" style="padding-left: 2%">Status</label>
                    <div class="input-group mb-3">

                        <select name="status" id="status" class="form-control">
                            <option @selected($section->status == 1) value="1">Active</option>
                            <option @selected($section->status == 0) value="0">Not Active</option>
                        </select>

                    </div>
                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">update</button>
                </div>
            </form>
        </div>
    </div>
</div>