@extends('admin.master')
@section('title','Danh sách thể loại')
@section('content')
<table class="list_table">
            <tr class="list_heading">
                <td>Danh Mục</td>
                <td class="action_col">Quản lý?</td>
            </tr>
                <!-- <tr class="list_data">
                    <td class="aligncenter">1</td> -->
                    <?php listCate($data) ?>            
               <!--  </tr> -->
        </table>
@endsection