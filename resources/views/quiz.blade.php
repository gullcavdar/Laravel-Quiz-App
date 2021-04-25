<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>

    <div class="card">
        <div class="card-body">
            <div class="card-text">
                <form method="POST" action="{{route('quiz.result',$quiz->slug)}}">
                @csrf
                    @foreach($quiz->questions as $question )
                        <strong>Soru {{$loop->iteration}} - </strong>{{$question->question}}

                        @if($question->image)
                            <img src="{{asset($question->image)}}" class="w-25 img-responsive">
                        @endif
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->name}}1" value="answer1" required>
                            <label class="form-check-label" for="quiz{{$question->name}}1">
                                {{$question->answer1}}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->name}}2" value="answer2" required>
                            <label class="form-check-label" for="quiz{{$question->name}}2">
                                {{$question->answer2}}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->name}}3" value="answer3" required>
                            <label class="form-check-label" for="quiz{{$question->name}}3">
                                {{$question->answer3}}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->name}}4" value="answer4" required>
                            <label class="form-check-label" for="quiz{{$question->name}}4">
                                {{$question->answer4}}
                            </label>
                        </div>
                        
                        <hr>

                    @endforeach
                    <button type="submit" class="btn btn-success btn-sm">Sınavı Bitir</button>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
