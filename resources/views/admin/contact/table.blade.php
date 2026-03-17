 @forelse ($data['contacts'] as $contacts)
     <tr>
         <th scope="row">{{ $loop->iteration }} </th>
         <td>{{ $contacts->name }} </td>
         <td>{{ Str::limit($contacts->email, 30) }} </td>
         <td>{{ $contacts->phone }} </td>
         <td>
             {{ $contacts->created_at->format('d M Y') }}
         </td>

         <td class="d-sm-flex justify-content-around align-items-center my-1 ">
             <a href="#" data-bs-toggle="modal" data-bs-target="#view"
                 class="btn btn-sm btn-icon btn-primary-light view-contact" data-id="{{ $contacts->id }}"><i
                     class="ri-eye-line"></i></a>

             {{-- <a href="#" data-bs-toggle="modal" data-bs-target="#edit" data-id="{{ $contacts->id }}"
                 class="btn btn-sm btn-icon btn-success-light edit-contact"><i class="ri-pencil-line"></i></a> --}}


             <form action="{{ route($base_route . 'destroy', $contacts->id) }}" method="POST" class="main_form"
                 enctype="multipart/form-data">
                 @csrf
                 @method('DELETE')
                 <a class="btn btn-sm btn-icon btn-danger-light delete-confirm" data-id="{{ $contacts->id }}"><i
                         class="ri-delete-bin-line"></i></a>
             </form>
         </td>
     </tr>
 @empty
 @endforelse
