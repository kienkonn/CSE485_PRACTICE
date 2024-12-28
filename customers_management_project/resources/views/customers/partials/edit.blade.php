<div class="modal fade" id="editCustomerModal{{ $customer->id }}" tabindex="-1" aria-labelledby="editCustomerModalLabel{{ $customer->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('customers.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCustomerModalLabel{{ $customer->id }}">Edit Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email{{ $customer->id }}" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email{{ $customer->id }}" name="email" value="{{ $customer->email }}" required>
                    </div>
                    
                    <!-- Account Type -->
                    <div class="mb-3">
                        <label for="account_type{{ $customer->id }}" class="form-label">Account Type</label>
                        <select class="form-select" id="account_type{{ $customer->id }}" name="account_type" required>
                            <option value="basic" {{ $customer->account_type == 'basic' ? 'selected' : '' }}>Basic</option>
                            <option value="premium" {{ $customer->account_type == 'premium' ? 'selected' : '' }}>Premium</option>
                            <option value="enterprise" {{ $customer->account_type == 'enterprise' ? 'selected' : '' }}>Enterprise</option>
                        </select>
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label for="status{{ $customer->id }}" class="form-label">Status</label>
                        <select class="form-select" id="status{{ $customer->id }}" name="status" required>
                            <option value="active" {{ $customer->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $customer->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            <option value="banned" {{ $customer->status == 'banned' ? 'selected' : '' }}>Banned</option>
                        </select>
                    </div>

                    <!-- Password Change Section -->
                    <hr>
                    <h6>Change Password</h6>
                    <div class="mb-3">
                        <label for="current_password{{ $customer->id }}" class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="current_password{{ $customer->id }}" name="current_password" placeholder="Enter current password">
                    </div>
                    <div class="mb-3">
                        <label for="new_password{{ $customer->id }}" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="new_password{{ $customer->id }}" name="new_password" placeholder="Enter new password">
                    </div>
                    <div class="mb-3">
                        <label for="new_password_confirmation{{ $customer->id }}" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" id="new_password_confirmation{{ $customer->id }}" name="new_password_confirmation" placeholder="Confirm new password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
