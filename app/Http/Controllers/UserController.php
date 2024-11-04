<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{

    public function getCapitalizedNames()
    {
        $names = json_decode(File::get(storage_path('names.json')), true);

        $capitalizedNames = array_map('ucwords', $names);

        return response()->json($capitalizedNames);
    }

    public function validateUser(Request $request)
    {
        $email = $request->input('email');
        $phone = $request->input('phone');

        // Load the JSON file with the full path
        $jsonFilePath = storage_path('users.json');

        if (!file_exists($jsonFilePath)) {
            return response()->json(['error' => 'JSON file not found'], 404);
        }

        $jsonData = file_get_contents($jsonFilePath);
        $users = json_decode($jsonData, true);

        // Check if the provided email and phone exist in the JSON data
        $exists = collect($users)->contains(function ($user) use ($email, $phone) {
            return $user['email'] === $email && $user['phone'] === $phone;
        });

        if ($exists) {
            return response()->json(['message' => 'User exists in the JSON file']);
        } else {
            return response()->json(['message' => 'User does not exist in the JSON file']);
        }
    }
}
