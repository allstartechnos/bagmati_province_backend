 <!-- Start::main-scripts -->

 <!-- Scroll To Top -->
 <div class="scrollToTop">
     <span class="arrow"><i class="ti ti-arrow-narrow-up fs-20"></i></span>
 </div>
 <div id="responsive-overlay"></div>
 <!-- Scroll To Top -->

 <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

 <!-- Popper JS -->
 <script src="{{ asset('backend/assets/libs/%40popperjs/core/umd/popper.min.js') }}"></script>

 <!-- Bootstrap JS -->
 <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

 <!-- Defaultmenu JS -->
 <script src="{{ asset('backend/assets/js/defaultmenu.min.js') }}"></script>

 <!-- Node Waves JS-->
 <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>

 <!-- Sticky JS -->
 <script src="{{ asset('backend/assets/js/sticky.js') }}"></script>

 <!-- Simplebar JS -->
 <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
 <script src="{{ asset('backend/assets/js/simplebar.js') }}"></script>

 <!-- Auto Complete JS -->
 <script src="{{ asset('backend/assets/libs/%40tarekraafat/autocomplete.js/autoComplete.min.js') }}"></script>

 <!-- Color Picker JS -->
 <script src="{{ asset('backend/assets/libs/%40simonwep/pickr/pickr.es5.min.js') }}"></script>

 <!-- Date & Time Picker JS -->
 <script src="{{ asset('backend/assets/libs/flatpickr/flatpickr.min.js') }}"></script>


 <!-- Apex Charts JS -->
 {{-- <script src="assets/libs/apexcharts/apexcharts.min.js"></script> --}}

 <!-- CRM Dashboard -->
 <script src="{{ asset('backend/assets/js/crm-dashboard.js') }}"></script>


 <!-- Custom-Switcher JS -->
 <script src="{{ asset('bakend/assets/js/custom-switcher.min.js') }}"></script>

 <!-- Custom JS -->
 <script src="{{ asset('backend/assets/js/custom.js') }}"></script>
 <!-- End::main-scripts -->

 <!-- Datatable js-->
 <script src="//cdn.datatables.net/2.3.6/js/dataTables.min.js"></script>

 {{-- // Sweet Alert JS --}}
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script src="{{ asset('backend/assets/js/general.js') }}"></script>

 {{-- Preview Image while upload --}}
 <script>
     $('.custom-file-input').on('change', function() {
         var file = $(this).get(0).files[0];
         var myThis = $(this);
         if (file) {
             var reader = new FileReader();

             reader.onload = function() {

                 myThis.closest('.image').find('.previewImage').attr("src", reader.result);


                 // $(".previewImage").attr("src", reader.result);
             }

             reader.readAsDataURL(file);
         }
     });
 </script>

 {{-- Ck editor --}}
 <script src="{{ asset('ckeditor/build/ckeditor.js') }}"></script>

 <script>
     //  var items = [
     //      //  'undo', 'redo',
     //      'underline',
     //      '|',
     //      'heading',
     //      '|',
     //      'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor',
     //      '|',
     //      'bold', 'italic', 'strikethrough', 'subscript', 'superscript', 'code',
     //      '|',
     //      'link', 'blockQuote', 'codeBlock',
     //      '|',
     //      'alignment',
     //      '|',
     //      'bulletedList', 'numberedList', 'todoList', 'outdent', 'indent'
     //  ]
     var items = [
         'heading',
         '|',
         'bold',
         'italic',
         'link',
         'bulletedList',
         'numberedList',
         '|',
         'outdent',
         'indent',
         '|',
         'blockQuote',
         'insertTable',
         'mediaEmbed',
         'undo',
         'redo',
         'fontBackgroundColor',
         'findAndReplace',
         'fontColor',
         'fontFamily',
         'fontSize',
         'htmlEmbed',
         'underline',
         'alignment',
     ]
 </script>
 <script>
     ClassicEditor
         .create(document.querySelector('#editor2'), {
             toolbar: {
                 items: items
             }
         })
         .catch(error => {
             console.error(error);
         });
 </script>

 <script>
     ClassicEditor
         .create(document.querySelector('#editor3'), {
             toolbar: {
                 items: items
             }
         })
         .catch(error => {
             console.error(error);
         });
 </script>


 {{-- //Summernote --}}

 <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>

 <script>
     //  initializeSummernote();

     initializeCkEditor();

     function initializeCkEditor() {
         ClassicEditor
             .create(document.querySelector('#editor'), {
                 toolbar: {
                     items: items
                 }
             })
             .catch(error => {
                 console.error(error);
             });
     }

     function initializeSummernote() {
         $('.summernote').summernote({
             height: 100,
             toolbar: [
                 ['style', ['style']],
                 ['font', ['bold', 'italic', 'underline', 'clear']],
                 ['fontname', ['fontname']], // ✅ font family
                 ['fontsize', ['fontsize']], // ✅ font size
                 ['color', ['color']],
                 ['para', ['ul', 'ol', 'paragraph']],
                 ['height', ['height']],
                 ['insert', ['link', 'picture', 'video']],
                 ['view', ['fullscreen', 'codeview', 'help']]
             ],
             fontNames: ['Arial', 'Courier New', 'Times New Roman', 'Verdana', 'Roboto',
                 'Poppins'
             ], // ✅ add your fonts
             fontSizes: ['8', '10', '12', '14', '15',
                 '16', '18', '20', '22', '24', '36', '48'
             ] // ✅ custom sizes
         });
     }
 </script>

 <script>
     let table = new DataTable('#myTable');
 </script>

 @stack('js')
