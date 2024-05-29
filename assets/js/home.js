$(document).ready(function(){
    var basePath = $('#base_path').val();
     $("#citizen").autocomplete({
         source:function(request,response){
             $.ajax({
                 url:basePath+'CitizenController/findCitizens/'+request.term,
                 type:'GET',
                 dataType:'json',
                 success : function(result){
                     var datas;
                     datas = [
                         {
                             value:'',
                             label:'not found'                        
                         }
                     ];
                    console.log("before format",result);
 
                     if(result.length){
                         datas = $.map(result,function(obj){
                             return {
                             value:obj.firstname,
                             label:obj.firstname,  
                             data:obj
                             };
                         });
                     }
                     console.log("formated response",datas);
                     response(datas);
                 }
             });
         },
 
         select: function(event,selectedData){
             console.log(selectedData);
         }
     });
 });



