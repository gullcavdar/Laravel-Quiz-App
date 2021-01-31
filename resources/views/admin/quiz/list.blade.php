<x-app-layout>
    <x-slot name="header">Quizler</x-slot>


    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{route('quizzes.create')}}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i>Quiz
                    Oluştur</a>
            </h5>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, labore.
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Quiz</th>
            <th>Durum</th>
            <th>Bitiş Tarihi</th>
            <th>İşlemler</th>
        </tr>
        </thead>
        <tbody>
        @foreach($quizzes as $quiz)
            <tr>
                <td>{{$quiz->title}}</td>
                <td>{{$quiz->status}}</td>
                <td>{{$quiz->finished_at}}</td>
                <td>
                    <a href="" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a>
                    <a href="" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{$quizzes->links()}}

</x-app-layout>
