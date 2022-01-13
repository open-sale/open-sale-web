<?php


if (!function_exists('uploads_path')) {
    /**
     * Generate an asset path for the uploads files.
     *
     * @return string
     */
    function uploads_path($path = '')
    {
        return asset('uploads/' . $path);
    }
}

if (!function_exists('json_success')) {
    /**
     * Get success json response
     *
     * @return \Illuminate\Http\JsonResponse
     */
    function json_success($data = [])
    {
        return response()->json(['success' => true, 'data' => $data]);
    }
}
