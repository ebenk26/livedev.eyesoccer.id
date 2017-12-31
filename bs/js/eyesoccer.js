//======== EyeMarket ===================================

$('#dataTable').DataTable({
    paging: false,
        searching: false,
    "order": [[ 1, "desc" ]],
});

$('#tambah-product').click(function()
{
    $('#form-tambah').attr('style','display: block');
    $('#tutup-product').attr('style','display: block');
});

$('#tutup-product').click(function()
{
    $('#form-tambah').attr('style','display: none');
    $('#tutup-product').attr('style','display: none');
});

$('.pilih-kategori').change(function()
{
    var tipe = $(this).val();

    if (tipe == 1 || tipe == 3)
    {
        $('.pilihan-sizeSML').attr('style','display: block');
        $('.stok-not-kaos').attr('style','display: none');
    }
    else
    {
        $('.pilihan-sizeSML').attr('style','display: none');
        $('.stok-not-kaos').attr('style','display: block');
    }
    
});

function modalImage(id)
{
    var id_produk   = id;
    $("#modalImage"+id).modal();

    $('#form-image1-'+id).on('submit', function(e)
    {  
        e.preventDefault();  

        if($('#image1-'+id).val() == '')  
        {  
            alert("Please Select the File");  
        }  
        else  
        {  
            $.ajax({  
                 url: base_url+"/eyemarket/tambah_gambar/"+id, 
                 method:"POST",  
                 data:new FormData(this),  
                 contentType: false,  
                 cache: false,  
                 processData:false,  
                 success:function(data)  
                 {  
                      $('#uploaded_image1'+id).html(data);  
                 }  
            });  
        }  
    });

    $('#form-image2-'+id).on('submit', function(e)
    {  
        e.preventDefault();  

        if($('#image2-'+id).val() == '')  
        {  
            alert("Please Select the File");  
        }  
        else  
        {
            $.ajax({  
                 url: base_url+"/eyemarket/tambah_gambar/"+id,
                 method:"POST",  
                 data:new FormData(this),  
                 contentType: false,  
                 cache: false,  
                 processData:false,  
                 success:function(data)  
                 {  
                      $('#uploaded_image2'+id).html(data);  
                 }  
            });  
        }  
    });

    $('#form-image3-'+id).on('submit', function(e)
    {  
        e.preventDefault();  

        if($('#image3-'+id).val() == '')  
        {  
            alert("Please Select the File");  
        }  
        else  
        {
            $.ajax({  
                 url: base_url+"/eyemarket/tambah_gambar/"+id,   
                 //base_url()/ = http://localhost/tutorial/codeigniter  
                 method:"POST",  
                 data:new FormData(this),  
                 contentType: false,  
                 cache: false,  
                 processData:false,  
                 success:function(data)  
                 {  
                      $('#uploaded_image3'+id).html(data);  
                 }  
            });  
        }  
    });

    $('#form-image4-'+id).on('submit', function(e)
    {  
        e.preventDefault();  

        if($('#image4-'+id).val() == '')  
        {  
            alert("Please Select the File");  
        }  
        else  
        {
            $.ajax({  
                 url: base_url+"/eyemarket/tambah_gambar/"+id,   
                 //base_url()/ = http://localhost/tutorial/codeigniter  
                 method:"POST",  
                 data:new FormData(this),  
                 contentType: false,  
                 cache: false,  
                 processData:false,  
                 success:function(data)  
                 {  
                      $('#uploaded_image4'+id).html(data);  
                 }  
            });  
        }  
    });

    $('#form-image5-'+id).on('submit', function(e)
    {  
        e.preventDefault();  

        if($('#image5-'+id).val() == '')  
        {  
            alert("Please Select the File");  
        }  
        else  
        {
            $.ajax({  
                 url: base_url+"/eyemarket/tambah_gambar/"+id,   
                 //base_url()/ = http://localhost/tutorial/codeigniter  
                 method:"POST",  
                 data:new FormData(this),  
                 contentType: false,  
                 cache: false,  
                 processData:false,  
                 success:function(data)  
                 {  
                      $('#uploaded_image5'+id).html(data);  
                 }  
            });  
        }  
    });
}