@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Customer Management</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Add Customer Form -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addCustomerModal">Add Customer</button>

    <!-- Customers Table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Account Type</th>
                <th>Status</th>
                <th>Last Login</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ ucfirst($customer->account_type) }}</td>
                    <td>{{ ucfirst($customer->status) }}</td>
                    <td>{{ $customer->last_login }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editCustomerModal{{ $customer->id }}">Edit</button>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $customers->links('pagination::bootstrap-5') }}
    </div>

    <!-- Modals -->
    @include('customers.partials.add')
    @foreach($customers as $customer)
        @include('customers.partials.edit', ['customer' => $customer])
    @endforeach
</div>
@endsection
