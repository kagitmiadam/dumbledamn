<div class="modal fade" id="allSpellInfo{{ $spell->id }}" tabindex="-1" aria-labelledby="allSpellInfoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="allSpellInfoLabel">
            {{ $spell->name }} Büyüsü
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <p>{{ $spell->description }}</p>
                    <hr>
                </div>
                <div class="col-md-6 col-12">
                    <div class="br-hr-color">
                        <p><span class="text-underline">Saldırı Gücü:</span> {{ $spell->attack_power }}</p>
                        <p><span class="text-underline">Savunma Gücü:</span> {{ $spell->defence_power }}</p>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>