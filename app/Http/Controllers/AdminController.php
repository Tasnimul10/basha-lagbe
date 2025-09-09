<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.admin_login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function dashboard()
    {
        $properties = Property::with('landlord')->latest()->get();
        return view('admin.admin_dashboard', compact('properties'));
    }

    public function updatePropertyStatus(Request $request, Property $property)
    {
        $request->validate([
            'status' => ['required', 'in:pending,approved,rejected'],
        ]);

        $property->update(['status' => $request->status]);

        return back()->with('status', 'Property status updated successfully.');
    }

    public function reports()
    {
        $reports = \App\Models\Report::with(['user', 'property', 'property.landlord'])
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('admin.reports', compact('reports'));
    }

    public function updateReportStatus(Request $request, \App\Models\Report $report)
    {
        $request->validate([
            'status' => ['required', 'in:pending,reviewed,resolved'],
        ]);

        $report->update(['status' => $request->status]);

        return back()->with('status', 'Report status updated successfully.');
    }

    public function deleteReportedProperty(\App\Models\Report $report)
    {
        $property = $report->property;
        
        if ($property) {
            // Delete the property
            $property->delete();
            
            // Update report status to resolved
            $report->update(['status' => 'resolved']);
            
            return back()->with('status', 'Property deleted successfully and report resolved.');
        }
        
        return back()->with('error', 'Property not found.');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
