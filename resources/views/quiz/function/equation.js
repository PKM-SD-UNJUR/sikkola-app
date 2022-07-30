import MathType from '@wiris/mathtype-ckeditor5';

ClassicEditor
    .create( document.querySelector( '#editor1' ), {
        plugins: [ MathType],
        toolbar: [ 'MathType', 'ChemType']
    } )
    .then()
    .catch();