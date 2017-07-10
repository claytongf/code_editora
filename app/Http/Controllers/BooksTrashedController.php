<?php

namespace CodePub\Http\Controllers;

use CodePub\Criteria\FindOnlyTrashedCriteria;
use CodePub\Models\Book;
use CodePub\Repositories\BookRepository;
use Illuminate\Http\Request;

class BooksTrashedController extends Controller
{
    /**
     * @var BookRepository
     */
    private $repository;

    /**
     * BooksController constructor.
     * @param BookRepository $repository
     */
    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $books = $this->repository->onlyTrashed()->paginate(15);
        return view('trashed.books.index', compact('books', 'search'));
    }

    public function show($id){
        $this->repository->onlyTrashed();
        $book = $this->repository->find($id);

        return view('trashed.books.show', compact('book'));
    }

    public function update(Request $request, $id){
        $this->repository->onlyTrashed();
        $this->repository->restore($id);

        $url = $request->get('redirect_to', route('trashed.books.index'));
        $request->session()->flash('message', 'Livro restaurado com sucesso.');

        return redirect()->to($url);
    }
}
