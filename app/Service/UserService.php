<?php

namespace App\Service;

use App\Exceptions\AuthException;
use App\Exceptions\GeneralExceptionCatch;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserService
{
    private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function login(array $data)
    {
        try {
            if (!Auth::attempt($data)) {
                throw new AuthException('Login invalid', 403);
            }
            $token = $this->request->user()->createToken('')->plainTextToken;
            return ['token' => $token];
        } catch (\Exception $e) {
            throw new GeneralExceptionCatch('Erro, login!', 400);
        }
    }

    public function store(array $data)
    {
        try {
            $data['password'] = Hash::make($data['password']);
            User::create($data);

            return new GeneralResource(['message' => 'success']);
        } catch (\Exception $e) {
            throw new GeneralExceptionCatch('Error, create', 400);
        }
    }

    public function show()
    {
        try {
            $user = User::find(auth()->user()->id)->first();
            return new UserResource($user);
        } catch (\Exception $e) {
            throw new GeneralExceptionCatch('Error, show', 400);
        }
    }

    public function update(array $data)
    {
        try {
            $user = auth()->user();
            if (Hash::check($data['password'], $user->password)) {
                $data['password'] = $user->password;
                User::where('id', $user->id)->update($data);
                return new GeneralResource(['message' => 'success']);
            }
        } catch (\Exception $e) {
            throw new GeneralExceptionCatch('Error, update', 400);
        }
    }
    public function destroy()
    {
        try {
            User::where('id', auth()->user()->id)->delete();
            return new GeneralResource(['message' => 'success']);
        } catch (\Exception $e) {
            throw new GeneralExceptionCatch('Error, delete', 400);
        }
    }
}
