<?php 
	function menuMulti($data,$parent_id=0,$str="|",$select=0) 
	{
		foreach ($data as $value) {
			$id	 	= $value["id"];
			$name 	= $value["name"];
			if($value["parent_id"] == $parent_id) 
			{
				if ($select!=0 && $select == $id) 
				{
					echo '<option value="'.$id.'" selected>'.$str." ".$name.'</option>';
				}else 
				{
					echo '<option value="'.$id.'">'.$str." ".$name.'</option>';
				}
				menuMulti ($data,$id,$str."_________|",$select);
			}
		}
	}

	function listCate($data,$parent=0,$str="|") 
	{
		$stt = 0;
		foreach ($data as $value) {
			$id	 	= $value["id"];
			$name 	= $value["name"];
			
			if($value["parent_id"] == $parent) 
			{
				echo '
				<tr class="list_data">';
	            if ($str == "|") 
	            {
	            	echo '<td class="list_td alignleft"><b>'.$str." ".$name.'</b></td>';
	            }else 
	            {
	            	echo '<td class="list_td alignleft">'.$str." ".$name.'</td>';
	            }   


	             echo '<td class="list_td aligncenter">
	                    <a href=""><img src="../../qt64_admin/templates/images/edit.png" /></a>&nbsp;&nbsp;&nbsp;
	                    <a href="delete/'.$id.'"  onclick="return xacnhanxoa(\'Bạn có chắc chắn muốn xóa danh mục này ?\')"><img src="../../qt64_admin/templates/images/delete.png" /></a>
	                	</td>
	            </tr>';
				listCate($data,$id,$str."_________|");
			}
		}
	}
?>