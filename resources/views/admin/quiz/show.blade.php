<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>

    <div class="card">
        <div class="card-body">
            <div class="card-text">
                <div class="row">
                    <h5 class="card-title float-left">
                        <a href="{{route('quizzes.index')}}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-arrow-left"></i>
                            Quizlere Dön
                        </a>
                    </h5>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Soru Sayısı
                            <span class="badge badge-primary badge-pill">{{$quiz->questions_count}}</span>
                        </li> 
                        @if($quiz->details)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Katılımcı Sayısı
                                <span class="badge badge-primary badge-pill">{{$quiz->details["join_count"]}} </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Ortalama Puan
                                <span class="badge badge-primary badge-pill">{{$quiz->details["avarage"]}} </span>
                            </li>
                        @endif
                        </ul>
                        @if(count($quiz->topTen)>0)
                        <div class="card mt-3">
                            <div class="card-body">
                                <h5 class="card-title">İlk 10</h5>
                                <ul class="list-group">
                                    @foreach($quiz->topTen as $result)
                                    <li class="list-group-item">
                                        <strong class="h6 float-left m-2">{{$loop->iteration}}.</strong>  
                                        <img src="{{$result->user->profile_photo_url}}" class="w-8 h-8 mr-2 rounded-full float-left">
                                        <span class="m-1 float-left">{{$result->user->name}}</span>
                                        <span class="badge badge-success badge-pil float-right m-1">{{$result->point}} </span>
                                    </li>
                                    @endforeach
                                </ul>                    
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="col-md-8">
                        <p>{{$quiz->description}}</p>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">Ad Soyad</th>
                                <th scope="col">Puan</th>
                                <th scope="col">Doğru</th>
                                <th scope="col">Yanlış</th>
                                </tr>
                            </thead>
                            <tbody> 
                            @foreach($quiz->results as $result)
                                <tr>
                                    <td>{{$result->user->name}}</td>
                                    <td>{{$result->point}}</td>
                                    <td>{{$result->correct}}</td>
                                    <td>{{$result->wrong}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
