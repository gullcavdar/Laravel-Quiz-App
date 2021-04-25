<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>

    <div class="card">
        <div class="card-body">
            <div class="card-text">
                <div class="row">
                    <div class="col-md-4">
                        <ul class="list-group">
                        @if($quiz->my_rank)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Sıralama
                                <span class="badge badge-primary badge-pill">{{$quiz->my_rank}}</span>
                            </li>
                        @endif
                        @if($quiz->my_result)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Puan
                                <span class="badge badge-primary badge-pill">{{$quiz->my_result->point}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Doğru / Yanlış Sayısı
                                <div class="float-right">
                                    <span class="badge badge-success badge-pill">{{$quiz->my_result->correct}} Doğru </span>
                                    <span class="badge badge-danger badge-pill">{{$quiz->my_result->wrong}} Yanlış</span>
                                </div>
                            </li>
                        @endif
                        @if($quiz->finished_at)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Son Katılım Tarihi
                                <span title="{{$quiz->finished_at}}" class="badge badge-primary badge-pill">{{$quiz->finished_at->diffForHumans()}}</span>
                            </li>
                        @endif
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
                        @if($quiz->my_result)
                        <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-info btn-block btn-sm">Quiz'i Görüntüle</a>
                        @elseif($quiz->finished_at>now())
                        <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-success btn-block btn-sm">Quiz'e Katıl</a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
