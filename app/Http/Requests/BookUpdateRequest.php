<?php

namespace CodePub\Http\Requests;

use CodePub\Repositories\BookRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BookUpdateRequest extends FormRequest
{
    /**
     * @var BookRepository
     */
    private $repository;

    /**
     * BookUpdateRequest constructor.
     * @param BookRepository $repository
     */
    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $id = (int) $this->route('book');
        if($id == 0){
            return false;
        }
        $book = $this->repository->find($id);

        return $book->author_id == Auth::user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => "required|max:255",
            'subtitle' => "required|max:255",
            'price' => "required|numeric",
        ];
    }
}
