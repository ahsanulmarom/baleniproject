function barang_more(id) {
  $.ajax({
      url:BASE_URL+"admin/Dashboard/orderdetilinfo/"+id,
      type:"GET",
      dataType:"JSON",
      success: function(data){
        $('#headeratas').html('<table>'+
                '<tr>'+
                    '<td>Kode Order</td>'+
                    '<td>'+data.kode+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td>Tanggal Order</td>'+
                    '<td>'+data.tanggal+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td>Alamat Kirim</td>'+
                    '<td>'+data.alamat+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td>Tanggal Kirim</td>'+
                    '<td>'+data.tanggalkirim+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td>Status</td>'+
                    '<td>'+data.status+'</td>'+
                '</tr>'+
            '</table>');
        var dat = data.barang;
     
        for(var i in dat){
          var barang = dat[i];
          // console.log(barang);
          $('#ket_barang').append('<tr class="bsm1">'+
                            '<td>'+barang['kuantitas']+'</td>'+
                            '<td>'+barang['nama']+'</td>'+
                            '<td>'+barang['deskripsi_order']+'</td>'+
                            '<td class="num1">'+ 'Rp ' + toNum(barang['harga'])+'</td>'+
                            '<td class="num2">'+ 'Rp ' + toNum((barang['kuantitas']*barang['harga']))+
                            '</td></tr>');
        }
                
        $('#kodeunik').html(toNum(data.kode));
        $('#total').html(toNum(data.totalbayar));
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        console.log('error');
          // alert('Error get data from ajax');
      }
     });
}

function toNum(number){
  return number.toString().replace(/(\d)(?=(\d{3})+$)/g, "$1,");
}

$('input.number').keyup(function(event) {

  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40) return;

  // format number
  $(this).val(function(index, value) {
    return value
    .replace(/\D/g, "")
    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    ;
  });
});