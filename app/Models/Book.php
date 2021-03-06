<?php

namespace CodePub\Models;

use Bootstrapper\Interfaces\TableInterface;
use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model implements TableInterface
{
    use FormAccessible;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'subtitle',
        'price',
        'author_id'
    ];

    public function categories(){
        return $this->belongsToMany('CodePub\Models\Category')->withTrashed();
    }

    public function author(){
        return $this->belongsTo('CodePub\Models\User', 'author_id');
    }

    public function formCategoriesAttribute(){
        return $this->categories->pluck('id')->all();
    }

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ['ID', 'Título', 'Subtítulo', 'Autor', 'Preço'];
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
        switch ($header){
            case 'ID':
                return $this->id;
            case 'Título':
                return $this->title;
            case 'Subtítulo':
                return $this->subtitle;
            case 'Autor':
                return $this->title;
            case 'Preço':
                return $this->title;
        }
        return $this->$header;
    }
}
