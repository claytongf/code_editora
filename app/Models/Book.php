<?php

namespace CodePub\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Book extends Model implements TableInterface
{
    protected $fillable = [
        'title',
        'subtitle',
        'price',
        'cat_id',
        'author_id'
    ];

    public function Category(){
        return $this->belongsTo('CodePub\Models\Category', 'cat_id');
    }

    public function Author(){
        return $this->belongsTo('CodePub\Models\User', 'author_id');
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
