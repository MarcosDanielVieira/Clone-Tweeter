

<div class="tab-content" id="myTabContent">
  
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    
    {{-- 
      Renderizando do feed primário
    --}}
    
    @include('App.feed.publicPrimario')
    
  </div>

  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <h2>
      Feed secundário
    </h2>
  </div>

</div>