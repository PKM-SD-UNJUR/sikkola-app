<script data-require="jquery@2.1.3" data-semver="2.1.3" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
@foreach ($pertanyaan as $ptr)
<script>

    ClassicEditor
    .create( document.querySelector( '#editor{{$ptr->id}}' ) )
    .catch( error => {
        console.error( error );
    } );

   
    $(document).ready(function () {
      $('#form-question{{$ptr->id}}').hide();
      $('.btn-question{{$ptr->id}}').click(function () {
        $('#form-question{{$ptr->id}}').slideToggle();
      });
    });   

  </script>
@endforeach