<?php

namespace App\Http\Controllers\Posterminal;

use App\Http\Controllers\Controller;
use App\Models\Posterminal_themes;
use Illuminate\Http\Request;
use App\Http\Requests\Posterminal\ThemeCreateRequest;
use App\Http\Requests\Posterminal\ThemeUpdateRequest;

class ThemeController extends Controller
{
    public function show()
    {
        try {
            $query = Posterminal_themes::all();
            return response()->json(['200', $query]);
        } catch (\Throwable $th) {
            $th->methodt = 'themeCreate error';
            return response()->json(['95', $th]);
        }
    }

    public function create(ThemeCreateRequest $data)
    {
        $theme = $data->validated();
        try {
            Posterminal_themes::create($theme);
        } catch (\Throwable $th) {
            $th->methodt = 'themeCreate error';
            return response()->json(['95', $th]);
        }
        return $this->show();
    }

    public function update(ThemeUpdateRequest $data)
    {
        $theme = $data->validated();
        try {
            $themeOld = Posterminal_themes::find($theme['id']);
            $themeOld->update($theme);
        } catch (\Throwable $th) {
            $th->methodt = 'themeUpdate error';
            return response()->json(['95', $th]);
        }
        return $this->show();
    }

    public function delete(Request $data)
    {
        try {
            $theme = Posterminal_themes::find($data['id']);
            $theme->delete();
        } catch (\Throwable $th) {
            $th->methodt = 'themeDelete error';
            return response()->json(['95', $th]);
        }
        return $this->show();
    }
}
