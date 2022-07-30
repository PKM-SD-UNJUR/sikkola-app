<script data-require="jquery@2.1.3" data-semver="2.1.3" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<script src="equation.js"></script> --}}
<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>

    CKEDITOR.replace( 'ckeditor',{
        removePlugins: [ 'Image']
    } );
    CKEDITOR.replace( 'ckeditor1',{
        extraAllowedContent : 'img(*){*}[*]'
    } );
    CKEDITOR.replace( 'ckeditor2' );
    CKEDITOR.replace( 'ckeditor3' );
    CKEDITOR.replace( 'ckeditor4' );
    CKEDITOR.replace( 'pembahasan' );

</script>
