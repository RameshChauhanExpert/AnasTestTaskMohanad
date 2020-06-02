<script>
  $(function () {
 $('#add_post_form').on('submit', function (e) {     
     
    var forms = new FormData();
    var file = $('#file')[0].files[0];
    forms.append( "file" , file );
    
    var other_data = $('#add_post_form').serializeArray();
    $.each(other_data,function(key,input){
        forms.append(input.name,input.value);
    }); 
    
   e.preventDefault();
   $.ajax({
     type: 'post',
     url: '<?= site_url('Api/add_post');?>',
    data: forms,
     processData: false,
     contentType: false,
     success: function (response)
     {
         if(response.status==true) {
         Swal.fire({
        title: 'Success!',
        text: response.message,
        type: 'success',
        confirmButtonText: 'Okay' });
        $('#add_post_form').get(0).reset();       
      }
      else
      {          
        Swal.fire({
        title: 'Info!',
        text: response.message,
        type: 'error',
        confirmButtonText: 'Okay' });         
      }
     }
  
   });
 });
});   
</script>