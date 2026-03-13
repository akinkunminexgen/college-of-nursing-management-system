<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\SystemSetting;
use App\Models\Cardapplicant;
use App\Alert;

class SettingController extends Controller
{
    /**
     * Display system settings
     */
    public function index(): View
    {
        // Get all settings as key => value
        $settings = SystemSetting::pluck('value', 'name');

        return view('admin.system_settings', [
            'section'  => 'settings',
            'settings' => $settings
        ]);
    }

    /**
     * Update system settings
     */
    public function update(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'admission_open_date'        => 'required|date_format:Y-m-d',
            'admission_close_date'       => 'required|date_format:Y-m-d',
            'current_session'            => 'required|regex:/\d{4}\/\d{4}/',
            'late_payment_fee'           => 'required|numeric',
            'admission_payment_fee'      => 'required|numeric',
            'acceptance_payment_fee'     => 'required|numeric',
            'admission_exam_date_nursing'=> 'required|date_format:Y-m-d',
            'admission_exam_date_midwifery'=> 'required|date_format:Y-m-d',
            'registration_number'        => 'required',
            'Support_Email'              => 'required|email',
            'Domain_Email'               => [
                'required',
                'email',
                'regex:/^[\w\.\-]+@oysconme\.edu\.ng$/i'
            ],
            'Departmental_fee'           => 'required|numeric',
            'Faculty_fee'                => 'required|numeric'
        ]);

        // Convert maintenance toggle
        $validated['maintenance'] = $request->maintenance === 'on' ? 'YES' : 'NO';

        // Fetch current settings from DB
        $currentSettings = SystemSetting::pluck('value', 'name');

        $oldOpen  = $currentSettings['admission_open_date'] ?? null;
        $oldClose = $currentSettings['admission_close_date'] ?? null;

        // If open and close date both changed → update applicants
        if (
            $oldOpen !== $validated['admission_open_date'] &&
            $oldClose !== $validated['admission_close_date']
        ) {
            Cardapplicant::where('created_at', '<', $validated['admission_open_date'])
                ->update(['is_closed' => 1]);
        }

        // Update each setting safely
        foreach ($validated as $name => $value) {
            SystemSetting::where('name', $name)->update([
                'value' => $value
            ]);
        }

        return redirect()->back()
            ->with(Alert::alertMe('Settings updated successfully!', 'success'));
    }
}