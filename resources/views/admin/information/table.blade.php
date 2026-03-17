 @forelse ($data['informations'] as $informations)
     <tr>
         <th scope="row">{{ $loop->iteration }} </th>
         <td>{{ $informations->title }} </td>
         <td>
             @if ($informations->image)
                 <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
                     data-bs-html="true"
                     data-bs-content=" <div class='card' style='width: 18rem;'>
                                                    <img src='{{ asset($img_path . $informations->image) }}' width='100' class='card-img-top' alt='...'>
                                                    <div class='card-body'> 
                                                    </div>
                                                    </div> ">
                     <img src="{{ asset($img_path . $informations->image) }}" class="img-thumbnail p-0 m-0"
                         style="width:60px;height:40px;object-fit:cover;" alt="{{ $informations->title }}">
                 </span>
             @else
                 <img src="{{ asset('no_image.jpg') }}" class="img-thumbnail p-0 m-0"
                     style="width:60px;height:40px;object-fit:cover;" alt="">
             @endif
         </td>

         <td>
             <div class="form-check form-switch">
                 <input name="status" class="form-check-input status_show_hide" type="checkbox" role="switch"
                     id="switchCheckChecked" data-id="{{ $informations->id }}"
                     {{ $informations->status == 0 ? 'checked' : '' }}>
                 <label class="form-check-label" for="switchCheckChecked"></label>
             </div>

         </td>

         <td class="d-sm-flex justify-content-around align-items-center my-1 ">
             <a href="#" data-bs-toggle="modal" data-bs-target="#view"
                 class="btn btn-sm btn-icon btn-primary-light view-information" data-id="{{ $informations->id }}"><i
                     class="ri-eye-line"></i></a>

             <a href="#" data-bs-toggle="modal" data-bs-target="#edit" data-id="{{ $informations->id }}"
                 class="btn btn-sm btn-icon btn-success-light edit-information"><i class="ri-pencil-line"></i></a>


             <form action="{{ route($base_route . 'destroy', $informations->id) }}" method="POST" class="main_form"
                 enctype="multipart/form-data">
                 @csrf
                 @method('DELETE')
                 <a class="btn btn-sm btn-icon btn-danger-light delete-confirm" data-id="}"><i
                         class="ri-delete-bin-line"></i></a>
             </form>
         </td>
     </tr>
 @empty
 @endforelse
