<script data-require="jquery@2.1.3" data-semver="2.1.3" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>

<script>
   $(document).ready(function(){
    $("#opsi1").click(function(){  
        $('input:radio[name=opsi1]:nth(0)').attr('checked',true);      
        $("#formJawab").submit(); // Submit the form
    });

    $("#opsi2").click(function(){        
        $('input:radio[name=opsi2]:nth(0)').attr('checked',true);
        $("#formJawab").submit(); // Submit the form
    });

    $("#opsi3").click(function(){        
        $("#formJawab").submit(); // Submit the form
    });

    $("#opsi4").click(function(){        
        $("#formJawab").submit(); // Submit the form
    });
  });
</script>