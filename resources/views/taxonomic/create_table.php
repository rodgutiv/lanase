

<?php
$fields = isset($_POST['arr_fields']) ? json_decode($_POST['arr_fields']) : false;
$arr_data = isset($_POST['arr_content']) ? json_decode($_POST['arr_content']) : false;
$token = isset($_POST['token_val']) ? ($_POST['token_val']) : false;



if ($fields && $arr_data) {
	echo "<br><br><h2>Table</h2><br>";
	$content="";
	$content.= '<div class="sombra"></div>';
	$content.='<div id="test" name="test"><form action="test" method="post" enctype="multipart/form-data"><input type="hidden" name="_token" value="'.$token.'"><input type="submit" value="Upload Information" name="submit"><table class="responstable" id="table_content">';

    $content.= '<tr>';
    $content.='<th id=number>No.</th>';
    for ($i=0; $i<count($fields); $i++) {
    	$content.='<th id="'.$fields[$i].'">'.$fields[$i].'</th>';
    }
    $content.= '<th id=images>Images</th>';
    $content.= '<th id=seq_files>Files</th>';
    $content.= '<th id=detailed_info>More info</th>';
    $content.= '</tr>';
    $i=0;


	for (; $i < count($arr_data); $i++) { 
		$arr_data[$i]=str_replace("undefined", "", $arr_data[$i]);
		$content_2=split(",", $arr_data[$i]);

		/*$name=$content_2[0]."+".$content_2[1];
		if($content_2[2]!="" && $content_2[2]!=null){
			$name.="+".$content_2[2];
		}*/

		$content.= '<tr id="tr'.$i.'">';
		$aux=$i+1;
		$content.='<td>'.$aux.'</td>';
		$col_name;
		
		for ($j=0; $j < count($content_2)-1; $j++) { 
			if ($j==0) {
				$col_name="genus[]";
			}elseif ($j==1) {
				$col_name="specie[]";
			}elseif ($j==2) {
				$col_name="subspecie[]";
			}elseif ($j==3) {
				$col_name="latitude[]";
			}elseif ($j==4) {
				$col_name="longitude[]";
			}else{
				$col_name="no_name";
			}
			$content.='<td  contenteditable="true" id="'.$i.$j.'">'.$content_2[$j].'<input type="hidden" name="'.$col_name.'" value="'.$content_2[$j].'"></td>';
		}
		$content.= '<td> <button type="button" id="files'.$i.'" onclick="select_images('.$i.')">Images</button></td>';
		$content.= '<td><button type="button" onclick="$(\'#seqFiles'.$i.'\').trigger(\'click\');">Files</button><input type="file" id="seqFiles'.$i.'" name="seqFiles'.$i.'[]" style="display:none;" multiple></td>';
		$content.= '<div id= "hiden'.$i.'" class="simages"><button  type="button" onclick="select_images('.$i.')" >cerrar</button><input type="file" id="myFiles'.$i.'" name="myFiles'.$i.'[]" multiple/> <input id="fileDir'.$i.'" type="file" name = "fileDir'.$i.'[]" webkitdirectory mozdirectory /><div class="box" id="imagenes'.$i.'"></div> <script>$("#fileDir'.$i.'").change(function(){prevImages(this,"'.$i.'", "imagenes'.$i.'");});$("#myFiles'.$i.'").change(function(){prevImages(this,"'.$i.'", "imagenes'.$i.'");});</script></div>';
		$content.= '<td><input type="button" onclick="more_info(\''.$i.'\')" value="More"></td></tr>';
	}
	$content.='</table><div id="no_rows"><input name = "rows" value ="'.$i.'"/></div></form></div>';
    echo $content.'';
}

?>