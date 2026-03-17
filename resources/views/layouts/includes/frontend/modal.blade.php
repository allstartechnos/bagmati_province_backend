 <!-- Modal -->
 {{-- @php
     $docs = documents();
 @endphp --}}

 @forelse ($documents['legal_documents'] as $document)
     <div class="modal fade" id="document-{{ $document->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-scrollable">
             <div class="modal-content">

                 <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>

                 <div class="modal-body">
                     <img src="{{ asset('images/document/' . $document->image) }}" width="100%" height="100%"
                         alt="">
                 </div>
             </div>
         </div>
     </div>
 @empty
 @endforelse

 @forelse (destinations() as $country)
     <div class="modal fade" id="destination-{{ $country->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-scrollable">
             <div class="modal-content">

                 <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>

                 <div class="modal-body">
                     <div class="service">
                         <div class="service-item bg-light rounded">
                             <div class="service-content p-4">
                                 <div class="service-content-inner">
                                     <a href="#" class="h4 mb-4 d-inline-flex text-start">
                                         <i class="{{ $country->banner }} fa-2x me-2"></i>
                                         {{ $country->title }}
                                     </a>

                                     <div class="why_us pt-0">
                                         <div class="row align-items-start">

                                             <!-- LEFT CONTENT -->
                                             <div class="col-md-12">
                                                 <img src="{{ asset('images/destination/' . $country->image) }}"
                                                     class="img-fluid rounded" alt="{{ $country->title }}">
                                                 <p> {!! $country->description !!} </p>
                                             </div>

                                             <!-- RIGHT IMAGE -->


                                         </div>
                                     </div>
                                 </div>
                             </div>

                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @empty
 @endforelse

 
 @forelse ($clients['categories'] as $document)
     <div class="modal fade" id="client-{{ $document->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-scrollable">
             <div class="modal-content">

                 <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>

                 <div class="modal-body">
                     <img src="{{ asset('images/page/' . $document->image) }}" width="100%" height="100%"
                         alt="">
                 </div>
             </div>
         </div>
     </div>
 @empty
 @endforelse
