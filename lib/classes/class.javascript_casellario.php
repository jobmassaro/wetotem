<script type="text/javascript">
  $("#bottonecasella").click(function(){
    var id = "<?=$_GET['id']?>";
    var idx = $('[name="idx"]:checked').val();
    if(idx == null) { 
    alert("ATTENZIONE DEVI SCEGLIERE UNA CASELLA")
return false;
}
    $.ajax({
      type: "POST",
      url: "<?= LNK_REQUEST ?>tableCasellario_stampa.php",
      data: "id=" + id + "&" + "idx=" + idx,
      dataType: "html",
      success: function(msg)
      {
        $("#tableCasellario_stampa").html(msg);
      }
    });
  });
  </script> 