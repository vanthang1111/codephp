
<!------------------------------------------------------------------------------------------------------->
<script>
  function delete_normal(){
    var conf=confirm("Bạn có chắc chắn muốn xóa");
    return conf;
  }
</script>
<!---------------------------------------------------------------------------------------------------->
<script>
  function delete_advance(){
    var conf=confirm("Nếu bạn xóa có thể xóa những dữ liệu liên quan từ bảng khác");
    return conf;
  }
</script>
<!----------------------------------------------------------------------------------------------------->
<?php
  function paginationdata($queryall,$totalRows,$nowpage_layout,&$query){

if($totalRows >20){
  if(isset($_GET['pages'])){
    $pages=$_GET['pages'];
  }
  else{
    $pages=1;
  }
  $rowsPerPage=5;
  $perRow=$pages*$rowsPerPage-$rowsPerPage;    
    

    $query="$queryall LIMIT $perRow, $rowsPerPage";
    


    $totalPages=ceil($totalRows/$rowsPerPage);
    $listPage="";
    for($i=1;$i<=$totalPages;$i++){
      if($pages==$i){
        $listPage.='<li class="page-item active"><a class="page-link" href="index.php?page_layout='.$nowpage_layout.'&pages='.$i.'">'.$i.'</a></li>';
      }
      else{
        $listPage.='<li class="page-item"><a class="page-link" href="index.php?page_layout='.$nowpage_layout.'&pages='.$i.'">'.$i.'</a></li>';
      }
    }
  }
  else{
    $query="$queryall";
    
  }
    if($totalRows>20){
      return $listPage;
    }
  }

  function paginationnav($listPage,$totalRows){
     if(!isset($_POST['searchbtn'])){
      

      echo '<nav aria-label="...">
            <ul class="pagination">';
            
              if($totalRows >20){
            echo $listPage;}
            
           echo' </ul>
            </nav>';
}
  }
///////////////////////////////////////////////



?>
