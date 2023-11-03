<div>
    <form wire:submit.prevent="create">
        @csrf
        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">Services</h4>
                            <i class="mdi mdi-dots-horizontal text-gray"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-md-nowrap" id="example1">
                                <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">Select</th>
                                        <th class="wd-15p border-bottom-0">Service Name</th>
                                        <th class="wd-20p border-bottom-0">Service Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexCheckChecked" wire:model="service"
                                                        value="{{ $service->id }}">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                    </label>
                                                </div>
                                            </td>
                                            <td> {{ $service->name }}</td>
                                            <td> {{ $service->price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="basic-url" class="form-label">En Name</label>
                <input type="text" class="form-control" wire:model="en_name">
            </div>
            <div class="col-md-6 mb-3">
                <label for="basic-url" class="form-label">Ar Name</label>
                <input type="text" class="form-control" wire:model="ar_name">
            </div>
            <div class="col-md-6 mb-3">
                <label for="basic-url" class="form-label">En Describtion</label>
                <input type="text" class="form-control" wire:model='en_desc'>
            </div>
            <div class="col-md-6 mb-3">
                <label for="basic-url" class="form-label">Ar Describtion</label>
                <input type="text" class="form-control" wire:model='ar_desc'>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">save</button>
    </form>

</div>
