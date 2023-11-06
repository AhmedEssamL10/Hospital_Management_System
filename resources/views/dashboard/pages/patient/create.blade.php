<!-- Modal -->
<div class="modal fade " id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Patient</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('patient.store') }}" method="POST">
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
                        <input type="text" class="form-control" name="en_address" placeholder="En Address"
                            aria-label="Username">
                    </div>
                    @error('en_address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="ar_address" placeholder="Ar Address"
                            aria-label="Username">
                    </div>
                    @error('ar_address')
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
                        <input type="text" class="form-control" name="phone" placeholder="Phone"
                            aria-label="Username">
                    </div>
                    @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="national_id" placeholder="National Id"
                            aria-label="Username">
                    </div>
                    @error('national_id')
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

                    <label for="gender" style="padding-left: 2%">Gender</label>
                    <div class="input-group mb-3">

                        <select name="gender" id="gender" class="form-control">
                            <option @selected(old('gender') == 'm') value="m">Male</option>
                            <option @selected(old('gender') == 'f') value="f">Female</option>
                        </select>
                    </div>
                    @error('gender')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="blood_group" style="padding-left: 2%">Blood Group</label>
                    <div class="input-group mb-3">

                        <select name="blood_group" id="blood_group" class="form-control">
                            <option @selected(old('blood_group') == '+O') value="+O">+O</option>
                            <option @selected(old('blood_group') == '-O') value="-O">-O</option>
                            <option @selected(old('blood_group') == '-A') value="-A">-A</option>
                            <option @selected(old('blood_group') == '+A') value="+A">+A</option>
                            <option @selected(old('blood_group') == '+B') value="+B">+B</option>
                            <option @selected(old('blood_group') == '-B') value="+B">-B</option>
                            <option @selected(old('blood_group') == '-AB') value="-AB">-AB</option>
                            <option @selected(old('blood_group') == '+AB') value="+AB">+AB</option>
                        </select>
                    </div>
                    @error('blood_group')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="col">
                        <label>Birth Date</label>
                        <input class="form-control fc-datepicker" name="birth_date" placeholder="YYYY-MM-DD"
                            type="date" required>
                    </div>
                    @error('birth_date')
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
