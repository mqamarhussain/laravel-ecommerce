<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;

use Spatie\Valuestore\Valuestore;

class SettingController extends Controller
{
    use ImageUploadTrait;

    public function index(): View
    {
        $this->authorize('access_setting');

        $section = (isset(\request()->section) && \request()->section != '') ? \request()->section : 'general';
        $setting_sections = Setting::select('section')->distinct()->pluck('section');
        $settings = Setting::whereSection($section)->get();

        return view('backend.settings.index', compact('section', 'setting_sections', 'settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $this->authorize('edit_setting');
        $data = $request->all();
        foreach ($data as $key => $val) {
            if ($key == 'site_logo')
                continue;
            Setting::where('key', $key)->update(['value' => $val]);
        }

        $image = NULL;
        if ($request->hasFile('site_logo')) {
            $image = $this->uploadImage($request->site_title, $request->site_logo, 'setting', 112, 33);
        }

        if ($image) {
            Setting::where('key', 'site_logo')->update(['value' => $image]);
        }
        // $this->generateCache();

        return redirect()->route('admin.settings.index')->with([
            'message' => 'Setting updated successfully',
            'alert-type' => 'success'
        ]);
    }

    private function generateCache()
    {
        $settings = Valuestore::make(config_path('settings.json'));

        Setting::all()->each(function ($item) use ($settings) {
            $settings->put($item->key, $item->value);
        });
    }
}
