@extends('layouts.todo_tempp')

@section('content')

<div class="container p-5">
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card p-3 d-flex flex-row justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Total Products</small>
                    <h4 class="fw-bold mb-0">{{ $todos->count() }}</h4>
                    
                </div>
                <div class="rounded-circle d-flex align-items-center justify-content-center" style="width:50px; height:50px; background-color:#2C8975;">
    <i class="bi bi-box-seam text-white fs-5"></i>
</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3 d-flex flex-row justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Total Quantity</small>
                    <h4 class="fw-bold mb-0">{{ $todos->sum('quantity') }}</h4>
                </div>
                <div class="rounded-circle d-flex align-items-center justify-content-center" style="width:50px; height:50px; background-color:#2C8975;">
                    <i class="bi bi-stack text-white fs-5"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3 d-flex flex-row justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Total Price</small>
                    <h4 class="fw-bold mb-0">₱{{ number_format($todos->sum('price'), 2) }}</h4>
                </div>
                <div class="rounded-circle d-flex align-items-center justify-content-center" style="width:50px; height:50px; background-color:#2C8975;">
                    <i class="bi bi-currency-exchange text-white fs-5"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3 d-flex flex-row justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Categories</small>
                    <h4 class="fw-bold mb-0">{{ $todos->unique('category')->count() }}</h4>
                </div>
                <div class="rounded-circle d-flex align-items-center justify-content-center" style="width:50px; height:50px; background-color:#2C8975;">
                    <i class="bi bi-grid text-white fs-5"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="m-0">Your Order List</h1>
        <button type="button" class="btn fw-semibold px-4 py-2"
            style="background-color: #6BB2A0; color: #fff; border: none;"
            data-bs-toggle="modal" data-bs-target="#addModal">
            Add New Product
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover mt-3">
            <thead style="background-color: #2C8975; color: #fff;">
                <tr>
                    <th class="text-center" style="background-color: #2C8975; color: #fff;">ID</th>
                    <th class="text-center" style="background-color: #2C8975; color: #fff;">Product Name</th>
                    <th class="text-center" style="background-color: #2C8975; color: #fff;">Category</th>
                    <th class="text-center" style="background-color: #2C8975; color: #fff;">Quantity</th>
                    <th class="text-center" style="background-color: #2C8975; color: #fff;">Price</th>
                    <th class="text-center" style="background-color: #2C8975; color: #fff;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($todos as $to_do)
                <tr>
                    <td class="text-center">{{ $to_do->id }}</td>
                    <td class="text-center">{{ $to_do->product_name }}</td>
                    <td class="text-center">{{ $to_do->category }}</td>
                    <td class="text-center">{{ $to_do->quantity }}</td>
                    <td class="text-center">{{ $to_do->price }}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm fw-semibold"
                            style="background-color:#6BB2A0; color:#fff; border:none;"
                            data-bs-toggle="modal" data-bs-target="#editModal{{ $to_do->id }}">
                            Edit
                        </button>
                        <button type="button" class="btn btn-sm fw-semibold"
                            style="background-color:#dc3545; color:#fff; border:none;"
                            data-bs-toggle="modal" data-bs-target="#deleteModal{{ $to_do->id }}">
                            Delete
                        </button>
                    </td>
                </tr>

                {{-- Edit Modal --}}
                <div class="modal fade" id="editModal{{ $to_do->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content text-dark">
                            <div class="modal-header" style="background-color:#2C8975;">
                                <h1 class="modal-title fs-5 text-white">Edit Product</h1>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/to_do/update/{{ $to_do->id }}" method="POST">
                                    @csrf
                                    <div class="mb-2">
                                        <label class="col-form-label fw-bold">Product Name:</label>
                                        <input type="text" name="product_name" value="{{ $to_do->product_name }}" class="form-control" required>
                                    </div>
                                    <div class="mb-2">
                                        <label class="col-form-label fw-bold">Category:</label>
                                        <input type="text" name="category" value="{{ $to_do->category }}" class="form-control" required>
                                    </div>
                                    <div class="mb-2">
                                        <label class="col-form-label fw-bold">Quantity:</label>
                                        <input type="text" name="quantity" value="{{ $to_do->quantity }}" class="form-control" required>
                                    </div>
                                    <div class="mb-2">
                                        <label class="col-form-label fw-bold">Price:</label>
                                        <input type="text" name="price" value="{{ $to_do->price }}" class="form-control" required>
                                    </div>
                                    <div class="modal-footer border-0 p-0">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn fw-semibold" style="background-color:#2C8975; color:#fff; padding:5px 20px;">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Delete Modal --}}
                <div class="modal fade" id="deleteModal{{ $to_do->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content text-dark">
                            <div class="modal-header" style="background-color:#1a5c4d;">
                                <h1 class="modal-title fs-5 text-white">Confirm Delete</h1>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/to_do/delete/{{ $to_do->id }}" method="POST">
                                    @csrf
                                    <p class="fs-6">Are you sure you want to delete <strong>{{ $to_do->product_name }}</strong>?</p>
                                    <div class="modal-footer border-0 p-0 mt-4">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn fw-semibold" style="background-color:#dc3545; color:#fff; padding:5px 20px;">Yes, Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Add Modal --}}
<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-dark">
            <div class="modal-header" style="background-color:#2C8975;">
                <h1 class="modal-title fs-5 text-white">Add New Product</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('add.todo') }}">
                    @csrf
                    <div class="mb-2">
                        <label class="col-form-label fw-bold">Product Name:</label>
                        <input type="text" name="product_name" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="col-form-label fw-bold">Category:</label>
                        <input type="text" name="category" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="col-form-label fw-bold">Quantity:</label>
                        <input type="text" name="quantity" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="col-form-label fw-bold">Price:</label>
                        <input type="text" name="price" class="form-control" required>
                    </div>
                    <div class="modal-footer border-0 p-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn fw-semibold" style="background-color:#2C8975; color:#fff; padding:5px 20px;">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection