<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('id', 'desc')->paginate(10);
        return view('customers.index', compact('customers'));
    }

    public function store(Request $request)
{
    $request->validate([
        'email' => 'required|email|unique:customers,email',
        'status' => 'required',
        'account_type' => 'required',
    ]);

    Customer::create($request->all());

    // Điều hướng về trang danh sách với thông báo thành công
    return redirect()->route('customers.index')->with('success', 'Customer added successfully');
}


    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        // Validate the fields (email, status, account_type)
        $request->validate([
            'email' => 'required|email|unique:customers,email,' . $id,
            'status' => 'required',
            'account_type' => 'required',
            // Validate password change (optional)
            'current_password' => 'nullable|required_with:new_password|current_password_check:' . $customer->password,
            'new_password' => 'nullable|min:8|confirmed',
        ]);

        // Check if the current password matches the stored password
        if ($request->has('current_password')) {
            if (!Hash::check($request->current_password, $customer->password)) {
                return redirect()->back()->with('error', 'Current password does not match');
            }

            // Update the password if a new password is provided
            if ($request->new_password) {
                $customer->password = Hash::make($request->new_password);
            }
        }

        // Update other customer details
        $customer->update($request->except('current_password', 'new_password', 'new_password_confirmation'));

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
    }

    public function destroy($id)
    {
        Customer::destroy($id);
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully');
    }
}
