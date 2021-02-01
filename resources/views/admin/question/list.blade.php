<x-app-layout>
    <x-slot name="header">{{$quiz->title}} Quizine ait Sorular</x-slot>


    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{route('quizzes.create',$quiz->id)}}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i>
                    Soru Oluştur
                </a>
            </h5>
            <table class="table table-bordered table-sm">
                <thead>
                <tr>
                    <th>Soru</th>
                    <th>Fotoğraf</th>
                    <th>1. Cevap</th>
                    <th>2. Cevap</th>
                    <th>3. Cevap</th>
                    <th>4. Cevap</th>
                    <th>Doğru Cevap</th>
                    <th style="width:80px">İşlemler</th>

                </tr>
                @foreach($quiz->questions as $question)
                    <tr>
                        <td>{{$question->question}}</td>
                        <td>{{$question->image}}</td>
                        <td>{{$question->answer1}}</td>
                        <td>{{$question->answer2}}</td>
                        <td>{{$question->answer3}}</td>
                        <td>{{$question->answer4}}</td>
                        <td class="text-success">{{substr($question->correct_answer,-1)}}. Cevap</td>
                        <td>
                            <a href="{{route('quizzes.edit', $quiz->id)}}" class="btn btn-sm btn-primary">
                                <i class="fas fa-pen"></i>
                            </a>
                            <a href="{{route('quizzes.destroy', $quiz->id)}}" class="btn btn-sm btn-danger">
                                <i class="fas fa-times"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>


</x-app-layout>
