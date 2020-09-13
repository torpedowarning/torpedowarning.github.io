<?php
ob_start();


$i=0;
$site="http://www.sanayard.com/file/";
/////////
for($i=1;$i<=12;$i++)
{
  $folder=1000+$i;
  if(!is_dir($folder))
    continue;
  $dir=@dir($folder);
  while(($file = $dir->read()) !== false)
  {
    if($file!='.' && $file!='..' && $file!='thumbs'&& $file!='index.html')  
      echo $site.$folder.'/'.$file."\n".$site.$folder.'/thumbs/'.str_replace('.','_thumb.',$file)."\n";
  }
  $dir->close();
}
/*****************/
for($i=1;$i<=12;$i++)
{
  $folder=1100+$i;
  if(!is_dir($folder))
    continue;
  $dir=@dir($folder);
  while(($file = $dir->read()) !== false)
  {
    if($file!='.' && $file!='..' && $file!='thumbs'&& $file!='index.html')  
      echo $site.$folder.'/'.$file."\n".$site.$folder.'/thumbs/'.str_replace('.','_thumb.',$file)."\n";
  }
  $dir->close();
}
/*****************/
for($i=1;$i<=12;$i++)
{
  $folder=1200+$i;
  if(!is_dir($folder))
    continue;
  $dir=@dir($folder);
  while(($file = $dir->read()) !== false)
  {
    if($file!='.' && $file!='..' && $file!='thumbs'&& $file!='index.html')  
      echo $site.$folder.'/'.$file."\n".$site.$folder.'/thumbs/'.str_replace('.','_thumb.',$file)."\n";
  }
  $dir->close();
}
////////
$content=ob_get_contents();
ob_end_clean();
file_put_contents("allfile.txt",$content);
echo $content;
?>