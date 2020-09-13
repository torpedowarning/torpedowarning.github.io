<?php
//url getf.php?start=1&end=20
isset($_GET['start']) ? $start=$_GET['start'] : $start=1;
isset($_GET['end']) ? $end=$_GET['end'] : $end=2;
$cost=time();
$filenum=0;
$success=0;
$false=0;
$file=@fopen('allfile.txt','r');
if(!$file){
  die("openfile allfile.txt error!<br>");
}
$per_dir='';
$i=0;
while(!feof($file))
{ 
  $i++;  
  if($i-1<$start-1)
    continue;
  if($i-1>=$end)
    break;
  
  $line=trim(fgets($file));
  preg_match('/\d{4}/',$line,$matches);
  $cerrent_dir=$matches[0];

  //创建文件夹
  if($per_dir!=$cerrent_dir){
    @mkdir($cerrent_dir);//主文件夹
    @mkdir($cerrent_dir.'/thumbs');//缩略图文件夹
    $per_dir=$cerrent_dir;
    
  }
  if(strpos($line,'_thumb')){
    $filename=substr($line,strpos($line,$cerrent_dir)+5+7);
    //echo $cerrent_dir.'/thumbs/'.$filename.'<br>';
    if(@copy($line,$cerrent_dir.'/thumbs/'.$filename)){
      $success++;
    }
    else{
      $false++;
      echo "file copy error $line<br/>";
     }
    $filenum++;
  }
  else{
    $filename=substr($line,strpos($line,$cerrent_dir)+5);
    //echo $cerrent_dir.'/'.$filename.'<br>';
    if(@copy($line,$cerrent_dir.'/'.$filename)){
      $success++;
    }
    else{
      $false++;
      echo "file copy error $line<br/>";
    }
    $filenum++;
  }

}
fclose($file);
$cost=time()-$cost;
echo "<p>page cost [$cost]second.total [$filenum] has copy.success[$success] false[$false]</p>";
?>