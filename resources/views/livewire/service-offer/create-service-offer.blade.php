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
                            <table class="table text-md-nowrap" id="example3">
                                <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">#</th>
                                        <th class="wd-15p border-bottom-0">Select</th>
                                        <th class="wd-15p border-bottom-0">Service Name</th>
                                        <th class="wd-20p border-bottom-0">Service Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexCheckChecked" wire:model="service"
                                                        value="{{ $service->id }}" wire:click="selectServices">
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                    </label>
                                                </div>
                                            </td>

                                            <td> {{ $service->name }}</td>
                                            <td> {{ $service->price }} $</td>
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
            <div class="col-md-6 mb-3">
                <label for="basic-url" class="form-label">Tax</label>
                <input type="number" class="form-control" wire:model='tax_value'>
            </div>
            <div class="col-md-6 mb-3 ">
                <label for="basic-url" class="form-label">Discount Value</label>
                <input type="number" class="form-control" wire:model='discount_value'>
            </div>
            <div class="card col-md-6 mb-3 ml-3" style="width: 18rem;">
                <div class="card-header">
                    Total before discount: {{ $total_before_descount }}
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Total after discount: {{ $total_before_descount - $discount_value }}
                    </li>
                    <li class="list-group-item">Tax: {{ $tax_value }}</li>
                    <li class="list-group-item">Total: {{ $total_before_descount - $discount_value + $tax_value }}</li>
                </ul>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Create</button>
    </form>
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">Offers</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example3">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">Offer Name</th>
                                    <th class="wd-15p border-bottom-0">Describtion</th>
                                    <th class="wd-20p border-bottom-0">Discount Value</th>
                                    <th class="wd-20p border-bottom-0">Tax</th>
                                    <th class="wd-20p border-bottom-0">Total</th>
                                    <th class="wd-20p border-bottom-0">Date</th>
                                    <th class="wd-20p border-bottom-0">Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($offers as $offer)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td> {{ $offer->name }}</td>
                                        <td> {{ Str::limit($offer->desc, 30, '...') }}</td>
                                        <td> {{ $offer->discount_value }}</td>
                                        <td> {{ $offer->tax_rate }}</td>
                                        <td> {{ $offer->total }}</td>
                                        <td> {{ $offer->created_at->DiffForHumans() }}</td>

                                        <td> <button class="modal-effect btn btn-sm btn-danger"
                                                wire:click="deleteOffer({{ $offer->id }})"
                                                data-effect="effect-scale"><i class="las la-trash"></i></button>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
