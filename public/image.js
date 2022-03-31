

$(document).ready(function(){
   var data;


    $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#upload_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:"ImageUploadpost",
            method:"POST",
            data:new FormData(this),
            dataType:'JSON',
            contentType:false,
            cache: false,
            processData:false,
            success:function(data) {
                $('#message').css('display','block');
                $('#message').html(data.success);
                $('#message').addClass(data.class_name);

                imageload();
                imageload1();

                setTimeout(function() {
                    $('#message').fadeOut('fast');
                },3000);
            }
        })
    });
       imageload();
                    function imageload(){
                      $.ajax({
                             url:"api/ImageUpload",
                             type:"GET",
                             dataType:'JSON',

                     success:function(response)
                    {
                           data=response.imagecounter;
                           $('tbody').html("");
                           console.log(response);
                 $.each(response.images,function(key, item){

                         $('tbody').append('<tr class="col-4 col-lx-4 col-md-4" >\
                          <td><img id="photo" src="'+item.image+'"alt="this image loading"/><h6>'+item.id+'</h6></td>\
                          </tr>');

                    });

                 }

              });


            }


            function imageload1(pagenumber){

             $.ajax({
                     url:"api/imageretreve/"+pagenumber,
                     type:"GET",
                     dataType:'JSON',
                     success:function(response)
                          {
                            console.log(response);
                            // var data1 = $.parseJSON($(response).val());
                             $.each(response.images,function(key, item)
                                   {
                                    // console.log(pagenumber);


                                $('tbody').append('<tr class="col-4 col-lx-4 col-md-4">\
                                <td><img id="photo"  src="'+item.image+'"alt="this image loading"/><h6>'+item.id+'</h6></td>\
                                 console.log(key);\
                                 console.log((response.images));\
                                 console.log(key);\
                                 console.log(item);\
                                </tr>');
                             });

                          }

                        });

                        return page=page+1;
                    }
                      let page=1;

                         $(window).scroll(function(event){
                               let pagenumber=page;
                                  if($(window).scrollTop()*pagenumber + $(window).height() >= $(document).height()*pagenumber -$(window).height()){
                                        if(pagenumber<=Math.ceil(data)/5) {
                                               imageload1(pagenumber);
                                         }
                                 }
                         });

                      });



