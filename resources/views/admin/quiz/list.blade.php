<x-app-layout>
    <x-slot name="header">Quizler</x-slot>


    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{route('quizzes.create')}}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i>Quiz
                    Oluştur</a>
            </h5>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Quiz</th>
                    <th>Soru Sayısı</th>
                    <th>Durum</th>
                    <th>Bitiş Tarihi</th>
                    <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($quizzes as $quiz)
                    <tr>
                        <td>{{$quiz->title}}</td>
                        <td>{{$quiz->questions_count}}</td>
                        <td>
                            @switch($quiz->status)
                                @case('publish')
                                <span class="badge badge-success">Aktif</span>
                                @break
                                @case('passive')
                                <span class="badge badge-danger">Pasif</span>
                                @break
                                @case('draft')
                                <span class="badge badge-warning">Taslak</span>
                                @break
                            @endswitch
                        </td>
                        <td>
                            <span
                                title="{{$quiz->finished_at}}">{{$quiz->finished_at ? $quiz->finished_at->diffForHumans() : '-'}}
                            </span>
                        </td>
                        <td>
                            <a href="{{route('questions.index', $quiz->id)}}" class="btn btn-sm btn-warning">
                                <i class="fas fa-question"></i></a>
                            <a href="{{route('quizzes.edit', $quiz->id)}}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pen"></i></a>
                            <a href="{{route('quizzes.destroy', $quiz->id)}}" class="btn btn-sm btn-danger">
                                <i class="fas fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


    {{$quizzes->links()}}

</x-app-layout>
