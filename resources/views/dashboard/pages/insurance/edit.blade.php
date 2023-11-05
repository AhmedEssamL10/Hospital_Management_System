<!-- Modal -->
<div class="modal fade " id="edit{{ $company->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add company</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('insurance.update', $company->id) }}" method="POST">
                {{ method_field('patch') }}
                @csrf
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="en_name" placeholder="En Name"
                            aria-label="Username" value="{{ old('en_name') ?? $company->en_name }}">
                    </div>
                    @error('en_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="ar_name" placeholder="Ar Name"
                            value="{{ old('en_name') ?? $company->ar_name }}">
                    </div>
                    @error('ar_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="discount_percentage"
                            placeholder="Discount Percentage" aria-label="Username"
                            value="{{ old('discount_percentage') ?? $company->discount_percentage }}">
                    </div>
                    @error('discount_percentage')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="company_rate" placeholder="Company Rate"
                            aria-label="Username " value="{{ old('company_rate') ?? $company->company_rate }}">
                    </div>
                    @error('company_rate')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="row ml-1">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="en_note">En Desc</label>
                            </div>
                            <textarea name="en_note" id="en_note" cols="25" rows="9">{{ old('en_note') ?? $company->en_note }}</textarea>

                        </div>

                        @error('en_note')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="ar_note">Ar Desc</label>
                            </div>
                            <textarea name="ar_note" id="ar_note" cols="25" rows="9">{{ old('ar_note') ?? $company->ar_note }}</textarea>
                        </div>
                        @error('ar_note')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <label for="status" style="padding-left: 2%">Status</label>
                    <div class="input-group mb-3">

                        <select name="status" id="status" class="form-control">
                            <option @selected($company->status == 1) value="1">Active</option>
                            <option @selected($company->status == 0) value="0">Not Active</option>
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
