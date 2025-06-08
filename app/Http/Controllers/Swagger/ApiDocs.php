<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="API Cerita",
 *      description="API Dokumentasi dengan Sanctum Bearer Token"
 * )
 * 
 * @OA\SecurityScheme(
 *     securityScheme="sanctum",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 * 
 * @OA\Server(
 *     url="http://localhost:8000/",
 *     description="Local API Server"
 * )
 * @OA\Server(
 *     url="https://capstone.andreasadi.my.id",
 *     description="Deployed API Server"
 * )
 * 
 * @OA\Security(
 *     security={{"sanctum":{}}}
 * )
 */
class ApiDocs extends Controller
{
    //
}
