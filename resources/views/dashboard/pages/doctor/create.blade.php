<!-- Modal -->
<div class="modal fade " id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Section</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data">
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

                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email"
                            aria-label="Username">
                    </div>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="price" placeholder="Price"
                            aria-label="Username">
                    </div>
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="section" style="padding-left: 2%">Section</label>
                    <div class="input-group mb-3">

                        <select name="section" id="section" class="form-control">
                            <option disabled>choose section
                            </option>
                            @foreach ($sections as $section)
                                <option @selected(old('section') == $section->id) value="{{ $section->id }}">{{ $section->name }}
                                </option>
                            @endforeach


                        </select>
                    </div>
                    @error('section')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

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

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="phone" placeholder="Phone"
                            aria-label="Username">
                    </div>
                    @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    {{-- <div class="mb-3">
                        <input class="form-control" type="file" id="formFile" accept="image/*" name="image"
                            value="{{ old('image') }}">
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
