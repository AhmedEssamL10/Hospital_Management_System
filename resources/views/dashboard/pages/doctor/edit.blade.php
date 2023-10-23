<!-- Modal -->
<div class="modal fade " id="edit{{ $doctor->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Doctor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
                {{ method_field('patch') }}
                @csrf
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="en_name" placeholder="En Name"
                            aria-label="Username" value="{{ old('en_name') ?? $doctor->en_name }}">
                    </div>

                    @error('en_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="ar_name" placeholder="Ar Name"
                            value="{{ old('en_name') ?? $doctor->ar_name }}">
                    </div>

                    @error('ar_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email"
                            aria-label="Username" value="{{ old('email') ?? $doctor->email }}">
                    </div>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="price" placeholder="Price"
                            aria-label="Username" value="{{ old('price') ?? $doctor->price }}">
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
                                <option @selected($doctor->section_id == $section->id) value="{{ $section->id }}">{{ $section->name }}
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
                            <option @selected($doctor->status == 1) value="1">Active</option>
                            <option @selected($doctor->status == 0) value="0">Not Active</option>
                        </select>

                    </div>
                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="phone" placeholder="Phone"
                            aria-label="Username" value="{{ old('phone') ?? $doctor->phone }}">
                    </div>
                    @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    {{-- <div class="mb-3">
                        <img src="{{ asset('images/product/' . $product->image) }}" style="width: 20%" alt="">
                        <input class="form-control" type="file" id="formFile" name="image"
                            value="{{ old('image') ?? $product->image }}">
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">update</button>
                </div>
            </form>
        </div>
    </div>
</div>
