<?php

use Illuminate\Support\Facades\Storage;

function imageUploadManager($image, $slug, $path)
{
    $path       = trim($path, '/'); // e.g., 'images'
    $extension  = $image->getClientOriginalExtension();
    $image_name = $slug . '_' . time() . '_' . uniqid() . '.' . $extension;

    // Store the file in storage/app/public/{path}/
    Storage::disk('public')->putFileAs($path, $image, $image_name);


    // Return the path relative to 'storage/app/public'
    return $path . '/' . $image_name;
}


function imageUpdateManager($image, $slug, $path, $old_image)
{
    $path = 'uploads/' . trim($path, '/') . '/';
    $extension = $image->getClientOriginalExtension();
    $image_name = $path . $slug . '_' . time() . '_' . uniqid() . '.' . $extension;

    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }

    $image->move($path, $image_name);

    if (file_exists($old_image) && $old_image != 'default.png') {
        @unlink($old_image);
    }

    return $image_name;
}

function imageDeleteManager($old_image)
{
    if (file_exists($old_image) && $old_image != 'default.png') {
        @unlink($old_image);
    }
}

function imageShow($image)
{
    if ($image) {
        if (file_exists(public_path($image))) {
            return asset($image);
        } else {
            return asset('uploads/default.png');
        }
    } else {
        return asset('uploads/default.png');
    }
}

function thumbnail($product)
{
    $thumbnail = $product->images->where('is_thumbnail', 1)->first();
    if ($thumbnail) {
        return $thumbnail->image;
    } else {
        return 'uploads/default.png';
    }
}
