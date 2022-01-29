<?php

use App\Exceptions\ApiException;

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

if (! function_exists('json_success')) {
    /**
     * Create a new success JSON response instance.
     *
     * @param  mixed  $data
     * @param  mixed  $message
     * @param  int  $status
     * @param  array  $headers
     * @param  int  $options
     * @return \Illuminate\Http\JsonResponse
     */
    function json_success($data, $message = 'Request done successfully.', $status = 200, array $headers = [], $options = 0)
    {
        $response = [
            'success' => true,
            'data'    => isset($data['data']) ? $data['data'] : $data,
        ];

        if (isset($data['pagination'])) {
            $response['pagination'] = $data['pagination'];
        }
        $response['message'] = $message;


        return response()->json($response, $status, $headers, $options)
                ->header('X-Date', 'Tue, 28 Dec. 2021');
    }
}

if (! function_exists('json_error')) {
    /**
     * Create a new error JSON response instance.
     *
     * @param  mixed  $errors
     * @param  mixed  $message
     * @param  int  $status
     * @param  array  $headers
     * @param  int  $options
     * @return \Illuminate\Http\JsonResponse
     */
    function json_error($message, $errors, $status = 400, array $headers = [], $options = 0)
    {
        $response = [
            'success' => false,
        ];

        $response['errors'] = $errors;

        $response['message'] = $message;

        return response()->json($response, $status, $headers, $options)
                ->header('X-Date', 'Tue, 28 Dec. 2021');
    }
}

if (! function_exists('jdd')) {
    /**
     * Create a new die and dump JSON response instance.
     *
     * @param  mixed  $data
     * @return \Illuminate\Http\JsonResponse
     */
    function jdd(...$data)
    {
        throw new ApiException($data, 'Die and Dump', 418);
    }
}
