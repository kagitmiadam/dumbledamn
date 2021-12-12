@extends('layouts.auth-homepage')

@section('title', $location->name)

@section('styles')

@endsection

@section('content')
<div id="auth-homepage" class="wrapper school">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 class="text-center">{{$location->name}}</h5>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content">
                                    @foreach ($character_lessons as $character_lesson)
                                        @if($character_lesson->lesson->location_id == $location->id)
                                            <p>{{$location->name}} dersinin {{$character_lesson->lesson->school_grade->name}} sınavına hoş geldin {{$user->name}}.</p>
                                            <div id="quiz"></div>
                                            <div class='button mt-2' id='next'><a href='#' class="bg-{{$user->character->school_class->color}}-color rounded p-2">Sonraki</a></div>
                                            <div class="finish-quiz-field">
                                                <div class="quiz-point-show"></div>
                                                <div class="quiz-desc-show"></div>
                                                <form action="{{url('/quiz/submit')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" id="quiz_point" name="quiz_point" value="0">
                                                    <input type="hidden" id="galleon" name="galleon" value="0">
                                                    <input type="hidden" id="lesson_id" name="lesson_id" value="{{$character_lesson->lesson->id}}">
                                                    <input type="hidden" id="period_id" name="period_id" value="1">
                                                    <button class="dd-btn bg-{{$user->character->school_class->color}}-color next-page" type="submit">Devam et</button>
                                                </form>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
(function() {
  var questions = [{
    question: "Severus Snape'in iksir profesörlüğü yaparken kullandığı asa hangi ağaçtan yapılmıştır?",
    choices: ["Karaağaç", "Kızılağaç", "Abanoz", "Dişbudak"],
    correctAnswer: 0,
  }, {
    question: "Felsefe Taşı'nda Ron Troll'ü durdurmak için ilk olarak ne kullanmıştır?",
    choices: ["Ayakakbı", "Maşrapa", "Demir Boru", "Asa"],
    correctAnswer: 2,
  }, {
    question: "Harry, Ron ve Hermione'nin katıldığı Ölüm Günü Partisi'ne katılan 'Dertli Dul', Nick'e göre nereden gelmiştir?",
    choices: ["Kent", "Londra", "Nottingham", "Bournemoth"],
    correctAnswer: 2,
  }, {
    question: "Azkaban Tutsağı'nda Harry Hogsmeade'e gidemediği dönemde, Hermione ve Ron'un ona getirdiği yiyeceklerden ilk önce hangisini yemiştir?",
    choices: ["Şeker Sinekler", "Biber Şeytancıkları", "Kazan Pastası", "Kaymak Nugat Topları"],
    correctAnswer: 1,
  }, {
    question: "Ginny'nin, abilerinin şaka dükkânından aldığı Pigme Pofuduğun adı nedir?",
    choices: ["Hugo", "Barry", "Craig", "Arnold"],
    correctAnswer: 3,
  },{
    question: "Melez Prens kitabında Romilda Vane, Ginny'ye Harry hakkında ne sormuştur?",
    choices: ["Gözlüksüz kör sıçan gibi olup olmadığını", "Yara izine dokununca acıyıp acımadığını", "Gerçekten Hipogrif dövmesi olup olmadığını", "Gerçekten seçilmiş kişi olup olmadığını"],
    correctAnswer: 2,
  }, {
    question: "Gamp'ın temel yasasında belirtilen kaç istisnai durum vardır?",
    choices: ["3", "4", "5", "7"],
    correctAnswer: 0,
  }, {
    question: "422. Quidditch Kupası hangi skor ile sonuçlanmıştır?",
    choices: ["170-160", "180-170", "150-170", "180-190"],
    correctAnswer: 0,
  }, {
    question: "Severus Snape'in ebeveynlerinin isimleri nelerdir?",
    choices: ["Tobias ve Eileen Prince", "Tobias ve Ellen Prince", "Tom ve Ethel Prince", "Toby ve Eileen Prince"],
    correctAnswer: 0,
  }, {
    question: "İlk Muggle-Doğumlu sihir bakanını protesto etmek için bakanın makamını erken terk ettiği söylenen Malfoy aile üyesi kimdir?",
    choices: ["Septimus", "Nicholas", "Armand", "Abraxas"],
    correctAnswer: 3,
  },];
  
  var questionCounter = 0;
  var selections = [];
  var quiz = $('#quiz');
  
  displayNext();
  
  $('#next').on('click', function (e) {
    e.preventDefault();
    
    if(quiz.is(':animated')) {        
      return false;
    }
    choose();
    
    if (isNaN(selections[questionCounter])) {
      $('.alert-box').text('Lütfen seçim yapın.');
    } else {
      questionCounter++;
      displayNext();
    }
  });
  
  $('.button').on('mouseenter', function () {
    $(this).addClass('active');
  });
  $('.button').on('mouseleave', function () {
    $(this).removeClass('active');
  });
  
  function createQuestionElement(index) {
    var qElement = $('<div>', {
      id: 'question'
    });
    
    var header = $('<h2>Soru ' + (index + 1) + ':</h2>');
    qElement.append(header);
    
    var question = $('<p>').append(questions[index].question);
    qElement.append(question);
    
    var radioButtons = createRadios(index);
    qElement.append(radioButtons);
    
    return qElement;
  }
  
  function createRadios(index) {
    var radioList = $('<ul>');
    var item;
    var input = '';
    for (var i = 0; i < questions[index].choices.length; i++) {
      item = $('<li>');
      input = '<input type="radio" name="answer" value=' + i + ' />';
      input += questions[index].choices[i];
      item.append(input);
      radioList.append(item);
    }
    return radioList;
  }
  
  function choose() {
    selections[questionCounter] = +$('input[name="answer"]:checked').val();
  }
  
  function displayNext() {
    $('.alert-box').text('');
    quiz.fadeOut(function() {
      $('#question').remove();
      
      if(questionCounter < questions.length){
        var nextQuestion = createQuestionElement(questionCounter);
        quiz.append(nextQuestion).fadeIn();
        if (!(isNaN(selections[questionCounter]))) {
          $('input[value='+selections[questionCounter]+']').prop('checked', true);
        }
      } else {
        var scoreElem = displayScore();
        quiz.append(scoreElem).fadeIn();
        $('#next').hide();
      }
    });
  }
  
  function displayScore() {
    var score = $('<p>',{id: 'question'});
    var speechbubble = $('#speech-bubble');
    $('.finish-quiz-field').addClass('active');
    
    var correntAnswerCount = 0;
    for (var i = 0; i < selections.length; i++) {
      if (selections[i] === questions[i].correctAnswer) {
        correntAnswerCount++;
      }
    }

    $('.quiz-point-show').text("Sınavdan, "+correntAnswerCount*10+" aldın.");
    $('.quiz-desc-show').text("Binana, "+correntAnswerCount*10+" puan kazandırdın ve "+correntAnswerCount*10+" galleon kazandın.");
    $('#quiz_point').val(correntAnswerCount*10);
    $('#galleon').val(correntAnswerCount*10);
    return score;
  }
})();
</script>
@endsection