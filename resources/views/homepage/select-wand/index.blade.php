@extends('layouts.homepage')

@section('title', 'Dumbledamn - Asa Seçimi')

@section('styles')
@stop

@section('content')
<div id="select-wand" class="select-wand" style='background: url("{{asset('img/homepage/ollivander-shop.jpg')}}")'>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 field-1">
                <div id="speech-bubble-field" class="img-field">
                    <img src="{{asset('img/homepage/ollivander.png')}}" alt="">
                    <div id="speech-bubble">
                        <p>Hoşgeldin <span class="badge bg-{{$user->character->school_class->color}}-color">{{ $user->name }}</span></p>
                        <p>Hogwarts doğru yola çıkmadan önce senin için en uygun asayı beraber seçelim.</p>
                        <p>Bunun için sana bir kaç soru sormama izin ver lütfen.</p>
                        <button class="next bg-{{$user->character->school_class->color}}-color rounded">Devam et</button>
                    </div>
                </div>
            </div>
            <div class="col-md-8 field-2">
                <div class="quiz-field">
                  <div id='quiz'></div>
                  <p class="alert-box">x</p>
                  <div class='button' id='next'><a href='#' class="bg-{{$user->character->school_class->color}}-color rounded">Sonraki</a></div>
                </div>
                <div class="finish-quiz-field">
                  <form action="{{url('/select-wand/submit')}}" method="post">
                    @csrf
                    {{-- <input type="hidden" name="_method" value="PUT"> --}}
                    {{-- <input type="hidden" id="id" name="id" value="{{ $user->id }}"/> --}}
                    <input type="hidden" id="preffered_core" name="preffered_core" value=""/>
                    <input type="hidden" id="status" name="status" value="Hazır"/>
                    <button class="next-page" type="submit">Devam et</button>
                  </form>
                </div>
                {{-- <a href="{{ route('get-auth-homepage') }}" class="ct-nav-link">Devam Et</a> --}}
            </div>
        </div>
    </div>
</div>

<div class="pre-loader">
    <div class="veil">
        <div class="stone"></div>
        <div class="wand"></div>
    </div>
</div>

<div class="pre-loader">
    <div class="veil">
        <div class="stone"></div>
        <div class="wand"></div>
    </div>
</div>
@stop
@section('scripts')
<script>
var rectangle = $("#speech-bubble-field");
var speechBubble = $("#speech-bubble");
$(document).ready(function () {
  setTimeout(function(){
      speechBubble.css({
          "animation-name": "expand-bounce",
          "animation-duration": "0.25s"
      });
  }, 1000);
  $('#speech-bubble-field .next').on('click', function(){
      speechBubble.css({
          "animation-name": "shrink",
          "animation-duration": "0.1s"
      });
      $('.select-wand .field-2').css({
          "animation-name": "expand-bounce",
          "animation-duration": "0.25s"
      });
  });
});

(function() {
  var questions = [{
    question: "İlk önce, boyunuzu nasıl tanımlarsınız?",
    choices: ["Ortalama", "Uzun", "Kısa", "Emin Değilim"],
    snallygasterAnswer: 3,
    jackalopeAnswer: 0,
    basiliskAnswer: 1,
    golCanavariAnswer: 2,
  }, {
    question: "Peki ya göz renginiz?",
    choices: ["Mavi", "Yeşil", "Ela", "Diğer"],
    snallygasterAnswer: 3,
    jackalopeAnswer: 1,
    basiliskAnswer: 0,
    golCanavariAnswer: 2,
  }, {
    question: "Doğum tarihiniz tek rakam mı, yoksa çift rakam mı?",
    choices: ["1-10", "11-15", "16-20", "21-31"],
    snallygasterAnswer: 0,
    jackalopeAnswer: 1,
    basiliskAnswer: 2,
    golCanavariAnswer: 3,
  }, {
    question: "Kendinle ilgili en çok gurur duyduğun şey nedir?",
    choices: ["Hayal Gücü", "Dayanıklılık", "Zeka", "İyimserlik"],
    snallygasterAnswer: 0,
    jackalopeAnswer: 3,
    basiliskAnswer: 2,
    golCanavariAnswer: 1,
  }, {
    question: "Issız bir yolda tek başına seyahat ederken bir yol ayrımına varıyorsun. Nereye devam edersin?",
    choices: ["Sola dönerek denize giderim", "Sağa dönerek kaleye giderim", "Ormanın içerisine doğru giderim", "Geri Dönerim"],
    snallygasterAnswer: 3,
    jackalopeAnswer: 2,
    basiliskAnswer: 0,
    golCanavariAnswer: 1,
  }, {
    question: "En büyük korkunuz nedir?",
    choices: ["Ateş", "Karanlık", "Yükseklik", "Dar Alanlar"],
    snallygasterAnswer: 2,
    jackalopeAnswer: 3,
    basiliskAnswer: 1,
    golCanavariAnswer: 0,
  }, {
    question: "Büyülü eserlerden oluşan bir sandık içerisinden hangisini seçersin?",
    choices: ["Gümüş Hançer", "Süslü Ayna", "Işıltılı Mücevher", "Bağlı Parşömen"],
    snallygasterAnswer: 1,
    jackalopeAnswer: 0,
    basiliskAnswer: 3,
    golCanavariAnswer: 2,
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
    
    var snallygasterCorrect = 0;
    var jackalopeCorrect = 0;
    var basiliskCorrect = 0;
    var golCanavariCorrect = 0;
    for (var i = 0; i < selections.length; i++) {
      if (selections[i] === questions[i].snallygasterAnswer) {
        snallygasterCorrect++;
      }
      if (selections[i] === questions[i].jackalopeAnswer) {
        jackalopeCorrect++;
      }
      if (selections[i] === questions[i].basiliskAnswer) {
        basiliskCorrect++;
      }
      if (selections[i] === questions[i].golCanavariAnswer) {
        golCanavariCorrect++;
      }
    }

    var image="{{asset('img/homepage/wand.png')}}";
    if (snallygasterCorrect > jackalopeCorrect && snallygasterCorrect > basiliskCorrect && snallygasterCorrect > golCanavariCorrect) {
      $('#speech-bubble').text("");
      $('#speech-bubble').append('<p class="answer-field">Verdiğin cevaplara göre senin için en uygun olan asa özü: <span class="core {{$user->character->school_class->color}}-color">Snallygaster</span>.</p>');
      score.append('<div class="img-field"><img class="answer-image" src="'+image+'" /></div>');
      $('#preffered_core').val(1);
    } else if (jackalopeCorrect > basiliskCorrect && jackalopeCorrect > golCanavariCorrect) {
      $('#speech-bubble').text("");
      $('#speech-bubble').append('<p class="answer-field">Verdiğin cevaplara göre senin için en uygun olan asa özü: <span class="core {{$user->character->school_class->color}}-color">Jackalope</span>.</p>');
      score.append('<div class="img-field"><img class="answer-image" src="'+image+'" /></div>');
      $('#preffered_core').val(2);
    } else if (basiliskCorrect > golCanavariCorrect) {
      $('#speech-bubble').text("");
      $('#speech-bubble').append('<p class="answer-field">Verdiğin cevaplara göre senin için en uygun olan asa özü: <span class="core {{$user->character->school_class->color}}-color">Basilisk</span>.</p>');
      score.append('<div class="img-field"><img class="answer-image" src="'+image+'" /></div>');
      $('#preffered_core').val(3);
    } else {
      $('#speech-bubble').text("");
      $('#speech-bubble').append('<p class="answer-field">Verdiğin cevaplara göre senin için en uygun olan asa özü: <span class="core {{$user->character->school_class->color}}-color">Göl Canavarı</span>.</p>');
      score.append('<div class="img-field"><img class="answer-image" src="'+image+'" /></div>');
      $('#preffered_core').val(4);
    }
    speechBubble.css({
      "animation-name": "expand-bounce",
      "animation-duration": "0.25s",
    });
    return score;
  }
})();
</script>
@stop