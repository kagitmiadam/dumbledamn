<div class="modal fade" id="lessonInfo{{ $lesson->id }}" tabindex="-1" aria-labelledby="lessonInfoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="lessonInfoLabel">
            {{ $lesson->school_grade->name }} {{ $lesson->name }}
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
              <div class="col-md-4 col-12">
                <div class="modal-image">
                    <img src="{{asset($lesson->image)}}" alt="" class="icon">
                </div>
              </div>
              <div class="col-md-8 col-12">
                <div class="content">
                  <p>{{$lesson->description}}</p>
                  <p><span class="text-underline">Sınıf:</span> {{$lesson->school_grade->name}}</p>
                  @foreach ($character_lessons->where('character_id', $user->id) as $key=>$character_lesson)
                      @if($character_lesson->count() >= 3)
                        @php $character_lesson_check = 1 @endphp
                        @if($key == 0)
                            {{$character_lesson->count()}} adet derse kayıt oldunuz. Kayıt olduğunuz dersler; 
                        @endif
                        {{$character_lesson->lesson->name}}
                      @else
                        @php $character_lesson_check = 0 @endphp
                        @if($key == 0)
                            {{$character_lesson->count()}} adet derse kayıt oldunuz. Kayıt olduğunuz dersler; 
                        @endif
                        {{$character_lesson->lesson->name}},
                      @endif
                  @endforeach
                  @if ($character_lesson_check == 1)
                      1
                  @else
                    <p>Ders seçimlerinizi düşünerek yapınız, ders seçimi yapıldıktan sonra ders değiştirme işlemi yapamazsınız.</p>
                    <form action="/lesson/submit" method="POST" class="d-flex d-center mt-3">
                        @csrf
                        <input type="text" name="character_id" id="character_id" value="{{ $user->character->id }}" hidden/>
                        <input type="text" name="lesson_id" id="lesson_id" value="{{ $lesson->id }}" hidden/>
                        <button type="submit" class="dd-btn bg-{{$user->character->school_class->color}}-color text-white
                        @foreach($character_lessons as $character_lesson) @if($character_lesson->lesson_id == $lesson->id) d-none @endif @endforeach">
                            Kayıt ol
                        </button>
                    </form>
                  @endif
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>