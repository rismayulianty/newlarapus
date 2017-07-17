@extends('layouts.app')

@section ('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Dashboard</h2>
          </div>

          <div class="panel-body">
            Selamat Datang Di Larapus.
            <table class="table">
              <tbody>
                <tr>
                <td class="text-muted">Buku Dipinjam</td>
                <td>
                  @if($borrowLogs->count()==0)
                    Tidak Ada Buku Dipinjam
                  @endif
                  <ul>
                    @foreach($borrowLogs as $borrowLog) 
                      <li>
                      {!!Form::open(['url'=>route('member.books.return',$borrowLog->book_id),
                          'method'=>'put',
                          'class'=>'form-inline js-confirm',
                          'data-confirm'=>"Anda Yakin Hendak Mengembalikan".$borrowLog->book->title."?"
                        ])!!}

                        {{$borrowLog->book->title}}
                        {!!Form::submit('Kembalikan',['class'=>'btn btn-xs btn-default'])!!}
                        {!!Form::close()!!}
                      </li>
                    @endforeach
                  </ul>
                </td>
                </tr>
              </tbody>
            </table> 
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

