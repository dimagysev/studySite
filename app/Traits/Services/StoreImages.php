<?php


namespace App\Traits\Services;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/**
 * Trait StoreImages
 * @package App\Traits\Services
 * @property UploadedFile $image
 * @property int $minHeight
 * @property int $minWidth
 * @property int $maxHeight
 * @property int $maxWidth
 * @property Model $model
 */
trait StoreImages
{
    protected $minHeight;
    protected $minWidth;
    protected $maxHeight;
    protected $maxWidth;
    protected $image;
    protected $model;

    /**
     * @return string
     */
    public function storeMin() : string
    {
        return $this->storeImg($this->minWidth, $this->minHeight);
    }

    public function storeMax() :string
    {
        return $this->storeImg($this->maxWidth, $this->maxHeight);
    }

    public function storeOriginal() :string
    {
        return $this->storeImg();
    }

    protected function storeImg(?int $width = null, ?int $height = null) : string
    {
        $imageName = ($width && $height)
            ? $width. 'x' . $height . '-' . $this->image->getClientOriginalName()
            : $this->image->getClientOriginalName();
        $savePath = config('settings.THEME').'/images/' . $this->model->getTable() . '/' . $imageName;
        ($width && $height)
            ? Image::make($this->image)->resize($width, $height)->save($savePath)
            : Image::make($this->image)->save($savePath);
        return $imageName;
    }

}
