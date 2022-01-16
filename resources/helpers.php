<?php

use Illuminate\Http\Response as Response;

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
    function json_success($data = [], $status = Response::HTTP_OK)
    {
        return response()->json($data, $status);
        // return response()->json(['success' => true, 'data' => $data]);
    }
}

if (!function_exists('json_error')) {
    /**
     * Get success json response
     *
     * @return \Illuminate\Http\JsonResponse
     */
    function json_error($data = [], $status = Response::HTTP_NOT_ACCEPTABLE)
    {
        return response()->json($data, $status);
        // return response()->json(['success' => true, 'data' => $data]);
    }
}
