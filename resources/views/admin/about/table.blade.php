  <div class="accordion customized-accordion accordions-items-seperate" id="customizedAccordion">

      @foreach ($data['categories'] as $category)
          <div
              class="accordion-item custom-accordion-{{ $loop->first ? 'primary' : ($loop->iteration == 2 ? 'secondary' : 'danger') }}">
              <h2 class="accordion-header d-flex justify-content-between align-items-center"
                  id="customizedAccordion{{ $category->slug }}">

                  <button class="accordion-button flex-grow-1" type="button" data-bs-toggle="collapse"
                      data-bs-target="#customized-Accordion{{ $category->slug }}" aria-expanded="true"
                      aria-controls="customized-Accordion{{ $category->slug }}">

                      {{ $category->title }} ({{ $category->posts->count() ?? '0' }})
                      <a class="btn btn-sm px-2 pl-2 btn-primary-light">
                          Design: {{ $category->design }}
                      </a>


                  </button>
                  <form action="{{ route($base_route . 'destroy', $category->id) }}" method="POST" class="main_form">
                      @csrf
                      @method('DELETE')
                      <div class="d-flex gap-3 ms-0" style="margin-right: 30px">

                          <span class="form-check form-switch">
                              <input name="status" class="form-check-input btn-sm status_show_hide mt-2"
                                  type="checkbox" role="switch" id="switchCheckChecked" data-id="{{ $category->id }}"
                                  {{ $category->status == 0 ? 'checked' : '' }}>

                          </span>

                          <a href="#" data-bs-toggle="modal" data-bs-target="#view"
                              class="btn btn-sm btn-icon btn-primary-light view-about" data-id="{{ $category->id }}">
                              <i class="ri-eye-line"></i>
                          </a>

                          <a href="#" data-bs-toggle="modal" data-bs-target="#edit" data-id="{{ $category->id }}"
                              class="btn btn-sm btn-icon btn-success-light edit-about">
                              <i class="ri-pencil-line"></i>
                          </a>



                          <button type="button" class="btn btn-sm btn-icon btn-danger-light delete-confirm"
                              data-id="{{ $category->id }}">
                              <i class="ri-delete-bin-line"></i>
                          </button>

                      </div>
                  </form>
              </h2>
              <div id="customized-Accordion{{ $category->slug }}"
                  class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                  aria-labelledby="customizedAccordion{{ $category->slug }}" data-bs-parent="#customizedAccordion">
                  <div class="accordion-body">
                      <div class="table-responsive">
                          <table id="user-datatable" class="table table-bordered table-hover">
                              <thead>
                                  <tr>
                                      <th style="width: 5%">#</th>
                                      <th style="width: 25%">Title</th>
                                      <th style="width: 20%">Sub Title</th>
                                      <th style="width: 10%">Image</th>
                                      <th style="width: 10%">Rank</th>
                                      <th style="width: 10%">status</th>
                                      <th style="width: 20%" class="text-center">Action</th>
                                  </tr>
                              </thead>
                              <tbody id="table_rows">

                                  @forelse ($category->posts?->sortBy('rank') as $post)
                                      <tr>
                                          <th scope="row">{{ $loop->iteration }} </th>
                                          <td>{{ $post->title }} </td>
                                          <td>{{ $post->sub_title }} </td>
                                          <td>
                                              @if ($post->image)
                                                  <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                                      data-bs-trigger="hover focus" data-bs-html="true"
                                                      data-bs-content=" <div class='card' style='width: 18rem;'>
                                                    <img src='{{ asset($img_path . $post->image) }}' width='100' class='card-img-top' alt='...'>
                                                    <div class='card-body'> 
                                                    </div>
                                                    </div> ">
                                                      <img src="{{ asset($img_path . $post->image) }}"
                                                          class="img-thumbnail p-0 m-0"
                                                          style="width:60px;height:40px;object-fit:cover;"
                                                          alt="{{ $post->title }}">
                                                  </span>
                                              @else
                                                  <img src="{{ asset('no_image.jpg') }}" class="img-thumbnail p-0 m-0"
                                                      style="width:60px;height:40px;object-fit:cover;" alt="">
                                              @endif
                                          </td>

                                          <td>{{ $post->rank }}</td>

                                          <td>
                                              <div class="form-check form-switch">
                                                  <input name="status" class="form-check-input status_show_hide"
                                                      type="checkbox" role="switch" id="switchCheckChecked"
                                                      data-id="{{ $post->id }}"
                                                      {{ $post->status == 0 ? 'checked' : '' }}>
                                                  <label class="form-check-label" for="switchCheckChecked"></label>
                                              </div>


                                          </td>

                                          <td class="d-sm-flex justify-content-around align-items-center my-1 ">

                                              <a href="#" data-bs-toggle="modal" data-bs-target="#view"
                                                  class="btn btn-sm btn-icon btn-primary-light view-about"
                                                  data-id="{{ $post->id }}">
                                                  <i class="ri-eye-line"></i>
                                              </a>

                                              <a href="#" data-bs-toggle="modal" data-bs-target="#edit"
                                                  data-id="{{ $post->id }}"
                                                  class="btn btn-sm btn-icon btn-success-light edit-about">
                                                  <i class="ri-pencil-line"></i>
                                              </a>


                                              <form action="{{ route($base_route . 'destroy', $post->id) }}"
                                                  method="POST" class="main_form" enctype="multipart/form-data">
                                                  @csrf
                                                  @method('DELETE')
                                                  <a class="btn btn-sm btn-icon btn-danger-light delete-confirm"
                                                      data-id="{{ $post->id }}"><i
                                                          class="ri-delete-bin-line"></i></a>
                                              </form>
                                          </td>
                                      </tr>
                                  @empty
                                  @endforelse

                              </tbody>
                          </table>
                          {{-- //View Details --}}
                      </div>

                  </div>
              </div>
          </div>
      @endforeach

  </div>
