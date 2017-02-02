<?php
/**
 * Created by PhpStorm.
 * User: tititoof
 * Date: 22/01/17
 * Time: 14:57
 */

namespace App\Repositories;

use App\Models\Album;
use App\Models\Picture;
use Illuminate\Http\Request;

/**
 * Class AlbumRepository
 * @package App\Repositories
 */
class AlbumRepository
{
    public function save(Request $request)
    {
        return $this->update($request, new Album);
    }

    public function update(Request $request, Album $album)
    {
        try {
            $album->name    = $request->input('name');
            $album->user_id = $request->input('user_id');
            $album->save();
            $album->pictures()->sync(explode(',', $request->input('pictures')) );
        } catch (\Exception $exception) {
            return ['success' => false, 'errors' => $exception->getMessage()];
        }
        return ['success' => true, 'error' => '', 'album_id' => $album->id, 'album_name' => $album->name ];
    }

    public function getOtherPictures($pictures)
    {
        $allPictures    = Picture::All();
        $otherPictures  = $allPictures->diff($pictures);
        return $otherPictures;
    }
}