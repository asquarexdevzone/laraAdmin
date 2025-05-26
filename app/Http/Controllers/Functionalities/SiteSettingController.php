<?php

namespace App\Http\Controllers\Functionalities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;

class SiteSettingController extends Controller
{
    public function addSiteSettingView()
    {
        $siteSetting = SiteSetting::first();

        if ($siteSetting) {
            // Redirect to edit page if record exists
            return redirect()->route('edit.site-setting-view', $siteSetting->id);
        }

        // Otherwise, show empty form to add new site setting
        return view('admin.site-setting', compact('siteSetting'));
    }

    public function storeSiteSetting(Request $request)
    {
        SiteSetting::create($request->all());
        return redirect()->back()->with('success', 'Site Setting added successfully.');
    }

    public function editSiteSetting($id)
    {
        $siteSetting = SiteSetting::findOrFail($id);
        return view('admin.site-setting', compact('siteSetting'));
    }

    public function updateSiteSetting(Request $request, $id)
    {
        $siteSetting = SiteSetting::findOrFail($id);
        $siteSetting->update($request->all());
        return redirect()->back()->with('success', 'Site Setting updated successfully.');
    }
}