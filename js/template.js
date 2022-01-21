$(document).ready(function(){
    $("#usertable").fancyTable({
        sortColumn:7,// column number for initial sorting
        sortOrder:'desc',// 'desc', 'descending', 'asc', 'ascending', -1 (descending) and 1 (ascending)
        sortable:true,
        pagination:true,// default: false
        paginationClass:"btn btn-normal btn-outline-primary",
        paginationClassActive:"active",
        pagClosest: 3,
        perPage: 10,
        searchable:true,
        globalSearch:true,
        //globalSearchExcludeColumns: [2,5],// exclude column 2 & 5
        onInit:function(){

        },
            
    });
    $(".udmanage tr a.delete").on("click",function(){
        if ( confirm("Are you sure to delete this record?") )
        {
            var id = $(this).attr("num");
            var url = $("#acturl").val();
            // console.log(url);
            $.post("?page=allusers&delid="+id,{
                delid : id
                }, 
                function(data){
                    //$(this).parent().parent().remove();
            });
            $(this).parent().parent().remove();
        }
        // href='?page=allusers&delid=".$id."'
    });
});

