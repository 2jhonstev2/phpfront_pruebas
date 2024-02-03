@extends('layouts.default')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Books List</h4>
                </div>
                <div class="card-body">

                    <table id="booksTable" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>title</th>
                                <th>author</th>
                                <th>category</th>
                                <th>editorial</th>
                                <th>publication date</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->authors->full_name }}</td>
                                <td>{{ $item->categories->name }}</td>
                                <td>{{ $item->editorials->name }}</td>
                                <td>{{ $item->year_publication }}</td>
                                <td><button type="button" class="btn btn-primary" onclick="editBook({{$item->id}})"><i class="fa fa-pen"></i></button></td>

                                <td>
                                    <form action="{{ route('books.destroy',$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" data-toggle="modal" data-target=".modal-books"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="" class="btn btn-info btn" data-toggle="modal" data-target="#modalBooksAdd"><i class="fa fa-plus-circle"></i> Add Book</a>
        </div>
    </div>
</div>


{{-- Modal Add or Edit --}}

<!-- Extra large modal -->

<div class="modal fade modal-books" tabindex="-1" role="dialog" aria-labelledby="modalBooks" aria-hidden="true" id="modalBooks">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title h4">Books</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="formBook" action="" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col col-12">
                        <label for="title" class="form-label">Book Title</label>
                        <input type="text" class="form-control" id="title" name='title' required>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-12">
                        <div class="form-group">
                            <label for="sort" class="control-label"> Authors </label>
                            <select class="form-control" name="author" id="author">
                                @foreach ($authors as $iAuthor)
                                    <option value="{{ $iAuthor->id }}">{{ $iAuthor->full_name }} - {{ $iAuthor->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-12">
                        <div class="form-group">
                            <label for="sort" class="control-label"> Categories </label>
                            <select class="form-control" name="category" id="category" required>
                                @foreach ($categories as $iCategory)
                                    <option value="{{ $iCategory->id }}">{{ $iCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-12">
                        <div class="form-group">
                            <label for="sort" class="control-label"> Editorials </label>
                            <select class="form-control" name="editorial" id="editorial" required>
                                @foreach ($editorials as $iEditorial)
                                    <option value="{{ $iEditorial->id }}">{{ $iEditorial->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-12">
                        <label for="title" class="form-label">Publication Year</label>
                        <input type="date" class="form-control" id="year_publication" name="year_publication" required>
                    </div>
                </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <input type="submit" class="btn btn-primary" style='display:none;' id='btnEdit' type="submit" value='Edit'>
        </div>
        </form>
      </div>
  </div>
</div>

<div class="modal fade modal-books" tabindex="-1" role="dialog" aria-labelledby="modalBooksAdd" aria-hidden="true" id="modalBooksAdd">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
  
          <div class="modal-header">
            <h5 class="modal-title h4">Books</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
              <form id="formBook" action="{{ route('books.store') }}" method="POST">
                  @csrf
                  <div class="row">
                      <div class="col col-12">
                          <label for="title" class="form-label">Book Title</label>
                          <input type="text" class="form-control" id="title" name='title' required>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col col-12">
                          <div class="form-group">
                              <label for="sort" class="control-label"> Authors </label>
                              <select class="form-control" name="author_id" id="author_id" required>
                                  @foreach ($authors as $iAuthor)
                                      <option value="{{ $iAuthor->id }}">{{ $iAuthor->full_name }} - {{ $iAuthor->last_name }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col col-12">
                          <div class="form-group">
                              <label for="sort" class="control-label"> Categories </label>
                              <select class="form-control" name="category_id" id="category_id" required>
                                  @foreach ($categories as $iCategory)
                                      <option value="{{ $iCategory->id }}">{{ $iCategory->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col col-12">
                          <div class="form-group">
                              <label for="sort" class="control-label"> Editorials </label>
                              <select class="form-control" name="editorial_id" id="editorial_id" required>
                                  @foreach ($editorials as $iEditorial)
                                      <option value="{{ $iEditorial->id }}">{{ $iEditorial->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col col-12">
                          <label for="title" class="form-label">Publication Year</label>
                          <input type="date" class="form-control" id="year_publication" name="year_publication" required>
                      </div>
                  </div>
          </div>
  
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <input type="submit" class="btn btn-primary" id='btnAdd' type="submit" value='Add Book'>
          </div>
          </form>
        </div>
    </div>
  </div>

@endsection