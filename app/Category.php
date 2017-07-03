<?php

namespace App;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements TableInterface
{
    protected $fillable = [
        'name'
    ];

    public function Books(){
        return $this->hasMany('App\Book');
    }

    /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ['ID', 'Nome'];
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
            case 'Nome':
                return $this->name;
        }
        return $this->$header;
    }
}
