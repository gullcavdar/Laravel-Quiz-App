<x-app-layout>
    <x-slot name="header">{{$quiz->title}} Sonucu</x-slot>

    <div class="card">
        <div class="card-body">
    <h3>Puan : <strong>{{$quiz->my_result->point}}</strong></h3>
        <div class="alert bg-light">
            <i class="fa fa-square m-1"></i> İşaretlediğin Şık <br>
            <i class="fa fa-check text-success m-1"></i> Doğru Cevap <br>
            <i class="fa fa-times text-danger m-1"></i> Doğru Cevap <br>
        </div>
            @foreach($quiz->questions as $question)
                
            @if($question->correct_answer === $question->my_answer->answer)
                <i class="fa fa-check text-success"></i>
            @else
                <i class="fa fa-times text-danger"></i>
            @endif
                <strong>Soru {{$loop->iteration}} - </strong>
                {{$question->question}}

                @if($question->image)
                    <img src="{{asset($question->image)}}" class="w-25 img-responsive">
                @endif
                <br>
                <small>Bu soruya <strong>%{{$question->true_percent}}</strong> oranında doğru cevap verildi.</small>
                <div class="form-check">
                    @if("answer1" == $question->correct_answer)
                        <i class="fa fa-check text-success"></i>
                    @elseif("answer1" == $question->my_answer->answer)
                        <i class="fa fa-square"></i>
                    @endif
                    <label class="form-check-label" for="quiz{{$question->name}}1">
                        {{$question->answer1}}
                    </label>
                </div>
                <div class="form-check">
                    @if("answer2" == $question->correct_answer)
                        <i class="fa fa-check text-success"></i>
                    @elseif("answer2" == $question->my_answer->answer)
                        <i class="fa fa-square"></i>

                    @endif
                    <label class="form-check-label" for="quiz{{$question->name}}2">
                        {{$question->answer2}}
                    </label>
                </div>
                <div class="form-check">
                    @if("answer3" == $question->correct_answer)
                        <i class="fa fa-check text-success"></i>
                    @elseif("answer3" == $question->my_answer->answer)
                        <i class="fa fa-square"></i>
                    @endif
                    <label class="form-check-label" for="quiz{{$question->name}}3">
                        {{$question->answer3}}
                    </label>
                </div>
                <div class="form-check">
                    @if("answer4" == $question->correct_answer)
                        <i class="fa fa-check text-success"></i>
                    @elseif("answer4" == $question->my_answer->answer)
                        <i class="fa fa-square"></i>
                    @endif
                    <label class="form-check-label" for="quiz{{$question->name}}4">
                        {{$question->answer4}}
                    </label>
                </div>
                
                <hr>

            @endforeach
 

        </div>
    </div>
</x-app-layout>
