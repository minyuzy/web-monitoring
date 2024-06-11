<?php

namespace App\Http\Controllers;

use App\Helpers\DeleteFile;
use App\Helpers\UploadFile;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function UpdatePhotoProfile(Request $request)
    {

        $data_user = User::where("id", session()->get("id"))->first();


        if ($data_user->photo_profile_url != null) {
            DeleteFile::delete($data_user->photo_profile_url);
        }
        $photo_profile_url = UploadFile::upload("foto_profile", $request->file("foto_profile_input"));

        $data_user->update([
            "photo_profile_url" => $photo_profile_url
        ]);

        return redirect("profile-index");
    }
}
